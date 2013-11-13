<?php 

/**
 *   Here's where everything gets glued together.
 *   Pull in the core files, mash 'em up with the config
 *   and hope for the best.
 *
 *   I mean, it's a bit more complicated than that,
 *   but you know what I mean.
 *
 *   Bangers and mash. Wouldn't mind some bangers and mash.
 *
 *   Aw man, now I'm all hungry.
 */

//  Set up all our functions
include_once ROOT . 'dime/lib/functions.php';

//  Require the core files we need for now
//  It's not automated in case some hackers tries to
//  add naughty files. Bloody hackers.
foreach(array('config', 'database', 'route', 'input', 'url', 'response', 'payment') as $file) {
    include_once ROOT . 'dime/lib/core/' . $file . '.php';
}

//  Load all the config/ files.
Config::setup() and Config::load();

//  Are we installed?
if(Config::get('sitename', false) === false) {
    Response::redirect(BASE . 'install');
}

//  Run the routes