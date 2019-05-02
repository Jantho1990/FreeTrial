# FreeTrial

This is a sample project by Josh Anthony demonstrating skills in Laravel and VueJS.

To read about the scope of this project, see `PlanOfExecution.md`.

This project was built using Laravel Homestead to stage the environment. If you have a global Homestead box, you can clone this repository into your equivalent `code` folder. You can also set up a local Homestead box specifically for this project. Otherwise, to run this project, you will need to satisfy the minimum requirements for using Laravel 5.8 and MySQL. You can read more about Homestead at https://laravel.com/docs/5.8/homestead and Laravel's requirements at https://laravel.com/docs/5.8/installation.

> If you run into an issue with PHP on Homestead, try configuring Homestead to use PHP 7.2 instead of 7.3 (as per https://github.com/laravel/homestead/issues/1031).

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