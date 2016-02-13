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

obligatorio = ["capital"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert
textoObligatorio=["Capital"];

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
$capital	= $_REQUEST["capital"];
$ing		= $_REQUEST['ing'];
$anio		= $_REQUEST['anio'];
$year		= date(Y);
$mes		= date(n);
$dia		= date(j);

if($ing == 1)
{
	include('../../include/funciones_globales.php');
	$conecta = conecta_bd("videoexpress");
	$year = "anio_".date(Y);
	$result = consulta_bd("ingresos_y_capital","$year, total","1;;;id='7';");
	while ($row = mysql_fetch_object($result))
	{
		$capital_org	= $row->$year;
		$total_org		= $row->total;
	}
	$capital_org	+= $capital;
	$total_org		+= $capital;

	$query = act_datos_tabla("ingresos_y_capital","$year='$capital_org', total='$total_org'","id='7'",1);
	$year = date(Y);
	echo "El capital ha sido actualizado con exito";
}
?>
<form action="reportes.php?r=ic&ing=1" method="post" enctype="multipart/form-data" onSubmit="return comprobar(this)">
  <table width="400" border="1px" cellspacing="0" cellpadding="2px" align="center" style="border-style:dotted; background-color:#9ABEDC; color:#000">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="2px" style="color:#000">
  	 <tr height="30px">
      <td width="40%">Capital</td>
      <td width="60%"><input name="capital" type="text" size="20" tabindex="1" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" maxlength="10" ></td>
	 </tr>
  	 <tr height="30px">
      <td>A&ntilde;o</td>
      <td>
      <select name="anio" id="anio" tabindex="2">
      	<?php
			if($mes == 1 and $dia >= 1 and $dia <= 31)
			{
				$y = $year--;
				echo "<option value=\"$y\">$y</option>";
			}
		?>
        <option value="<?php echo $year ?>"><?php echo $year ?></option>
      </select>
      </td>
     </tr>
    </table>
   </td>
  </tr>
  <tr>
    <td align="center">
     <a id="flechas" onClick="history.go(-1)" style="cursor:pointer" ><img src="../../botones/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Cancelar</a>
     <input name="enviar" type="submit" value="Actualizar el capital" tabindex="3" />
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