<?php
$conn = mysqli_connect("localhost", "root", "", "webshop");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>