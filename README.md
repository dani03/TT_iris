# Installation et configuration du projet

Bienvenue dans la documentation d'installation. Suivez les instructions ci-dessous pour installer et démarrer le projet.

## Installation

Vous avez deux options pour installer ce projet :

1. **Installation avec Docker**
2. **Installation classique**

### 1. Installation avec Docker

Pour installer le projet via Docker, suivez ces étapes :

1. Clonez ou téléchargez le dépôt GitHub avec la commande suivante :

    ```bash
    git clone https://github.com/dani03/TT_iris.git
    ```
    ## NB: si un dossier `mysql` existe à la racine du votre projet veuillez le supprimer avant de continuer.

2. Accédez au répertoire du projet, puis exécutez la commande suivante pour construire et démarrer les services :


    ```bash
    make build-start
    ```

    Cette commande effectuera les actions suivantes :

    - Recrée le serveur Nginx.
    - créer un fichier database.sqlite dans le dossier `database`
    - Installe les dépendances via Composer.
    - Crée un fichier `.env` basé sur le fichier `.env.exemple` et remplit les variables liées à la base de données (déclarées dans le fichier `docker-compose.yml` sous le service MySQL).
    - Génère la clé d'application avec `php artisan key:generate`.
    - créer un dossier `mysql` à la racine qui sera votre base de données.
    - Exécute les migrations et les seeders pour initialiser la base de données.

3. Une fois l'installation terminée, vous pouvez vérifier que le blog fonctionne en accédant à l'URL suivante :

    ```
    http://localhost:4000
    ```

4. Pour exécuter manuellement les migrations à l'intérieur du conteneur Docker, utilisez la commande suivante :
    ```bash
    docker compose run --rm artisan migrate
    ```
5. Pour exécuter dépendences à l'intérieur du conteneur Docker, utilisez la commande suivante :

    ```bash
    docker compose run --rm composer install
    ```

6. Accès à phpmyadmin sur le port 2023 : http://localhost:2023

7. si la commande `make` ne fonctionne pas utiliser ces commandes à la suite :

```bash
docker compose up --build -d nginx
touch ./database/database.sqlite
docker compose run --rm composer install

créer un fichier .env file à la racine du projet en copiant et en collant .env.example comme indiqué dans la partie de l\'installation classique
et ajouter y le les variable correspondantes et leurs valeurs comme suivant:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_blog
DB_USERNAME=homestead
DB_PASSWORD=secret
```

docker compose run --rm artisan key:generate
docker compose run --rm artisan migrate
docker compose run --rm artisan db:seed



```

tous vos containers doivent être au vert si vous avez docker desktop.

    Si vous rencontrez des problèmes
    effectuer les commandes suivantes :
    `docker compose run --rm artisan cache:clear`
    `docker compose run --rm artisan config:clear`
    `docker compose run --rm artisan optimze`

pour nettoyer le cache et les configurations supprimées.

lancer la commande `npm install` dans le terminal de votre projet pour installer les dependances front end
 lancer la commande `npm run dev` afin build et run les assets du projet.

8. Pour stopper les containers taper la commande `docker compose down` vos données ne seront pas perdues.

### 2. Installation classique

Pour une installation sans Docker, suivez ces étapes :

1.  Clonez ou téléchargez le dépôt GitHub avec la commande suivante :

    ```bash
    git clone https://github.com/dani03/api_iris.git
    ```

2.  Accédez au répertoire du projet et créez un fichier `.env` à la racine. Copiez-collez le contenu du fichier `.env.exemple` dans le nouveau fichier `.env`. Remplacez ensuite les informations de connexion à la base de données avec vos propres identifiants :

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_blog
    DB_USERNAME=root
    DB_PASSWORD=
    ```

3.  Dans le dossier database situé à la racine du projet créer un fichier database.sqlite

4.  lancer l'installation des dépendances avec la commande `composer install`

5.  Générez la clé d'application avec la commande suivante :

    ```bash
    php artisan key:generate
    ```

6.  dans votre SGBD (phpmyadmin, mysql workbench etc...) créer une base de données `laravel_blog`
    ce nom doit correspondre à la valeur de `DB_DATABASE` situé dans le fichier `.env`
7.  Lancez les migrations pour créer les tables dans la base de données :

    ```bash
    php artisan migrate
    ```

8.  Si vous souhaitez remplir la base de données avec des données initiales, exécutez les seeders :

    ```bash
    php artisan db:seed
    ```

9.  Pour démarrer le serveur localement, exécutez la commande suivante :

    ```bash
    php artisan serve --port 4000
    ```

10. Une fois les migrations et les seeders terminés, vous pouvez vérifier l'accès au blog en accédant à l'URL suivante :

    ```
    http://localhost:4000
    ```

11. Votre projet sera accessible à l'adresse suivante :

        ```
        http://localhost:4000
        ```

Si vous rencontrez des problèmes
effectuer les commandes suivantes :

```
php artisan cache:clear
php artisan config:clear
php artisan optimize
```

lancer la commande `npm install` dans le terminal de votre projet pour installer les dependances front end
lancer la commande `npm run dev` afin build et run les assets du projet.

Cette documentation vous guide à travers l'installation et la configuration du projet.

# NB: tous les envoi de mail peuvent être vu dans le ficher `laravel.log` situé dans le dossier `storage/logs/laravel.log` si vous utilisez docker, la cofiguration d'une boite mail comme mailtrap est aussi possible.
