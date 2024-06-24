<?php


$_SESSION['user_name'] = 'Guest';

session_destroy();

header("Location: index.php");
exit;
?>