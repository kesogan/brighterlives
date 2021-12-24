# BrighterLives :)

This is a project for the 21 days of yellocare initiative to provide a platform where association can present and showcase what they do!

## How to use this repo

Perform the operations below.

```
gh repo clone kesogan/brighterlives
cd brighterlives
composer install
composer du
```

Once that is done, make sure you update your `.env` file to capture you database configuration

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=brighterlives
DB_USERNAME=root
DB_PASSWORD=
```

After that run the commands below from your terminal

```
php artisan migrate:fresh --seed
```

After migration is completed, start your server and navigate to the default page.
Login using the credentials below to access the admin dashboard

```
username: admin@liftus.com
password: secret
```

## Let's make this happen .. :)
