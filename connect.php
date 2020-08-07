<?php
    $dsn = 'mysql:host=172.31.22.43;dbname=Abhishek200449413';
    $username = 'Abhishek200449413';
    $password = 'sahlUZPt8h';
    $db = new PDO($dsn, $username, $password);
    //set error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
