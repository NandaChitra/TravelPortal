<?php
    $connection = mysqli_connect('localhost', 'root', 'admin');
    
    if (!$connection){
        die("Database Connection Failed" . mysqli_error($connection));
    }
    
    $select_db = mysqli_select_db($connection, 'PHPprojects');
    if (!$select_db){
        die("Database Selection Failed" . mysqli_error($connection));
    }
    else { 
        echo("Successfully connected to DB");
    }
?>