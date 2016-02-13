<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ingreso de libros en el catalogo</title>
<link href="estilo_admin.css" rel="stylesheet" type="text/css" />
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["titulo", "autor", "editorial", "paginas", "precio", "sinopsis"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Titulo del libro", "Autor", "Editorial", "Precio", "Sinopsis"];

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
</head>

<body>
<?php
// check session variable

if (isset($_SESSION['valid_user']))
{
	//recibimos todas las variables necesarias
	
	//variables de  ingreso
	$ingresar = $_REQUEST['ingresar'];
	$fco = $_REQUEST['fco'];
	include("funciones.php");
	
	//variables de edici&#243;n
	$id						= strip_tags($_REQUEST["id"]);
	$es						= strip_tags($_REQUEST["tipo"]);
	$titulo					= strip_tags($_REQUEST["titulo"]);
	$autor					= strip_tags($_REQUEST["autor"]);
	$editorial				= strip_tags($_REQUEST["editorial"]);
	$paginas				= strip_tags($_REQUEST["paginas"]);
	$tipo_caratula			= strip_tags($_REQUEST["tipo_caratula"]);
	$size					= strip_tags($_REQUEST["size"]);
	$precio_oficial			= strip_tags($_REQUEST["precio_oficial"]);
	$categoria_general		= strip_tags($_REQUEST["categoria_general"]);
	$sinopsis				= strip_tags($_REQUEST['sinopsis']);
	$novedad				= strip_tags($_REQUEST['novedad']);
	$articulos_relacionados	= strip_tags($_REQUEST['articulos_relacionados']);
	$imagen_caratula		= strip_tags($_REQUEST['imagen']);
	$en_promocion			= strip_tags($_REQUEST['en_promocion']);
	$precio_promocion		= strip_tags($_REQUEST['precio_promocion']);
	$articulo_promocion		= strip_tags($_REQUEST['articulo_promocion']);
	
	//iniciamos las variables necesarias
	$status = NULL;
	if ($en_promocion == NULL) $en_promocion = "No";
	
	if ($ingresar == true and $fco = 'fco')
	{
		include('ing_libro_script.php');
	}
?>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20" height="20" align="center" valign="middle"><img src="imagenes/redondo_sup_izq.png" width="20" height="20" /></td>
    <td align="center" valign="middle" style="background:url(imagenes/linea_superior.png) repeat-x">&nbsp;</td>
    <td width="20" height="20" align="center" valign="middle"><img src="imagenes/redondo_sup_der.png" width="20" height="20" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" style="background:url(imagenes/linea_vertical_izq.png) repeat-y">&nbsp;</td>
    <td align="center" valign="middle" bgcolor="#ebebeb">
     <form action="ing_libro.php?ingresar=true<?php if($id!=NULL) echo "&imagen=$imagen_caratula"; ?>" method="post" enctype="multipart/form-data" name="agregar_libro" id="agregar_libro" onSubmit="return comprobar(this)">
     <table width="100%" border="0" cellspacing="5" cellpadding="0" align="center" style="margin:10px">
      <?php
	  	if ($id!=NULL)
		{
			echo "<tr>";
			echo "<td>Id de la imagen</td>";
			echo "<td>$id<input name='id' type='hidden' id='id' size='10' maxlength='3' value='$id' ></td>";
			echo "</tr>";
		}
	  ?>
      <tr>
       <td align="left" valign="middle">Tipo de &aacute;rticulo:<br />
           <select name="tipo" id="tipo" tabindex="1">
             <option value="L" <?php if($id!=NULL and $es == 'L') echo "selected=\"selected\""; ?>>Libro</option>
             <option value="CD" <?php if($id!=NULL and $es == 'CD') echo "selected=\"selected\""; ?>>CD/DVD</option>
             <option value="M" <?php if($id!=NULL and $es == 'M') echo "selected=\"selected\""; ?>>Miscel&aacute;nia</option>
           </select>
	   </td>
       <td width="50%" align="left"  valign="top" rowspan="4">Sin&oacute;psis:<br /><textarea name="sinopsis" cols="45" rows="11" id="sinopsis" tabindex="10"><?php if($id!=NULL) echo $sinopsis; ?></textarea></td>
      </tr>
      <tr>
       <td width="50%" align="left" valign="middle">T&iacute;tulo:<br /><input name="titulo" type="text" id="titulo" tabindex="1" size="60" maxlength="150" value="<?php if($id!=NULL) echo $titulo; ?>" /></td>
       <td valign="middle">&nbsp;</td>
      </tr>
      <tr>
       <td align="left" valign="middle">Autor:<br /><input name="autor" type="text" id="autor" tabindex="2" size="60" maxlength="150" value="<?php if($id!=NULL) echo $autor; ?>" /></td>
       <td valign="middle">&nbsp;</td>
      </tr>
      <tr>
       <td align="left" valign="middle">Editorial:<br /><input name="editorial" type="text" id="editorial" tabindex="3" size="60" maxlength="150" value="<?php if($id!=NULL) echo $editorial; ?>" /></td>
       <td valign="middle">&nbsp;</td>
      </tr>
      <tr>
       <td align="left" valign="middle">N&uacute;mero de p&aacute;ginas:<br /><input name="paginas" type="text" id="paginas" tabindex="4" size="10" maxlength="4" value="<?php if($id!=NULL) echo $paginas; ?>" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
       <td valign="middle">Novedad <input name="novedad" type="radio" id="novedad" tabindex="13" value="Y" <?php if($id!=NULL and $novedad == 'Y') echo "checked=\"checked\""; ?> /> Si <input type="radio" name="novedad" id="novedad" value="N" tabindex="14" <?php if($id!=NULL and $novedad=='N') echo "checked=\"checked\""; ?> /> No</td>
      </tr>
      <tr>
       <td align="left" valign="middle">Tipo de car&aacute;tula:<br /><select name="tipo_caratula" tabindex="5" id="tipo_caratula">
         <option value="Dura" <?php if($id!=NULL and $tipo_caratula == 'Dura') echo "selected=\"selected\""; ?>>Dura</option>
         <option value="Blanda" <?php if($id!=NULL and $tipo_caratula == 'Blanda') echo "selected=\"selected\""; ?>>Blanda</option>
         <option value="Cuero" <?php if($id!=NULL and $tipo_caratula == 'Cuero') echo "selected=\"selected\""; ?>>Cuero</option>
         <option value="ImitacionCuero" <?php if($id!=NULL and $tipo_caratula == 'ImitacionCuero') echo "selected=\"selected\""; ?>>Imitaci&oacute;n cuero</option>
         <option value="Rustica" <?php if($id!=NULL and $tipo_caratula == 'Rustica') echo "selected=\"selected\""; ?>>R&uacute;stica</option>
       </select></td>
       <td align="left" valign="middle">Art&iacute;culos relacionados (T&iacute;tulos separados por comas):<br />
         <input name="articulos_relacionados" type="text" id="articulos_relacionados" tabindex="11" size="60" maxlength="1000" value="<?php if($id!=NULL) echo $articulos_relacionados; ?>" /></td>
      </tr>
      <tr>
       <td align="left" valign="middle">Tama&ntilde;o:<br />
           <select name="size" id="size" tabindex="6">
             <option value="Grande" <?php if($id!=NULL and $size == 'Grande') echo "selected=\"selected\""; ?>>Grande</option>
             <option value="Mediano" <?php if($id!=NULL and $size == 'Mediano') echo "selected=\"selected\""; ?>>Mediano</option>
             <option value="Pequeno" <?php if($id!=NULL and $size == 'Pequeno') echo "selected=\"selected\""; ?>>Peque&ntilde;o</option>
             <option value="EdicionBolsillo" <?php if($id!=NULL and $size == 'EdicionBolsillo') echo "selected=\"selected\""; ?>>Edici&oacute;n de bolsillo</option>
           </select>
       </td>
       <td align="left" valign="middle">Imagen de la car&aacute;tula:<br />
         <?php if($id!=NULL) echo $imagen_caratula."<br />" ?>
         <input name="imagen_caratula" type="file" id="imagen_caratula" tabindex="12" size="45" /></td>
      </tr>
      <tr>
       <td align="left" valign="middle">Precio:<br />
         <input name="precio_oficial" type="text" id="precio_oficial" tabindex="7" size="10" maxlength="7" value="<?php if($id!=NULL) echo $precio_oficial ?>" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue=false;" /></td>
       <td align="left" valign="middle">&iquest;Esta en promoci&oacute;n? <input name="en_promocion" type="radio" id="en_promocion" tabindex="13" value="Si" <?php if($id!=NULL and $en_promocion == 'Si') echo "checked=\"checked\""; ?> /> Si <input type="radio" name="en_promocion" id="en_promocion" value="No" tabindex="14" <?php if($id!=NULL and $en_promocion=='No') echo "checked=\"checked\""; ?> /> 
       No <br />precio de la promoci&oacute;n 
       <input name="precio_promocion" type="text" id="precio_promocion" tabindex="15" size="10" value="<?php if($id!=NULL) echo $precio_promocion ?>" /></td>
      </tr>
      <tr>
       <td align="left" valign="middle">Categor&iacute;a general:<br />
           <select name="categoria_general" id="categoria_general" tabindex="8">
             <option value="Jovenes" <?php if($id!=NULL and $categoria_general == 'Jovenes') echo "selected=\"selected\""; ?>>J&oacute;venes</option>
             <option value="Ninos" <?php if($id!=NULL and $categoria_general == 'Ninos') echo "selected=\"selected\""; ?>>Ni&ntilde;os</option>
             <option value="Biblias" <?php if($id!=NULL and $categoria_general == 'Biblias') echo "selected=\"selected\""; ?>>Biblias</option>
             <option value="EstudioBiblico" <?php if($id!=NULL and $categoria_general == 'EstudioBiblico') echo "selected=\"selected\""; ?>>Estudio B&iacute;blico</option>
             <option value="Mujeres" <?php if($id!=NULL and $categoria_general == 'Mujeres') echo "selected=\"selected\""; ?>>Mujeres</option>
             <option value="Hombres" <?php if($id!=NULL and $categoria_general == 'Hombres') echo "selected=\"selected\""; ?>>Hombres</option>
             <option value="Parejas" <?php if($id!=NULL and $categoria_general == 'Parejas') echo "selected=\"selected\""; ?>>Parejas</option>
             <option value="VidaCristiana" <?php if($id!=NULL and $categoria_general == 'VidaCristiana') echo "selected=\"selected\""; ?>>Vida Cristiana</option>
             <option value="Miscelania" <?php if($id!=NULL and $categoria_general == 'Miscelania') echo "selected=\"selected\""; ?>>Miscel&aacute;nia</option>
             <option value="Familia" <?php if($id!=NULL and $categoria_general == 'Familia') echo "selected=\"selected\""; ?>>Familia</option>
             <option value="Flet" <?php if($id!=NULL and $categoria_general == 'Flet') echo "selected=\"selected\""; ?>>Flet</option>
           </select>
	   </td>
       <td align="left">Art&iacute;culo para adjuntar a la promoci&oacute;n:<br />
         <label>
           <input name="articulo_promocion" type="text" id="articulo_promocion" tabindex="16" size="60" maxlength="150" value="<?php if($id!=NULL) echo $articulo_promocion ?>" />
         </label></td>
      </tr>
      <tr>
       <td align="right"><a href="javascript:document.agregar_libro.reset()"><img src="imagenes/limpiar.png" width="100" height="25" border="0" /></a></td>
       <td align="left"><input type="image" src="imagenes/acceder.png" name="submit" id="submit" /><input name="action" type="hidden" value="upload" /><input name="text" type="hidden" id="fco" value="fco" /></td>
      </tr>
     </table>
     </form>
    <?php if($status != NULL) echo "<img src=\"imagenes/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> <span id=\"informacion_gral\">".$status."</span>"; ?></td>
    <td align="center" valign="middle" style="background:url(imagenes/linea_vertical_der.png) repeat-y">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" align="center" valign="middle"><img src="imagenes/redondo_inf_izq.png" width="20" height="20" /></td>
    <td align="center" valign="middle"  style="background:url(imagenes/linea_inferior.png) repeat-x">&nbsp;</td>
    <td align="center" valign="middle"><img src="imagenes/redondo_inf_der.png" width="20" height="20" /></td>
  </tr>
</table>
<p align="center"><a id="flechas" onclick="history.go(-1)" style="cursor:pointer" ><img src="imagenes/botonatras.png" alt="Regresar" width="25" height="25" align="absmiddle" /> Regresar</a></p>
</body>
</html>
<?php
}
else
{
	echo '<script type="text/javascript">window.location="../administracion";</script>';
}
?>