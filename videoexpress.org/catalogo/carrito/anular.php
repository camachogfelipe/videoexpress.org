<?php
session_start();
unset($_SESSION['carro']);
unset($_SESSION['tot_pel']);
unset($_SESSION['suma']);
header("Location:../inf_general/?op=1");
?>