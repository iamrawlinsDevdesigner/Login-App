<?php
    /*$HOST_NAME = "localhost";
    $DB_USER = "freeuser";
    $DB_PASSWORD = "freepassword";
    $DB_NAME ="loginapp";

    $conn = mysqli_connect($HOST_NAME, $DB_USER, $DB_PASSWORD, $DB_NAME);
    if (!$conn) {
        die("No database Connection");
    } */


    $HOST_NAME = "localhost";
    $DB_USER = "freeuser";
    $DB_PASSWORD = "freepassword";
    $DB_NAME ="loginapp";


//create connection
    $conn = new mysqli($HOST_NAME, $DB_USER, $DB_PASSWORD, $DB_NAME);
//check connection
    if ($conn->connect_error) {
        die("No database Connection: " . $conn->connect_error);
    }
    echo "Connected";
?>