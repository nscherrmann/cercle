<?php
include 'session.php';
// Suppression de toutes les variables et destruction de la session
$_SESSION = array();
session_destroy();

header('Location: login.php');
?>