# Blog_Symfony

###Doctrine

####Création des entités

#####Quelles relations existent entre les entités (Many To One/Many To Many/...) ? 

User => Post : One To Many  
Post => User : Many to One  
Post => Comment : One To Many  
Comment => Post : Many to One  
Comment => User : Many to One
User => Comment : One to Many

#####Faire un schéma de la base de données.

![schema BDD](resources/Blog.svg)

####Connexion à la base

#####Expliquer ce qu'est le fichier .env

Le fichier .env est utilisé pour définir les variables d'environment.

#####Expliquer pourquoi il faut changer le connecteur à la base de données.

Il faut changer le connecteur car il utilise par default une BDD mysql au lieu d'SQLite

####Migrations

#####Expliquer l'intérêt des migrations d'une base de données.

Les migration permettent de pouvoir revenir en arrière si besoin grâce au rollback.

###Administration

####Administration avec Symfony

#####Faire une recherche sur les différentes solutions disponibles pour l'administration dans Symfony

* EasyAdmin
* Sonata

####EasyAdmin

#####Travail préparatoire : Qu'est-ce que EasyAdmin ?

EasyAdmin est un bundle symfony qui permet de créer un backend d'administration.

#####Pourquoi doit-on implémenter des méthodes to string dans nos entités?

Les méthodes toString sont utilisées pour afficher les relations.