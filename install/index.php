<?php 

/**
 *   Dime installer
 *   You really don't need to touch anything here.
 *
 *   If you're trying to edit some settings or config
 *   items, it's in the config/ folder.
 *
 *   When Dime's installed, y'all need to delete this
 *   folder. Safety first!
 */
 
//  Make sure we grab the Dime core
include_once '../index.php';

//  Then make sure we have the installer, uh, installed.
include_once 'actions/run.php';

//  Stop any other PHP executing.
exit;