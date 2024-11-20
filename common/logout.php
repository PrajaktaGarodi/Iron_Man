<?php
session_start();
session_unset();
session_destroy();

header("Location: /login.php"); // Redirect to login page after logout

?>

<!-- <a href="/login.php"></a> -->