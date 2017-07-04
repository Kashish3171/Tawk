<?php
session_start();
session_unset($_SESSION['id'],$_SESSION['name']);
session_destroy();
echo ' you have successfuly logged out';
?>
