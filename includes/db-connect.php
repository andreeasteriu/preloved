<?php

    $dbServerName = 'localhost';
    $dbUserName = 'root';
    $dbpassword = 'MyNewPass';
    $dbName = 'preloved';
    $charset = 'utf8';
   
    try {
        $dsn = "mysql:host=".$dbServerName.";dbname=".$dbName.";charset=".$charset;
        $dbh = new PDO($dsn, $dbUserName, $dbpassword, array(
            PDO::ATTR_PERSISTENT => true));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch (PDOException $e) {
        echo "Connection failed: ".$e->getMessage();
    }
   


