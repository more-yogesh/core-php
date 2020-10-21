<?php
session_start();
session_destroy();
header('location:../authenticate/login.php');
