<?php
    $servername = "127.0.0.1";
    $username = "dashboard";
    $password = "dashboardDB123";
    $dbname = "dashboardDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>