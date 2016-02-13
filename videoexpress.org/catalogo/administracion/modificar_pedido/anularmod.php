<?php
session_start();
unset($_SESSION['carro_admin_mod']);
unset($_SESSION['pel_alq_admin_mod']);
unset($_SESSION['res_admin_mod']);
unset($_SESSION['id_fac']);
header("Location:../listas/pedidos.php");
?>