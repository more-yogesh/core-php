<?php

require('../connection.php');
$id = $_POST['delete_id'];
// $id = $_GET['delete_id'];
$db->query("DELETE FROM `users` WHERE `id` = $id");
header('location:index.php?status=success');
?>