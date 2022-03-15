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

### install npm
    npm install

#

## Third Step

### In your webpack.config.js
uncomment //.enableSassLoader()

### Now Install sass depedency in the project
    npm install sass-loader@^12.0.0 sass --save-dev

### Install bootstrap depedency
    npm install bootstrap --save-dev

### command for compile the project itself :
    npm run watch
#

### install vich uploader bundle with composer

    composer require vich/uploader-bundle

### install stof
composer require stof/doctrine-extensions-bundle