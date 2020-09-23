# Notes for Install / Setup

An example confiration file, `.env.example` has been provided for convenience. You can modify
settings such as database and credentials to suite your purposes. Make a copy
and call it `.env`.

A Docker Compose file is included that provides MySql and Mailhog containers.
You may use them or not. The configution settings for these containers are
already in the `.env` file.

Before attempting to use the app do the following:

Install Laravel vendor files using Composer from the command line:

```
composer install
```

Install npm packages (Optional - only if you need to rebuild assets for some
reason)

```
# cd to project root
npm install
npm run prod

# or for the unminified versions

npm run dev
```

Check setting in `.env` and make any changes that you would like to have made
and then run the following commands:

```
php artisan config:clear
```

If you'd like to use the Docker containers for this app run the following
command:

```
docker-compose up -d
```

Once the Laravel app is connected to a running database you will need to setup
the database table by running:

```
php artisan migrate
```

Then, you may proceed with the demo; e.g.

```
phpunit
php -S 127.0.0.1:9999 -t public

# Alternatively, to serve the app you can use if you like
php artisan serve --port=9999

```

