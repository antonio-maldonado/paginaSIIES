<?php

    $server='192.185.17.37';
    $username='pcty_regact';
    $password='C%UPAV7YrD0v';
    $database='pcty_regact';

    try{

        $conn=new PDO("mysql:host=$server;dbname=$database;",$username,$password);

    }catch(PDOException $e){

        die('Connected failed: '.$e->getMessage());
        
    }

?>