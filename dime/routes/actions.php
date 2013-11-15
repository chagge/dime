<?php 

/**
 *   Dime
 *
 *   Miscellaneous actions from the server and,
 *   well, anything that doesn't cover admin or site
 *   route calls.
 *
 *   This is where I like to put server errors,
 *   like 403/404, 500s, etc. although really, I'd
 *   like to just not have those errors.
 */
 
/**
 *   Handle 404s
 */
Route::not_found(function($url) {
    echo 'Sorry, the page <code>' . $url . '</code> couldn&rsquo;t be found.';
});