<?php 

/**
 *
 */
 
Route::get('(:any)', function($url) {
    echo $url;
});