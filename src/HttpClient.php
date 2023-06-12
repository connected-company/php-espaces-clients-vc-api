<?php declare(strict_types=1);

namespace Connected\EspaceClientVC;

use Connected\EspaceClientVC\Contract\ClientInterface;
use Connected\EspaceClientVC\Enum\EnvEnum;
use Connected\EspaceClientVC\Model\NewClient;
use Connected\EspaceClientVC\Model\UpdatedClient;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Client API.
 */
class HttpClient
{
    const URLS = [
        EnvEnum::QUALIF => 'https://espace-client-qualif.valority.com',
        EnvEnum::PROD => 'https://espace-client.valority.com'
    ];

    const ROUTES = [
        'newClient' => '/api/user',
        'updatedClient' => '/api/user/update'
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
     * Cette fonction a pour but d'envoyer un client dont les valeurs ci dessous ont été changées.
     *
     * Attends un tableau avec une clé "user" contenant l'email de l'utilisateur actuel
     * Une autre clé "values" avec les valeurs : Email, Nom, Prenom, TelephonePortable(avec indicatif) : toutes facultatives
     *
     * @param array $updatedFields Array.
     * 
     * @return UpdatedClient
     */
    public function updateClient(array $updatedFields): UpdatedClient
    {
        return new UpdatedClient($this->request('POST', self::ROUTES['updatedClient'], $updatedFields));
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
        $response = $this->httpClient->request($method, self::URLS[$this->environment->getReadable()] . $uri, [
            'headers' => ['X-API-KEY' => $this->apiKey],
            'json' => $body
        ]);

        return !empty($response->getContent(false)) ? $response->toArray() : [];
    }
}
