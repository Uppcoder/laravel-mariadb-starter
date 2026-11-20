# Laravel + MariaDB starter

[![Deploy to Uppcoder](deploy-to-uppcoder.svg)](https://portal.uppcoder.com/cust-portal/deploy?starter=laravel-mariadb-starter&utm_source=github&utm_medium=repo&utm_campaign=laravel-w48)

A small Laravel 13 app on MariaDB, ready to deploy: a notes page whose table is created by a migration, a `/status`
page that shows the database is reachable, and the HTTPS proxy already trusted. Use it as the first commit of your
own project, or just to see Laravel and a real database running together.

## What's inside

- **Laravel 13** (PHP 8.4), the standard skeleton plus three small changes:
  - `routes/web.php`: the notes page (`/`, add a note) and `/status` (JSON: database reachable, driver, server version, number of notes)
  - `database/migrations/..._create_notes_table.php` and `app/Models/Note.php`
  - `bootstrap/app.php`: `trustProxies(at: '*')`, so URLs, redirects and signed links use `https` and the app's public address behind a proxy
- **Database settings from the environment**: `DB_CONNECTION=mariadb`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`. Nothing is hard-coded.

`/status` is used instead of `/health` because on Uppcoder the platform itself answers `/health`.

## Deploy it on Uppcoder (free plan)

[Uppcoder](https://portal.uppcoder.com/developers?utm_source=github&utm_medium=repo&utm_campaign=laravel-w48) runs the
app and its MariaDB database on their own HTTPS address, with VS Code in the browser and a terminal. The free plan needs
no card and has no time limit.

Press the button above: it opens Uppcoder's deploy page with this starter and MariaDB filled in. New to Uppcoder? Sign
up there, confirm your email, and start the free plan (Spark) in one click on the same page. Then Deploy. Uppcoder
clones the repository, runs `composer install`, sets an `APP_KEY`, passes the database settings in `DB_*`, runs
`php artisan migrate` and starts the scheduler beside the app.

Or set it up by hand: Stacks, Create, the **Laravel + MariaDB** template, and give the Laravel card this repository's
address (or your fork's).

## Run it anywhere else

```bash
git clone https://github.com/Uppcoder/laravel-mariadb-starter.git
cd laravel-mariadb-starter
composer install
cp .env.example .env && php artisan key:generate
# set DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD in .env (or the environment) for your MariaDB or MySQL
php artisan migrate
php artisan serve
```

## License

MIT, like Laravel itself.
