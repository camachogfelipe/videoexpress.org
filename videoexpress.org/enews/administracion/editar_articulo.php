<?php
session_start();
?>
<HTML>
<HEAD>
<TITLE>Actualizar base de datos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../estilo.css" rel="stylesheet" type="text/css">
<?php
  // check session variable

if (isset($_SESSION['valid_user']))
{
?>
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["titulo_articulo", "fecha"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert
textoObligatorio=["Escribe el titulo del articulo", "Escribe la fecha de publicacion del articulo"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(este.elements[obligatorio[a]].value == "")
		{
			alert("Por favor, "+textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}
</script>
</HEAD>
<BODY>
<center>
<?php
$info[No]					= $_REQUEST["No"];
$info[articulo]				= $_REQUEST["articulo"];
$editar 					= $_REQUEST['editar'];

if ($editar == true)
{
	$bd = "enews";
	include ("conexion.php");

	$sql = "select * FROM $info[articulo] WHERE No_seccion='$info[No]'";
	$result = mysql_query($sql) or die("La siguiente consulta contiene algún error:<br>nSQL: <b>$sql</b>");

	while ($row = mysql_fetch_object($result))
	{
		$No = $row->No_seccion;
		$info[titulo_articulo] = $row->Titulo;
		$info[texto_articulo] = $row->Texto;
		$info[img_photo_main] = $row->Img_photo_main;
		$info[fecha] = $row->fecha;
	}
	
	$fecha = explode(" ", $info[fecha]);
}
?>
<form action="<?php if($editar == true)
	  {
		echo "editar_articulo2.php?editar=true&img_photo_main=$info[img_photo_main]";
	  }
	  else
	  {
		  echo "editar_articulo2.php";
	  } ?>" method="post" enctype="multipart/form-data" onSubmit="return comprobar(this)">
  <table width="800" border="1px" cellspacing="0" cellpadding="2px" align="center" style="border-style:dotted; background-color:#FFF; color:#000; font-size: 10px">
  <tr>
    <td>
    <table width="800" border="0" cellspacing="0" cellpadding="2px" style="color:#000">
<?php if($editar == true)
	  {
		echo "<tr><td width='35%'>ID</td><td width='40%'>$info[No]<input name='No' type='hidden' id='No' size='10' maxlength='3' value='$info[No]'</td></tr>";
	  } ?> 
     <tr height="30px">
     <td>Articulo</td>
      <td>
       <select name="articulo" id="articulo" tabindex="1">
         <option value="buenas_nuevas" <?php if ($info[articulo] == 'buenas_nuevas') echo "selected='selected'"; ?>>Buenas nuevas</option>
         <option value="garabatos" <?php if ($info[articulo] == 'garabatos') echo "selected='selected'"; ?>>Garabatos</option>
         <option value="nueva_mente" <?php if ($info[articulo] == 'nueva_mente') echo "selected='selected'"; ?>>Nueva mente</option>
         <option value="para_editar" <?php if ($info[articulo] == 'para_editar') echo "selected='selected'"; ?>>Para editar</option>
         <option value="primera_fila" <?php if ($info[articulo] == 'primera_fila') echo "selected='selected'"; ?>>Primera fila</option>
       </select>
      </td>
     </tr>   
	 <tr height="30px">
	  <td width="40%">Titulo del articulo</td>
	  <td width="60%"><input name="titulo_articulo" type="text" id="titulo_articulo" tabindex="2" size="50" style="color:#000" value="<?php if($editar == true)
	  {
	  	echo "$info[titulo_articulo]";
	  } ?>" /></td>
	 </tr>
	 <tr>
	  <td>Imagen del encabezado</td>
      <td>
        <?php if($editar == true)
	   {
		   echo "<img src=\"../imagenes-para-secciones/photo-main/$info[img_photo_main]\" width=\"150\" height=\"75\">";
	   } ?><br><input name="img_photo_main" type="file" size="35" tabindex="3" />
      </td>
     </tr>
     <tr height="30px">
      <td>Fecha del articulo</td>
      <td>
       <select name="fecha" id="fecha" tabindex="4">
         <option value="Enero" <?php if ($fecha[0] == 'Enero') echo "selected='selected'"; ?>>Enero</option>
         <option value="Febrero" <?php if ($fecha[0] == 'Febrero') echo "selected='selected'"; ?>>Febrero</option>
         <option value="Marzo" <?php if ($fecha[0] == 'Marzo') echo "selected='selected'"; ?>>Marzo</option>
         <option value="Abril" <?php if ($fecha[0] == 'Abril') echo "selected='selected'"; ?>>Abril</option>
         <option value="Mayo" <?php if ($fecha[0] == 'Mayo') echo "selected='selected'"; ?>>Mayo</option>
         <option value="Junio" <?php if ($fecha[0] == 'Junio') echo "selected='selected'"; ?>>Junio</option>
         <option value="Julio" <?php if ($fecha[0] == 'Julio') echo "selected='selected'"; ?>>Julio</option>
         <option value="Agosto" <?php if ($fecha[0] == 'Agosto') echo "selected='selected'"; ?>>Agosto</option>
         <option value="Septiembre" <?php if ($fecha[0] == 'Septiembre') echo "selected='selected'"; ?>>Septiembre</option>
         <option value="Octubre" <?php if ($fecha[0] == 'Octubre') echo "selected='selected'"; ?>>Octubre</option>
         <option value="Noviembre" <?php if ($fecha[0] == 'Noviembre') echo "selected='selected'"; ?>>Noviembre</option>
         <option value="Diciembre" <?php if ($fecha[0] == 'Diciembre') echo "selected='selected'"; ?>>Diciembre</option>
       </select> 
       de <select name="anio" id="anio" tabindex="5">
	   <?php
	   		$mes = date(n);
			$anio = date(Y);
			
			if ($mes == 12)
			{
				echo "<option value=\"$anio\" \"selected='selected'\">$anio</option><option value=\"$anio++\" >$anio++</option>";
			}
			else if($editar == true)
			{
				for($i=$fecha[2]; $i<=$anio; $i++)
				{
					echo "<option value=\"$i\" ";
					if ($i == $fecha[2]) echo "\"selected='selected'\"";
					echo ">$i</option>";
				}
			}
			else
			{
				echo "<option value=\"$anio\" \"selected='selected'\">$anio</option>";
			}
		?>
       </select>
      </td>
     </tr>
    </table>
   </td>
  </tr>
  <tr>
   <td height="500px">
    <?php
     include("FCKeditor/fckeditor.php") ;
     $oFCKeditor = new FCKeditor('texto_articulo') ;
     $oFCKeditor->BasePath = 'FCKeditor/';
     $oFCKeditor->Value = $info[texto_articulo];
     $oFCKeditor->Width  = '100%' ;
     $oFCKeditor->Height = '500' ;
     $oFCKeditor->Create() ;
 	?>
   </td>
  </tr>
  <tr>
  <td align="center">
   <input name="enviar" type="submit" value="Ingresar y/o actualizar pelicula" tabindex="7" />
   <input name="action" type="hidden" value="upload" />
  </td>
 </tr>
</table>
</form>
</BODY>
</HTML>
<?php
}
else
{
	include ('index.php');
}
?>