<?php 

/**
 *   Stripe
 *
 *   It's like PayBuddy (name changed so I don't get sued), but
 *   not awful. It's free to sign up and use, but you'll need an
 *   API key to use it. If, for some reason - it's not available
 *   in your country or your cult strictly forbids API keys - or
 *   something, you just straight-up can't use Dime for now. I
 *   REALLY didn't want to have to work with PayBuddy.
 *
 *   Anyway, if you could put your API key here, that'd be swell.
 *
 *   Find your API key here:
 *   > manage.stripe.com/account <
 */
$config['stripe_api'] = '';

/**
 *   Stripe only accepts a few currencies, based on what
 *   country you're in. You can pick any of them.
 *
 *   support.stripe.com/questions/what-currency-does-stripe-support
 */
$config['currency'] = 'GBP';