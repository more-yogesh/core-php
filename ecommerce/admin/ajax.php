<?php

$con = new mysqli('localhost', 'root', '', 'crude');

if (isset($_POST['add_user'])) {
    // print_r($_POST);exit;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con->query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
}

if (isset($_REQUEST['remove_id'])) {
    $id = $_REQUEST['remove_id'];

    $con->query("DELETE FROM users where id = $id ");
}

if (isset($_REQUEST['all-users'])) {
    $users = $con->query("SELECT * FROM users");
    $allArray = [];
    $counter = 0;
    while ($user = $users->fetch_object()) {
        $allArray[$counter]['id'] = $user->id;
        $allArray[$counter]['email'] = $user->email;
        $allArray[$counter]['password'] = $user->password;
        $counter++;
    }
    // print_r($allArray);
    echo json_encode($allArray);
}
