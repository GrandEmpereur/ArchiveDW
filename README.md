# Par l'amour de l'axe
### Projet d'année : Site vitrine pour les projets des étudiants de l'axe DW
### Techno : Symfony 
#### install symfony :
    curl -sS https://get.symfony.com/cli/installer | bash

### une fois que tu as cloné le projet tape cette commande dans ton terminal à la racine du projet : 
    composer install
## maintenant tu dois créer ton env.local !
### copie l'actuel .env et colle le, puis renomme le ".env.local"
#
## Seconde étape
### il faut que tu installes le composer Encore : 
    composer require symfony/webpack-encore-bundle
### Ensuite, tu auras besoin de npm pour ce projet donc installe le dans celui-ci !
    npm install
### pour compiler Encore avec npm c'est :
    npm run watch
#
## Style
### commande pour interpréter le sass en local :
    sass --watch assets/styles/app.scss:app.css
