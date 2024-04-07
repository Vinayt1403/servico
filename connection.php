<?php
$db=mysqli_connect('localhost','root','','servo');


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>