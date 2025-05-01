# DEPLOY STEPS

Change your .env variables
```sh
DB_CONNECTION=pgsql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Build image
```sh
cd .deploy
docker build -f Dockerfile -t tennis-tournament-app ..
```


