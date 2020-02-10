# Blog_Symfony

#####Quelles relations existent entre les entités (Many To One/Many To Many/...) ? 

User => Post : One To Many  
Post => User : Many to One  
Post => Comment : One To Many  
Comment => Post : Many to One  
Comment => User : Many to One
User => Comment : One to Many

#####Faire un schéma de la base de données.

![schema BDD](resources/Blog.svg)

#####Expliquer ce qu'est le fichier .env

Le fichier .env est utilisé pour définir les variables d'environment.

#####Expliquer pourquoi il faut changer le connecteur à la base de données.

Il faut changer le connecteur car il utilise par default une BDD mysql au lieu d'SQLite

#####Expliquer l'intérêt des migrations d'une base de données.

Les migration permettent de pouvoir revenir en arrière si besoin grâce au rollback.

