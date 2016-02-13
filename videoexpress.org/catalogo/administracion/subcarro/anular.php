<?php
session_start();
unset($_SESSION['carro_admin']);
unset($_SESSION['pel_alq_admin']);
unset($_SESSION['res_admin']);
header("Location:catalogo.php");
?>