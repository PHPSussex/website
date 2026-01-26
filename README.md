# PHP Sussex Website
This is the website for [PHP Sussex](https://phpsussex.uk). It's built
using Laravel and deployed to GitHub Pages.

## Installation
After cloning the repository it's the usual Laravel drill:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

## Local Development
During local development you can use your local development
server or run `php artisan serve`.

## Deployment
Deployment is handled by GitHub Actions. We're using
[Spatie Laravel Export](https://github.com/spatie/laravel-export)
to generate the static site under `/dist`. To run the export
manually it's as simple as:

```bash
php artisan export
```

## Slides

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
