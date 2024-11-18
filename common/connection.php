<?php

$conn = mysqli_connect("localhost","root","","iron-man",);

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

?>