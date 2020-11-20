<?php
$db = new mysqli('localhost','root','','world');


$countryQ= "SELECT * FROM countries";

$result=$db->query($countryQ);

$data=$result->fetch_object();
print_r($data);

?>