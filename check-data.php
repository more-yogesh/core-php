<?php
include_once('connection.php');
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // echo "SELECT * FROM users WHERE email = $email";
    $result = $db->query("SELECT * FROM users WHERE email = '$email'");
    // print_r($result);
    if ($result->num_rows > 0) {
        echo '0';
    } else {
        echo '1';
    }
}
