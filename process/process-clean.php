<?php

require_once '../utils/autoloader.php';

session_start();

unset($_SESSION['user']);



header('Location: ../homepage.php');
exit;

?>