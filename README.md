# FreeTrial

This is a sample project by Josh Anthony demonstrating skills in Laravel and VueJS.

## Premise

This is a simple landing page designed to gather leads.

To read about the scope of this project, see `OriginalPlanOfExecution.md`. To see what the scope of the project would've looked like if I'd anticipated everything in advance, read `PlanOfExecution.md`.

This project was built using Laravel Homestead to stage the environment. If you have a global Homestead box, you can clone this repository into your equivalent `code` folder. You can also set up a local Homestead box specifically for this project. Otherwise, to run this project, you will need to satisfy the minimum requirements for using Laravel 5.8 and MySQL. You can read more about Homestead at https://laravel.com/docs/5.8/homestead and Laravel's requirements at https://laravel.com/docs/5.8/installation.

> If you run into an issue with PHP on Homestead, try configuring Homestead to use PHP 7.2 instead of 7.3 (as per https://github.com/laravel/homestead/issues/1031).

## Frontend

The frontend is responsively designed, and should look good for both desktop and mobile sizes. Twig was chosen instead of Blade for the templating engine, and Vue was chosen as the frontend framework. Bootstrap is also used in a supportive role, particularly on the mobile nav dropdown.

## Backend

There are two routes for this application:

- `free-trial`, the front-facing landing page.
- `api/free-trial-submit`, an API endpoint for verifying whether emails submitted from the Free Trial landing page are associated with existing users.

## Database Schema
The default Laravel user migration was used to generate the schema.
- id: bigInt
- name: varchar
- email: varchar, unique
- email_verified_at: timestamp, nullable
- password: varchar
- remember_token: varchar, 100
- created_at: timestamp, nullable
- updated_at: timestamp, nullable

A dump of the test data I generated is included in this project, under `database/dumps/FreeTrialDB.sql`. You will need to use this if you want to run the Laravel Dusk tests, as they will hit the development database your version of the app is being run on.

> Alternatively, you can go to the Dusk tests and change the email it's looking for to one that you know is in your own database.

## Testing

A few unit tests have been included with this project, for both PHPUnit and Laravel Dusk (for frontend testing). To run the PHPUnit tests, `./vendor/bin/phpunit` from the app directory. For Dusk, `php artisan dusk` from the app directory.

> If you run into issues with PHPUnit, try running the tests on your Homestead VM.

> If you run into issues with Dusk, make sure your Chrome browser is up to date, as that is what Dusk uses under the hood.