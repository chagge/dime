<?php 

include_once 'functions.php';

listen('checkDatabase', function() {
    echo json_encode(check_db(
        Input::get('db_host'),
        Input::get('username'),
        Input::get('password'),
        Input::get('name')
    ));
    
    exit;
});

include_once 'view.php';