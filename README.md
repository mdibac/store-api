Test Technique WShop - Réponse par Hamdi Baccouch
Bienvenue dans l'application de réponse au test technique proposé par Wshop et réalisé par Hamdi Baccouch dans le cadre d'une candidature au poste de développeur PHP.

Prérequis
Assurez-vous d'avoir Docker et Docker Compose installés sur votre machine avant de continuer.

Installation
Clonez le dépôt Git sur votre machine locale.

git clone git@github.com:mdibac/store-api.git

Accédez au répertoire du projet.

cd store-api

Lancez les conteneurs Docker en utilisant Docker Compose

docker-compose up -d

Accès à l'application
Pour accéder à l'application, ouvrez votre navigateur à l'adresse http://127.0.0.1:8080/stores

Accès à la base de données
Utilisez http://127.0.0.1:8081/ pour accéder à la base de données. Connectez-vous avec les identifiants suivants :

Utilisateur : root
Mot de passe : root
Scripts SQL à Exécuter
Assurez-vous d'exécuter les scripts SQL suivants dans l'ordre indiqué pour préparer la base de données :

Script de création de la base de données :

Chemin : scripts/sql/script-create-db.sql
Script d'alimentation de la base de données :

Chemin : scripts/sql/script-fixtures.sql

Vous trouvez également les reponses aux QCM dans reponseQCM.txt

Auteur
Cette application a été réalisée par Hamdi Baccouch dans le cadre du processus de candidature pour le poste de développeur PHP chez Wshop.

Merci de prendre le temps de tester cette application. Si vous rencontrez des problèmes ou avez des questions, n'hésitez pas à me contacter.