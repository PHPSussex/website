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
### Slides
Slides are stored in a separate private repository. You
do not need them to work on the main site. If you have
access and would like to install them locally pull in
the Git submodule:

```bash
git submodule update --init
```

Then switch to the main branch (only necessary if you're making changes):
```bash
cd resources/views/pages/slides
git switch main
```

By default slides are available under the `/slides` URL prefix. In production it
may be useful to serve them from a different path if they need to be obfuscated
until the night of an event but still accessible from the website by presenters.

```env
SLIDES_PREFIX='9a2dac4d-4d77-4618-9dab-cb7ab26d1c01'
```

Slides will then be available under `/slides/9a2dac4d-4d77-4618-9dab-cb7ab26d1c01`.

#### Committing Slides
To commit changes to slides first make the commit as usual *inside*
the submodule directory `resources/views/pages/slides` and push it.
The main website repository should now show there are changes in the
slides directory when you run `git status` outside the slides submodule.
You may add the slides directory and commit to the main repository.

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
