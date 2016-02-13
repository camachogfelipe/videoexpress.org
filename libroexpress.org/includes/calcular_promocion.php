<?php
$tmp = ($precio_dolares * $porcentaje_promocion) / 100;
$precio_pos_dolar = $precio_dolares - $tmp;
$precio_pos_pesos = $precio_pos_dolar * $trm;
$precio_pos_pesos = ceil($precio_pos_pesos);
?>
