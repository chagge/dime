<?php 


/**
 *   Load every file in a directory. Simple, really.
 *
 *   load_dir(BASE . 'lib/core/*.php');
 */
function load_dir($dir) {
    foreach(glob($dir) as $file) {
        include_once $file;
    }
}