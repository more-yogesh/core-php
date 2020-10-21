<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <ul>
            <li>Home</li>
            <li>Contact</li>
            <li>About</li>
            <li>Terms & Conditions</li>
        </ul>
    </div>
    <?php
    include_once('../util.php');
    if (isset($_SESSION['isLogin'])) {
        $user = $_SESSION['user'];
    ?>
    Hi, <?php echo ucfirst(strtolower($user->name));?> (<a href="<?php echo base_url('authenticate/logout.php')?>">LOGOUT</a>)
    <?php
    } else {
    ?>
        <a href="<?php echo base_url('authenticate/login.php') ?>">Login</a>
        <a href="<?php echo base_url('authenticate/register.php') ?>">Register</a>

    <?php
    }
    ?>