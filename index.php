<?php 

/**
 *       __ __                 
 *   .--|  |__|.--------.-----.
 *   |  _  |  ||        |  -__|
 *   |_____|__||__|__|__|_____|
 *
 *   Hello. (Is it me you're looking for?)
 *
 *   This is Dime. It's a simple little shop management system
 *   written in PHP, originally by @idiot. If you're looking at
 *   this file, I can assume you're trying to find your way
 *   around. Here's the location of some things:
 *
 *   If you're looking for theme files, they're in extend/themes/.
 *
 *   If you're looking for plugins, they're in extend/plugins/.
 *
 *   If you're looking for site options, they're in the admin
 *   panel or in the config/ folder.
 *
 *   If you're looking for any other functionality, it's probably
 *   in the dime/ folder. Anything you touch in there is likely
 *   going to break anything else, so be SUPER CAREFUL YO.
 *
 *   Any problems, questions, or whatever, just send me a tweet.
 *   I'll do my best to try and help (it doesn't hurt to try and
 *   bribe me with GIFs, by the way). If not, file a GitHub issue
 *   (the URL is http://github.com/codin/dime), and it'll get
 *   looked at there as well.
 *
 *   Anyway, I've gotta run. Systems to power, comments to write.
 *   Toodle-pip!
 */

//  Set a minimum version of PHP 
define('REQUIRED_PHP_VERSION', '5.3.2');

//  Make sure the old fogeys aren't trying to use PHP 3.
if(version_compare(phpversion(), REQUIRED_PHP_VERSION) < 0) {
    include_once 'dime/errors/old.php';
    exit;
}

//  Just try and work out where we are on the site
//  Some folks use subfolders, some don't. We cool with
//  all you guys.
define('ROOT', dirname($_SERVER['SCRIPT_FILENAME']) . '/');

//  This one's to use publicly. Like
//  echo '<img src="' . BASE . 'assets/logo.png">
//  or whatever.
define('BASE', dirname($_SERVER['SCRIPT_NAME']));

//  5
//  DUN
//  4
//  DUN
//  3
//  DUN
//  2
//  DUN
//  1
//  DUN
//  BOOM
//
//  THUNDERBIRDS ARE GO
//
//  Man, filmed in Videocolor. Back in the day, huh?
//  Anyway, yeah, here goes.
require_once ROOT . 'dime/run.php';