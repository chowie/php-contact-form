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
npm run prod

# or for the unminified versions

npm run dev
```
