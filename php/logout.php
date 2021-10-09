<?php
    
    session_start();
    
    require 'data.php';

    session_unset();

    session_destroy();

    header('Location: login3');
    
    exit();

?>
