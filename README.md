# Tennis Tournament API

## Requirements
- git
- docker
- docker-compose

## Configuration locally
Create a new enviroment file.

```sh
cd tennis-tournament
cp .env.example .env
```

Install the dependencies.

```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install
```


Run the containers
```sh
./vendor/bin/sail up -d
```

### Database
Run migrations
```sh
./vendor/bin/sail artisan migrate
```

Run seeder for Players
```sh
./vendor/bin/sail artisan db:seed --class=PlayerSeeder
```

By default, the API must be running in localhost:80

## API Docs
You can find the API docs for this proyect in the following [link](https://documenter.getpostman.com/view/1096358/2sB2j3DCmm).

## Tests

## TODO
- Add type in Tournaments (best3-best5).
- Allow doubles matches.