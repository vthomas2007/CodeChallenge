Registration with Credit Card - Coding Challenge
==================
## Inspiration
Many applications require that credit cards be accepted. Security for this information is of the upmost importance. Most user flows will allow for the creation of a user and of credit cards separately, but sometimes, an application requires that both be submitted at the same time.

## Challenge
Using CakePHP's latest stable build, Stripe's PHP library - https://github.com/stripe/stripe-php - and JS library - https://stripe.com/docs/stripe.js - and the Payment Manager plugin - https://github.com/asugai/CakePHP-Payment-Manager - create a single page that will register a user and allow the user to enter a credit card at the same time. The user should have the following fields: first name, last name, email. The credit card should have: card number, expiration date, cvv2/cvc2.

## Requirements
1. Fork this repository
2. Create a branch with your name
3. Add whatever code is necessary to make your application match the challenge immediately above. There is no time limit for solving this problem.
5. When you have made your final commit, submit your code by sending a pull request to this repository.  Also send an email to andre@orainteractive.com to notify of your completion.

## Additional Functionality
1. Install packages with composer
2. Install and use the Environment Manager plugin - https://github.com/asugai/CakePHP-Environment-Manager - and setup your local environment through it
3. Install and use the Notification Manager plugin - https://github.com/asugai/CakePHP-Notification-Manager - and send an email to the new user using the NotificationUtility library
