# Actual Groupe x Simon

## Introduction

 👨🏻‍💻 Il s'agit d'un projet de test technique pour ma candidature au poste de développeur Web Full Stack pour le Groupe Actual.

---

## Présentation 🎆

### Démo 👀

![Demo1](./docs/page_admin.gif)
![Demo2](./docs/page_manager.gif)
![Demo3](./docs/page_student.gif)

## Diagramme Relationnel 🛠️

![diagram](./docs/diagram_relationnel.png)

## Installation

### Pré-Requis

Composer

### Etapes d'installation

1 . Installer les dépendances

```shell
composer install
```

2 . Créer une BDD MySQL

3 . Créer/configurer le .env

Exemple
```
DATABASE_URL="mysql://admin:xxxx@127.0.0.1:3308/actual?serverVersion=8.3.0"
```

4 . Lancer les migrations

```shell
php bin/console doctrine:migrations:migrate
```

5 . Lancer le serveur

```shell
symfony server:start
```

6 . Pour les besoin de la démo, vous pouvez utiliser le script suivant pour alimenter la BDD
- [Script pour alimenter la BDD (INSERT.SQL)](https://github.com/SimonDesc/Actual-x-Simon/blob/main/docs/INSERT.sql)
- [Script pour réinitialiser la BDD (DELETE.SQL)](https://github.com/SimonDesc/Actual-x-Simon/blob/main/docs/DELETE.sql)

>> accèder aux différentes pages du site via :
http://127.0.0.1:8000/admin
http://127.0.0.1:8000/manager
http://127.0.0.1:8000/student
  
## Détail du test technique

Le test devra être livré via un repository Github, Gitlab ou Bitbucket
privé.
Les travaux devront pouvoir être testés sans aucune modification à
apporter au code, ni paramétrage, et si besoin, en suivant pas à pas une
documentation.
Nous vous demandons de réaliser le test en utilisant la version de
Symfony 6.4 et MySQL.
Pour le peuplement des données, un simple script SQL suffira.
Une qualité et un soin sur l’architecture sont attendus.

## Spécifications de la Stack

Création d'une plateforme de formation :

[Page admin](Page-admin) :

Gestion du contenu avec une arborescence chapitres et
modules.

[Page manager](Page-manager) :

Gestion des apprenants et du contenu associé à cette
cohorte.

[Page apprenant](Page-apprenant) : 

Détail du compte, liste du contenu associé et mise en
favoris.


### Page admin

1. La page doit permettre de lister une arborescence chapitres/modules,
d’apporter des modifications sur le titre des contenus, ou de supprimer
un élément.

2. La page doit également afficher la liste des managers disponibles avec
un booléen indiquant ceux qui n’ont pas d’apprenants. Pour afficher
cette liste, vous passerez pas une requête dans un repository (doctrine)
à la place de passer par des accesseurs.


### Page manager

La page doit permettre de gérer les apprenants :
1. ajout/retrait d’apprenants sous le management du manager.
2. inscription d’un apprenant à du contenu (modules).


### Page apprenant

La page doit permettre d’afficher le détail d’un apprenant :

1. afficher le manager de l’apprenant.
2. afficher les infos de base de l’utilisateur : prénom, nom, email, téléphone.
3. afficher la liste des contenus où il est inscrit par chapitres/modules et un compteur dynamique du nombre de chapitres et modules
4. pouvoir mettre en favoris un ou des modules et afficher cette liste dansn un autre tableau en dessous.


## Tests

Décrivez un use case de test fonctionnel sur ce projet.
