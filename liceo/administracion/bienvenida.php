<?php
session_start();
?>
<link href="../estilo.css" rel="stylesheet" type="text/css">
<div style="padding: 50px">
<div id="img3"><img src="iconfolder/welcome.png" width="128" height="128" /></div>
<?php
echo "<p>Bienvenido ".$_SESSION['nombre']." ".$_SESSION['apellidos']."</p>";

include("conexion.php");
$codigo = $_SESSION['codigo'];
$query = mysql_query("SELECT ultimo_acceso FROM profileusuario WHERE codigo = '$codigo'");
  
while($row=mysql_fetch_object($query))
{
	$ua = explode(" ", $row->ultimo_acceso);
	$fecha = explode("-", $ua[0]);
	$hora = explode(":", $ua[1]);
	$ds = dia_semana($fecha); echo "<p>";
	$mes = mes($fecha[1]);
	echo "Su &uacute;ltimo acceso fu&eacute; el ".$ds." ".$fecha[2]." de ".$mes." de ".$fecha[0];
	echo " a las ";
	if($hora[0] > 12)
	{
		$h = $hora[0] - 12;
		if($h < 10) echo "0";
		echo "$h:$hora[1]:$hora[2]";
		echo " p.m.";
	}
	else echo $ua[1]." a.m.";
}


if($_SESSION['tipo_usuario'] == 0)
{
	$user = $_SESSION['valid_user'];
	$query = mysql_query("SELECT COUNT(*) FROM alumnos WHERE user = '$user'");
	$t = mysql_fetch_array($query);
    $total += $t[0];

	echo "<p>";
	if($total > 0) echo 'Usted tiene <span id="menu_admon"><a class="menu_admon" href="up_file_alumno.php?accion=listar">'.$total.'</a></span> alumnos registrados con tareas';
	else echo "Usted no ha registrado tareas de ninguno de sus alumnos";
	echo ".</p>";
}

function dia_semana ($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Mi&eacute;rcoles', 'Jueves', 'Viernes', 'Sábado');
    return $dias[date("w", mktime(0, 0, 0, $fecha[1], $fecha[2], $fecha[0]))];
}

function mes($mes)
{
	switch ($mes)
    {
	   case 01 : $mes = "Enero";
                break;
	   case 02 : $mes = "Febrero";
                break;
	   case 03 : $mes = "Marzo";
                break;
	   case 04 : $mes = "Abril";
                break;
	   case 05 : $mes = "Mayo";
                break;
	   case 06 : $mes = "Junio";
                break;
	   case 07 : $mes = "Julio";
                break;
	   case 08 : $mes = "Agosto";
                break;
	   case 09 : $mes = "Septiembre";
                break;
	   case 10 : $mes = "Octubre";
                 break;
	   case 11 : $mes = "Noviembre";
                 break;
	   case 12 : $mes = "Diciembre";
                 break;
    }
	return $mes;
}
?>
</div>