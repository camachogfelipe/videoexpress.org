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

obligatorio = ["fecha","titulo_paraeditar","texto_paraeditar","titulo_primerafila","texto_primerafila","titulo_nuevamente","texto_nuevamente","titulo_buenasnuevas","texto_buenasnuevas","titulo_garabatos","texto_garabatos"];

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert
textoObligatorio=["Fecha", "Titulo Para Editar", "Texto Para Editar", "Titulo Primera Fila", "Texto Primera Fila", "Titulo Nueva Mente", "Texto Nueva Mente", "Titulo Buenas Nuevas", "Texto Buenas Nuevas", "Titulo Garabatos", "Texto Garabatos"];

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
<BODY>
<center>
<?php
$info[No]					= $_GET["No"];
$info[fecha]				= $_GET["fecha"];
$info[fondo]				= $_GET["fondo"];
$info[titulo_paraeditar]	= $_GET["titulo_paraeditar"];
$info[texto_paraeditar]		= $_GET["texto_paraeditar"];
$info[titulo_primerafila]	= $_GET["titulo_primerafila"];
$info[texto_primerafila]	= $_GET["texto_primerafila"];
$info[titulo_nuevamente] 	= $_GET["titulo_nuevamente"];
$info[texto_nuevamente] 	= $_GET["texto_nuevamente"];
$info[titulo_buenasnuevas] 	= $_GET["titulo_buenasnuevas"];
$info[texto_buenasnuevas] 	= $_GET["texto_buenasnuevas"];
$info[titulo_garabatos] 	= $_GET["titulo_garabatos"];
$info[texto_garabatos] 		= $_GET["texto_garabatos"];
$editar 					= $_GET['editar'];
?>
<form action="<?php if($editar == true)
	  {
		echo "editar_index2.php?editar=true&fondo=$info[fondo]&No=$info[No]";
	  }
	  else
	  {
		  echo "editar_index2.php";
	  } ?>" method="post" enctype="multipart/form-data" onSubmit="return comprobar(this)">
 <div id="Imagen_de_fondo" style="background-image:url(../imagenes-para-secciones/fondos/<?php echo $info[fondo]; ?>);">
  <div id="Imagen_de_base">
   <div id="No">
    <span style="color: #FFF">Num. x&nbsp;&#8226;&nbsp;Fecha: <input name="fecha" type="text" tabindex="1" value="<?php echo $info[fecha]; ?>" size="20"></span>
   </div>
   <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
     <td height="173px" style="text-align:center">
      <span style="color: #FFF">Imagen de fondo:</span><input name="fondo" type="file" size="30" tabindex="2" />     
     </td>
    </tr>
    <tr>
     <td height="550px">
       <table width="498" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td width="50%" id="td_cuerpo" class="left">
            <span id="index">
             <p id="index" class="resaltado">
              <input name="titulo_paraeditar" type="text" value="<?php echo $info[titulo_paraeditar]; ?>" size="35" maxlength="100" tabindex="3">
             </p>
			 <textarea name="texto_paraeditar" id="texto_paraeditar" cols="27" rows="" tabindex="4"><?php echo $info[texto_paraeditar]; ?></textarea>
            </span>
           </td>
           <td><img src="../imagenes/paraeditar_index.png" width="247" height="109" border="0" /></td>
         </tr>
         <tr>
           <td><img src="../imagenes/primerafila_index.png" width="247" height="109" border="0" /></td>
           <td id="td_cuerpo" class="right">
            <span id="index">
             <p id="index" class="resaltado">
              <input name="titulo_primerafila" type="text" id="titulo_primerafila" value="<?php echo $info[titulo_primerafila]; ?>" size="35" maxlength="100" tabindex="5">
             </p>
             <textarea name="texto_primerafila" id="texto_primerafila" cols="27" rows="" tabindex="6"><?php echo $info[texto_primerafila]; ?></textarea>
            </span>
           </td>
         </tr>
         <tr>
           <td id="td_cuerpo" class="left">
            <span id="index">
             <p id="index" class="resaltado">
              <input name="titulo_nuevamente" type="text" id="titulo_nuevamente" value="<?php echo $info[titulo_nuevamente]; ?>" size="35" maxlength="100" tabindex="7">
             </p>
             <textarea name="texto_nuevamente" id="texto_nuevamente" cols="27" rows="" tabindex="8"><?php echo $info[texto_nuevamente]; ?></textarea>
            </span>
           </td>
           <td><img src="../imagenes/nuevamente_index.png" width="247" height="110" border="0" /></td>
         </tr>
         <tr>
           <td><img src="../imagenes/buenasnuevas_index.png" width="247" height="109" border="0" /></td>
           <td id="td_cuerpo" class="right">
            <span id="index">
             <p id="index" class="resaltado">
              <input name="titulo_buenasnuevas" type="text" id="titulo_buenasnuevas" value="<?php echo $info[titulo_buenasnuevas]; ?>" size="35" maxlength="100" tabindex="9">
             </p>
             <textarea name="texto_buenasnuevas" id="texto_buenasnuevas" cols="27" rows="" tabindex="10"><?php echo $info[texto_buenasnuevas]; ?></textarea>
            </span>
           </td>
         </tr>
         <tr>
           <td id="td_cuerpo" class="left">
            <span id="index">
             <p id="index" class="resaltado">
              <input name="titulo_garabatos" type="text" id="titulo_garabatos" value="<?php echo $info[titulo_garabatos]; ?>" size="35" maxlength="100" tabindex="11">
             </p>
             <textarea name="texto_garabatos" id="texto_garabatos" cols="27" rows="" tabindex="12"><?php echo $info[texto_garabatos]; ?></textarea>
            </span>
           </td>
           <td><img src="../imagenes/garabatos_index.png" width="247" height="109" border="0" /></td>
         </tr>
       </table>
      </td>
    </tr>
    <tr>
     <td id="mail">Una publicaci&oacute;n de <b>VideoExpress.org</b><br />La primera organizaci&oacute;n de alquiler, venta, difusi&oacute;n y exhibici&oacute;n de <b>Videos con principios y valores</b></td>
    </tr>
   </table>
  </div>
 </div>
 <div style="width: 700px; background-color: #000">
  <table width="200" border="0" cellspacing="0" cellpadding="0" align="center">
	 <tr>
      <td>
       <input name="enviar" type="submit" value="Ingresar y/o actualizar index" tabindex="13" />
	   <input name="action" type="hidden" value="upload" />
      </td>
     </tr>
    </table>
 </div>
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