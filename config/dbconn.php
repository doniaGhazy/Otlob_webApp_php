<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'test_db';
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    $errmsg = "";
    if (mysqli_connect_errno())
    {
        $errmsg = "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>