<?php 

include_once '../index.php';

if(isset($_GET['checkDatabase'])) {
    var_dump($_GET);
    exit;
}

include_once 'view.php';