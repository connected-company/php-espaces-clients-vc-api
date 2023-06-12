<?php declare(strict_types=1);

namespace Connected\EspaceClientVC;

use Connected\EspaceClientVC\Contract\ClientInterface;
use Connected\EspaceClientVC\Enum\EnvEnum;
use Connected\EspaceClientVC\Model\NewClient;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Client API.
 */
class HttpClient
{
    const URLS = [
        EnvEnum::QUALIF => 'https://espace-client-qualif.valeur-et-capital.com',
        EnvEnum::PROD => 'https://espace.intra'
    ];

    const ROUTES = [
        'newClient' => '/api/user'
    ];

    /**
     * @param iterable $HttpClientInterface Http Client.
     */
    public function __construct(
        private EnvEnum $environment,
        private string $apiKey,
        private ?HttpClientInterface $httpClient = null
    ) {
        $this->httpClient = $httpClient ?? new CurlHttpClient();
    }

    /**
     * Soumission d'un Client.
     *
     * @param  ContratTypeEnum $type          ContratTypeEnum.
     * @param  Configuration   $configuration Configuration.
     * @param  mixed           $contrat       Contrat, envoyé aux Closures.
     *
     * @return Contrat
     */
    public function newClient(ClientInterface $client): NewClient
    {
        $body = [
            'email' => $client->getEmail(),
            'nom' => $client->getNom(),
            'prenom' => $client->getPrenom(),
            'telephonePortable' => $client->getTelephonePortable(),
            'firstEntite' => $client->getFirstEntite()
        ];

        return new NewClient($this->request('POST', self::ROUTES['newClient'], $body));
    }

    /**
     * Wrapper pour les requêtes.
     *
     * @param  string $method Méthode.
     * @param  string $uri    URL.
     * @param  array  $body   Body.
     *
     * @return array
     */
    private function request(string $method, string $uri, array $body = []): array
    {
        $response = $this->httpClient->request($method, self::URLS[(string)$this->environment] . $uri, [
            'headers' => ['X-API-KEY' => $this->apiKey],
            'json' => $body
        ]);

        return !empty($response->getContent(false)) ? $response->toArray() : [];
    }
}
