# Notes for Install / Setup

An example confiration file, `.env.example` has been provided for convenience. You can modify
settings such as database and credentials to suite your purposes. Make a copy
and call it `.env`.

A Docker Compose file is included that provides MySql and Mailhog containers.
You may use them or not. The configution settings for these containers are
already in the `.env` file.

Before attempting to use the app do the following:

Install Laravel vendor files using Composer from the command line. If you do not
have Composer installed on your computer you can grab a copy from
[https://getcomposer.org/download/]() or run the following code from your
command line:

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '795f976fe0ebd8b75f26a6dd68f78fd3453ce79f32ecb33e7fd087d39bfeb978342fb73ac986cd4f54edd0dc902601dc') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Once you have Composer, run the following command:

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

If you have questions, feel free to contact me at:

phone: 260-615-4382
email: me@christopherhowie.com
