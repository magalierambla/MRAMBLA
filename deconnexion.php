<?php 
session_start();
unset($_SESSION['user']);
header('Location: affichage_blog.php');

?>