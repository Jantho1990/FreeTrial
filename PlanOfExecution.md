# Plan of Execution: Free Trial Email Verification Tool

##### by Josh Anthony

## Introduction
We want to offer a Free Trial signup process for potential new customers. As this is a marketing outreach, we do not want to extend this offer to users who have previously registered on our site.

## Goal
The goal for this project is to build a landing page offering this free trial functionality, allowing users to submit their email via an AJAX form. Our backend will then be responsible for detecting whether the email submitted belongs to a user in our system. If it does, the backend will send a response that the frontend will interpret to show a second form; otherwise, the user will be taken to a sign-up page for the free trial.

For this stage of the plan, we will simply build a prototype of this page using Laravel Homestead. Future discussion will warrant implementing this page on our existing infrastructure.

## Technologies

The following technologies will be used:

**Backend**
- Laravel 5.8
- MySQL Database

**Frontend**
- Twig Templating
- SASS Styling
- VueJS
- Axios (for handling AJAX)

## Requirements

The following is a more detailed breakdown of requirements and funcionalities this prototype will portray.

### Backend

#### Laravel

Laravel will be used to handle all backend interaction for this prototype.

Two routes will be used:

- `free-trial`, which returns the `free-trial` Blade view containing our landing page.
  - The url will be `/free-trial`.
- `free-trial-user-exists`, an AJAX endpoint which will return whether the submitted email is associated with a user in our database.
  - The url will be `/api/free-trial-submit`.
    - We will not use `/free-trial-user-exists`, as that would simply make it immediately obvious to a potential bad actor what this endpoint is doing.
  - The response from this endpoint will be a simple boolean: `false` if the user doesn't exist, `true` if they do.
  - The endpoint will also be responsible for applying rate throttling measures to prevent bots from flooding submissions to our endpoint. This both reduces spam and prevents scraping user emails by detecting negatory return values.
  - To make it less obvious to the front-end what data this request is returning

We will install rcrowe's [TwigBridge](https://github.com/rcrowe/TwigBridge) package to allow us to use Twig templating syntax, instead of Laravel's default Blade. This is so we can emulate our existing production environment, which uses Twig templates.

Three views will be used:
- `base`, a simple view containing code that all pages of our prototype website would use.
  - Although this is not strictly needed for testing our landing page, it is good practice to replicate what we would use in a "live" setting.
- `header`, a view which contains a facsimile of our existing header, as shown in the mock.
  - This will be display-only; no JavaScript logic will be used.
  - We will, however, use responsive design so our header will resemble how it would appear at mobile sizes.
- `free-trial`, a page view extending our base view, containing the H1 and tagline presented in the mockup, as well as a div which will house our Vue component.

> Our mock does not include a footer, so we will not include a facsimile of it in this prototype.

#### MySQL
MySQL will be used as the database for this prototype.

Since we are only interested in checking a user's email, we will not attempt to replicate our existing user data precisely; instead, we will run Laravel's default migrations, which will create a Users table as part of the processes, and create a single seeder, `UsersTableSeeder`, to populate the database with test data.

> After the test data is generated, we will also create a dump of the database for other users to use for their tests.

The `README` file will contain an outline of the database schema.

### Frontend

As mentioned previously, we will be using Twig templates to construct our page. The page design for desktop will match the provided mock design. We will use this as the base for styling the page responsively so that it will be presentable at tablet and mobile sizes.

SASS will be used to style the page. To speed up development of the prototype, Bootstrap will also be used for default styling needs.

The form itself will be built as a Vue application consisting of three components:

- `FreeTrialApp`, the main application component, which will contain two primary components: `FormPanel` and `ExistingUserPanel`.
  - This will also contain the logic for submitting the AJAX request, triggered by a child event (see `FormPanel`).
  - In the event that the form submission returns `false` (the user does not exist), `FreeTrialApp` will initiate URL navigation to the following URL: https://pro.creativemarket.com/sign-up
- `FormPanel` will contain our marketing copy, as shown in the mock, and an email submission form. When the form is submitted, the default submission will be prevented, and the component will emit a `form-submitted` event that the `FreeTrialApp` component is listening for.
- `ExistingUserPanel` is what `FreeTrialApp` will show if the AJAX request returns `true` (the user does exist). It simply consists of some text and a button link to our catalog.

### Additional Requirements

All PHP code will be formatted to adhere to `PSR-2`.

## Testing

PHPUnit will be used to test the backend API endpoints to ensure the proper responses are sent, while Dusk will be used to test that the frontend views, particularly the Vue components, are displayed correctly in response to test email submissions.

## Timeframe
This project should be completed in roughly 3-4 hours.