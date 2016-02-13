<?php
session_start();
?>
<HTML>
<HEAD>
<TITLE>Actualizar capital</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../../estilo.css" rel="stylesheet" type="text/css">
<?php
  // check session variable

if (isset($_SESSION['user_admin']))
{
?>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["dia_celebrar"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert
textoObligatorio=["Día a celebrar"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(este.elements[obligatorio[a]].value == "")
		{
			alert("Por favor, rellena el campo "+textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}
</script>
</HEAD>
<BODY style="color:#000">
<center>
<?php
$dia_celebrar	= $_REQUEST["dia_celebrar"];
$ing		= $_REQUEST['ing'];
/*$anio		= $_REQUEST['anio'];
$year		= date(Y);
$mes		= date(n);
$dia		= date(j);*/
include('../../include/funciones_globales.php');
$conecta = conecta_bd("videoexpress");
$result = consulta_bd("actualizacion","dia_celebrar","-1;;;;");
while ($row = mysql_fetch_object($result))
{
	$dia_actual = $row->dia_celebrar;
}

if($ing == 1)
{
	$query = act_datos_tabla("actualizacion","dia_celebrar='$dia_celebrar'","",0);
	echo "El día a celebrar ha sido actualizado con exito";
	$dia_actual = $dia_celebrar;
}
?>
<form action="reportes.php?r=idac&ing=1" method="post" enctype="multipart/form-data" onSubmit="return comprobar(this)">
  <table width="400" border="1px" cellspacing="0" cellpadding="2px" align="center" style="border-style:dotted; background-color:#9ABEDC; color:#000">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="2px" style="color:#000">
         <tr>
          <td width="40%">Día actual</td>
          <td width="40%"><?php echo $dia_actual ?></td>
         </tr>
  	 <tr height="30px">
	  <td width="40%">Día a celebrar</td>
          <td width="60%"><input name="dia_celebrar" type="text" size="20" tabindex="1" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" maxlength="6" ></td>
	 </tr>
    </table>
   </td>
  </tr>
  <tr>
    <td align="center">
     <a id="flechas" onClick="history.go(-1)" style="cursor:pointer" ><img src="../../botones/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Cancelar</a>
     <input name="enviar" type="submit" value="Actualizar el día a celebrar" tabindex="2" />
    </td>
  </tr>
</table>
</form>
</center>
</BODY>
</HTML>
<?php
}
else
{
	include ('index.php');
}
?>
