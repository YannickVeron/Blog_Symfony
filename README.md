# Blog_Symfony

### Doctrine

#### Création des entités

>Quelles relations existent entre les entités (Many To One/Many To Many/...) ? 

User => Post : One To Many  
Post => User : Many to One  
Post => Comment : One To Many  
Comment => Post : Many to One  
Comment => User : Many to One
User => Comment : One to Many

##### Faire un schéma de la base de données.

![schema BDD](resources/Blog.svg)

#### Connexion à la base

>Expliquer ce qu'est le fichier .env

Le fichier .env est utilisé pour définir les variables d'environment.

>Expliquer pourquoi il faut changer le connecteur à la base de données.

Il faut changer le connecteur car il utilise par default une BDD mysql au lieu d'SQLite

#### Migrations

>Expliquer l'intérêt des migrations d'une base de données.

Les migration permettent de pouvoir revenir en arrière si besoin grâce au rollback.

### Administration

#### Administration avec Symfony

>Faire une recherche sur les différentes solutions disponibles pour l'administration dans Symfony

* EasyAdmin
* Sonata

#### EasyAdmin

>Travail préparatoire : Qu'est-ce que EasyAdmin ?

EasyAdmin est un bundle symfony qui permet de créer un backend d'administration.

>Pourquoi doit-on implémenter des méthodes to string dans nos entités?

Les méthodes toString sont utilisées pour afficher les relations.

### Controllers

#### ParamConverter

>Qu'est-ce que le ParamConverter ?

Le paramResolver convertit les parametres de la requête (POST, GET...) en variable (objects) pour le controller

### Form

#### Intégration dans le projet

>Qu'est-ce qu'un formulaire Symfony ?

Un formulaire symfony gère automatiquement le rendu, la validation et le mapping des formulaire.

>Quels avantages offrent l'usage d'un formulaire ?

Rendu, validation automatique.

#### Thème Personnalisé

>Quelles sont les différentes personalisations de formulaire qui peuvent être faites dans Symfony ?

Les personalisations sont :
* label
* errors
* row
* widget
* help

### Security

#### Avant-propos

>Définir les termes suivants : Encoder, Provider, Firewall, Access Control, Role, Voter

* Encoder : Gère l'encodage des mot de passe. 
* Provider : Gère l'utilisateur connecté (Reload depuis session, remember-me, impersonation)
* Firewall : Système d'auth, définie comment un utilisateur se connect (form, api, etc)
* Access Control : Vérifie que l'utilisateur peut acceder à la ressource demandée.
* Role : Droit d'un utilisateur, l'Access Control vérifie les roles pour donner accès ou non aux ressources
* Voter : Définit les droits d'un utilisteur spécifique envers une ressource spécifique (ex : un utilisateur peut modifier un article si il en est l'auteur.)

>Qu'est-ce que FOSUserBundle ? Pourquoi ne pas l'utiliser ?

FOSUserBundle gère l'inscription, les mots de passe oubliés...
Il ne sera pas utilisé car il n'y aura pas besoin de ces fonctionnalités dans notre blog.

>Définir les termes suivants : Argon2i, Bcrypt, Plaintext, BasicHTTP

* Argon2i et Bcrypt sont des hasheurs de mot de passe.
* Plaintext signifie sans cryptage.
* BasicHTTP encode les paires ID_user/MdP encodés en base64



#### Authentification

>Définir ce qu'est le basicHTTP

