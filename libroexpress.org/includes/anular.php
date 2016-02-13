<?php
session_start();
unset($_SESSION['carro']);
header("Location:carrito2.php");
?>
