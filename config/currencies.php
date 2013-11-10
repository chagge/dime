<?php 

/**
 *   To set a currency, you need to use the ISO-4217 code.
 *
 *   Sounds complicated, but it's just the three letters
 *   you use to describe the currency (like USD, GBP, EUR).
 *
 *   If you're not sure what yours is, here's a handy
 *   table for reference:
 *
 *   http://en.wikipedia.org/wiki/ISO_4217#Active_codes
 *
 *   If you provide an invalid currency code, Dime will go
 *   haywire, become sentinent and destroy mankind. That,
 *   or it'll just fall back to USD. I forget which one.
 */
$config['currency'] = 'GBP';