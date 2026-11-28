# PHP Sussex Website
This is the website for [PHP Sussex](https://phpsussex.uk). It's built
using Laravel and deployed to GitHub Pages.

A GitHub action rebuilds nightly, checking for upcoming
event details on https://meetup.com. 

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

The deploy workflow runs on every push to `main`, nightly at
midnight UTC, and can be triggered manually from the Actions tab.
See the next section on dependency updates, as these ensure GitHub
does not switch off the scheduled deploy after 60 days. 

## Syncing Next Event
Next event details are stored in the setting `App\Models\Settings\NextEvent`
which defaults to a generic message displayed when no upcoming events
are scheduled. You may run the `app:sync-next-event` command to Retrieve
details about the next scheduled event. The command uses Laravel Browsershot
to retrieve client-rendered HTML from Meetup As this isn't visible to
Laravel's built-in HTTP client, 

## Dependency Updates
Dependabot checks Composer, npm and GitHub Actions dependencies
daily. Composer minor and patch updates are merged automatically
once tests pass, after a three-day cooldown on new releases. Major
Composer updates, and all npm and GitHub Actions updates, are left
for manual review. The regular merges
also keep the repository active, so GitHub doesn't disable the
nightly deploy after 60 days of inactivity.

To enable this on a repository (including forks):

1. **Settings → General → Pull Requests**: tick **Allow auto-merge**.
2. **Settings → Rules → Rulesets**: add a branch ruleset targeting
   `main` with **Require status checks to pass** enabled and the
   `tests` check added. Without this, auto-merge would merge
   Dependabot PRs immediately without waiting for tests. Add the
   **Repository admin** role to the bypass list so maintainers can
   still push directly to `main`.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
