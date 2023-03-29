# php-espaces-clients-vc-api
*Auteur : Léo Boiron (lboiron@connected-company.fr)*

Librairie permettant de structurer les données demandées par les espaces clients Valority.

# Avertissement
- PHP 8 requis pour le moment
- Ce tutorial est à destination de Symfony grâce à l'auto-wiring. Sur un autre framework, il sera nécessaire de fournir manuellement les différentes classes permettant de traiter les flags, et d'instancier `ContratFactory` avec ces classes.
- La serialization n'est pas implémentée.
- Les objets DateTime sont automatiquement formatée.
- Tous les flags ne sont pas implémentés. Seulement ceux de Botero et Zephyr à l'heure actuelle.

# Utilisation avec Symfony

### 0 - Configuration Symfony
Il faut tagger nos différentes stratégies et les injecter dans le service ContratFactory dans la configuration.
```yaml
_instanceof:
    Connected\EspaceClientVC\Contract\FlagFactoryInterface:
        tags: ['app.espace_client_vc_flag_strategy']
            
Connected\EspaceClientVC\ContratFactory:
    arguments:
        - !tagged_iterator app.espace_client_vc_flag_strategy
```
            

### 1 - Créer un objet `Configuration`
Vous devez récupérer les données de la requête et créer un objet `Configuration` qui comportera les différents flags demandés.

```php
// Connected\EspaceClientVC\Model\Configuration

$configuration = new Configuration($email, $flagGroups, $flags);
```

### 2 - Créer des `Contrat`
Pour chaque contrat attaché au client, un objet Contrat sera créé par le service ContratFactory.
Pour cela, il faut appeller la méthode `process`.

```php
// Connected\EspaceClientVC\ContratFactory

public function process(ContratTypeEnum $type, Configuration $configuration, mixed $appContrat): Contrat
```
- `$type` : un objet ContratTypeEnum, soit `IMMOBILIER`, soit `ASSURANCE`.
- `$configuration` : l'objet que nous avons précedemment créé.
- `$appContrat` : votre contrat dans l'application (lot, dossier, etc). C'est une donnée que vous allez pouvoir récupérer plus tard dans votre code métier.

### 4 - Créer une ou plusieurs stratégies
Afin de récupérer nos données métiers, il faut créer une classe implémentant `FlagFactoryInterface`. 
Il est préférable de créer plusieurs stratégies afin de conserver plus du clarté. Cela reste un choix personnel. Cette classe permettra le mapping entre les différents flags et votre code.

### 5 - Ajouter un flag
Une stratégie devra implémenter la méthode `public function getMapping(): FlagLogicMapping`.
Celle-ci fait le lien entre un flag et une closure exécutant votre code.
```php
class Lot implements FlagFactoryInterface
{
    public function getMapping(): FlagLogicMapping
    {
        return (new FlagLogicMapping())
            ->add(FlagEnum::get(FlagEnum::LOT_NUMERO), $this->getLotNumero())
        ;
    }
    ...
}
```
### 6 - Créer une closure 
Il y a deux traitements différents selon les flags. Soit il s'agit d'une donnée simple (numéro de lot,...), soit plusieurs données correspondant au flag remontent et la clé `metadata` permettera de les différencier.

#### 6.1 Donnée simple
Une closure doit être retourné et prendra en paramètre le `FlagData` et votre `$appContrat` (ici $lot).

```php
public function getLotNumero(): \Closure
{
    return function (FlagData $flag, mixed $client, mixed $lot): void {
        $flag->setValue($lot->getNumero());
    };
}
```
#### 6.2 Donnée multiples
Dans le cadre de données multiple, nous recevons dans la closure une collection à alimenter de plusieurs flags.

```php
public function getAppelFondLibelle(): \Closure
{
    return function (FlagDataCollection $collection, mixed $client, mixed $lot): void {
        foreach ($lot->getAppelsFonds() as $appelFonds) {
            $flag = $collection->newFlag();
            $flag->setValue($appelFonds->getLibelle());
            $flag->setMetadata($appelFonds);
        }
    };
}
```
- `public function newFlag(): FlagData` permet de créer autant de FlagData que nécessaire.
- `public function setMetadata(?FlagMetadataInterface $flagMetadata): self` permet de différencier les données et attend un objet implémentant `FlagMetadataInterface`.
- `public function setPeriode(\DateTime $start, \DateTime $end): self` Permet de spécifier une période comme valeur.
- `public function setDate(?\DateTime $date): self` Permet de spécifier une date comme valeur.
- `public function setDisplayName(?string $displayName): self` Permet de spécifier le nom d'un document.

### 7 - Ajouter un identifiant applicatif
Vous pouvez ajouter un identifiant d'un autre applicatif sur votre contrat.
```php
public function addIdentifier(AppIdentifierEnum $appIdentifier, string|int $id): self
```

### 8 - Objet `Contrat` final
Votre `Contrat` contiendra ainsi toutes les données récupéré aux flags correspondants, avec leurs metadata si nécessaire.
