<?php
// Script pour la déconnexion du user
session_start();
$_SESSION = array();
session_destroy();
header('location: ../index.php');
?>
