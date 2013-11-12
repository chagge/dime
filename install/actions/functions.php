<?php 

/**
 *   Installer functions
 *
 *   Just to try and tidy this whole shebang up a bit.
 */
 
//  Tidying $_GET up a bit
//  We don't use Input::get() because it doesn't check if something's set
function listen($url, $callback) {
    if(isset($_GET[$url])) {
        return $callback();
    }
}

/**
 *   Test the MySQL connection without actually doing anything
 *   
 */
function check_db($host, $username, $password, $name) {
    $db = @new mysqli($host, $username, $password, $name);
    
    if($db->connect_error) {
        $errors = array(
            'php_network_getaddresses' => 'Invalid database host',
            'Access denied for user' => 'Username or password is wrong'
        );
        
        foreach($errors as $old => $new) {
            if(strpos($db->connect_error, $old) !== false) {
                return $new;
            }
        }
        
        return $db->connect_error;
    }
    
    return !!$db->close();
}