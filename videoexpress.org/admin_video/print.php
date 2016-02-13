<?php
session_start();
include("../catalogo/include/funciones_globales.php");
$conecta = conecta_bd("videoexpress");
$f1 = $_GET['f1'];
$f2 = $_GET['f2'];
$where = "fecha_cancelada >= '".$f1."' and fecha_cancelada <= '".$f2."'";
$opciones = "3;id_factura;ASC;$where;";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<title>Informe de rango de fecha facturas</title>
<link rel="stylesheet" type="text/css" href="adminprint.css" />
</head>

<body bgcolor="#ffffff">
<h3>Resultado del informe en el rango de fecha <?php echo $f1." a ".$f2 ?></h3>
<p>
    <strong>Base de datos:</strong> Facturas<br />
    <strong>Tiempo de generaci&oacute;n:</strong> <?php echo date("d-m-Y") ?> a las <?php echo date("h:i:s A") ?><br />
    <strong>Generado por:</strong> <?php echo $_SESSION['nombre'] ?><br />
    <strong>Filas:</strong> <?php echo $total_resultados = dato_columna("facturas","COUNT(*)",$opciones); ?>
</p>


<table id="table_results" class="data" style="font-size:12px;">
	<thead>
		<tr>
			<th width="5%" rowspan="2">Id</th>
        	<th width="29%">Comprador</th>
    	    <th width="34%">Direcci&oacute;n</th>
	        <th width="12%">Valor total Factura</th>
        	<th width="10%">Cancelada</th>
	        <th width="10%">Fact. de</th>
        </tr>
	</thead>
	<tbody>
    <?php	
	$res = consulta_bd("facturas", "id_factura, id_comprador, precio, fecha_cancelada, Pertenece_a", $opciones);
    
    $i = 0;
    echo "<tr>";
	while ($row = mysql_fetch_object($res))
    {
		echo '<tr>';
		//id
		$id = $row->id_factura;
		echo "<td align=\"center\">$id</td>";
		//id comprador
		if($row->id_comprador != 'Factura Anulada')
		{
			$sizeof = substr_count($row->id_comprador,'-');
			$id = $row->id_comprador;
			if ($sizeof > 0)
			{
				$res_datos = consulta_bd("usuarios","nombre, direccion","1;;;codigo_cliente='$id'");
				while ($r = mysql_fetch_object($res_datos))
				{
					$nombre = $r->nombre;
					$dir = $r->direccion;
				}
			}
			else
			{
				$res_datos = consulta_bd("clientes","nombres, direccion","1;;;id_cliente='$id'");
				while ($r = mysql_fetch_object($res_datos))
				{
					$nombre = $r->nombres;
					$dir = $r->direccion;
				}
			}
			echo "<td>".$nombre."</td>";
			echo "<td>".$dir."</td>";
		}
		else
		{
			echo "<td>".$row->id_comprador."</td>";
			echo "<td>".$row->id_comprador."</td>";
		}
		$total["precio"] += $row->precio;
		echo "<td align=\"right\">$ ".number_format($row->precio)."</td>";
		echo "<td align=\"center\">".$row->fecha_cancelada."</td>";
		if($pa[1] == NULL)
		{
			$pertenecea = $row->Pertenece_a;
			echo "<td align=\"center\">$pertenecea</td>";
		}
		echo "</tr>";
	}
	echo '<tr><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>$ '.number_format($total["precio"])."</th><th>&nbsp;</th><th>&nbsp;</th></tr>";
	mysql_free_result($res);
	desconecta_bd($conecta);
	?>
	</tbody>
</table>

    <script type="text/javascript">
//<![CDATA[
// Do print the page
window.onload = function()
{
    if (typeof(window.print) != 'undefined') {
        window.print();
    }
}
//]]>
</script>
        <script type="text/javascript">
//<![CDATA[
// updates current settings
if (window.parent.setAll) {
    window.parent.setAll('es-utf-8', '', '1', 'c274400_catalogo', 'usuarios', '5ea63094c0a43d11774552e6ae1f31d4');
}
    // set current db, table and sql query in the querywindow
if (window.parent.reload_querywindow) {
    window.parent.reload_querywindow(
        'c274400_catalogo',
        'usuarios',
        '');
}
    
if (window.parent.frame_content) {
    // reset content frame name, as querywindow needs to set a unique name
    // before submitting form data, and navigation frame needs the original name
    if (typeof(window.parent.frame_content.name) != 'undefined'
     && window.parent.frame_content.name != 'frame_content') {
        window.parent.frame_content.name = 'frame_content';
    }
    if (typeof(window.parent.frame_content.id) != 'undefined'
     && window.parent.frame_content.id != 'frame_content') {
        window.parent.frame_content.id = 'frame_content';
    }
    //window.parent.frame_content.setAttribute('name', 'frame_content');
    //window.parent.frame_content.setAttribute('id', 'frame_content');
}
//]]>
</script>
</body>
</html>