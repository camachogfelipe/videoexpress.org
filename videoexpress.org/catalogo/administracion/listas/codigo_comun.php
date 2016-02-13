<?php
	if(isset($pag))
	{
		$registro_a_empezar = ($pag - 1) * $registros_a_mostrar;
		$pag_actual = $pag;
	}
	else
	{
		$registro_a_empezar = 0;
		$pag_actual = 1;
	}
	echo $pagina;
	if($pagina == "facturas") $opciones = "5;$orden1[0];$orden1[1];Pertenece_a='videx';$registro_a_empezar/$registros_a_mostrar";
	else $opciones = "6;$orden1[0];$orden1[1];;$registro_a_empezar/$registros_a_mostrar";
	echo $opciones."<br />";
	$result = consulta_bd($tabla,$datos,$opciones);
	
	$No_items = dato_columna($tabla,"COUNT(*)","-1;;;;");
	
	$total_paginas = ceil($No_items / $registros_a_mostrar);
	if($total_paginas == 0) $total_paginas = 1;
	
	if($pag > $total_paginas) $pag = $total_paginas;
	$s = $registro_a_empezar + $registros_a_mostrar;
	if($s > $No_items) $s = $No_items;
?>
<div class="encabezado_tabla">Mostrando registros de <?php echo $registro_a_empezar." a ".$s ?>;&nbsp;&nbsp;&nbsp;&nbsp;Total registros: <?php echo $No_items ?></div><br />