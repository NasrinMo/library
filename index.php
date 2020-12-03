<?php
session_start();

include('config/connexion.php');

$controller = new Controller();
$controller->router();

?> 
