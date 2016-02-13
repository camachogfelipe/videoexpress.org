<?php
session_start();
ob_start("ob_gzhandler");
// check session variable
if (isset($_SESSION['user_adminvideo']))
{
	include("../catalogo/include/funciones_globales.php");
	include("funciones.php");
	$conecta = conecta_bd("videoexpress");
	$salir = $_REQUEST['salir'];
	$reg_mostrar = 10;
	if(isset($_REQUEST['pag']))
	{
		$pag = $_REQUEST['pag'];
		$reg_empezar = ($pag - 1) * $reg_mostrar;
		$pag_actual = $pag;
	}
	else
	{
		$pag = 1;
		$reg_empezar = 0;
		$pag_actual = 1;
	}
	$op = $_REQUEST['op'];
	$op_form = $_REQUEST['op_form'];
	$o = $_REQUEST['o'];
	$acc = $_REQUEST['acc'];
	if(isset($_REQUEST['acc'])) accion($op, $op_form, $acc);
	if(isset($_REQUEST['ing'])) recibir_datos($op, $op_form);
	if($salir == 'adminvideo')
	{
		salir($salir);
		header("Location: ../admin_video");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/favicon.ico" />
<link type="text/css" rel="stylesheet" href="floatbox/floatbox.css" />
<script type="text/javascript" src="floatbox/floatbox.js"></script>
<script type="text/javascript" src="floatbox/options.js"></script>
<script type="text/javascript">
fbPageOptions = {
  cornerRadius: 20,
  shadowSize: 24,
  color: "yellow",
  language: "es",
  autoFitMedia: true
};
</script>
<TITLE>Actualizar base de datos</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="adminvideo.css" rel="stylesheet" type="text/css">
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["busqueda"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Debe ingresar al menos una palabra"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if(este.elements[obligatorio[a]].value == "")
		{
			alert(textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}
</script>
</HEAD>
<body>
<table width="100%" border="0" cellspacing="5" cellpadding="0" align="center">
  <tr>
    <td>
    	<a href="?op=lv" id="btnprpal">
			<div id="btnprpal">
				<div id="btnpizq"><img src="imagenes/admin_guestbook.png" width="48" height="48" border="0" /></div>
        		<div id="textobtnprpal">Administraci&oacute;n de los libros de visitas</div>
			</div>
		</a>
    </td>
    <td>
    	<a href="?op=wl">
			<div id="btnprpal">
				<div id="btnpizq"><img src="imagenes/admin_links.png" width="48" height="48" border="0" /></div>
        		<div id="textobtnprpal">Administraci&oacute;n de links</div>
			</div>
		</a>
    </td>
    <td>
	    <a href="?op=pr">
			<div id="btnprpal">
				<div id="btnpizq"><img src="imagenes/admin_radio.png" width="48" height="48" border="0" /></div>
        		<div id="textobtnprpal">Administraci&oacute;n de programas de radio</div>
			</div>
		</a>
    </td>
    <td>
	    <a href="?op=vyg">
			<div id="btnprpal">
				<div id="btnpizq"><img src="imagenes/admin_vyg.png" width="48" height="48" border="0" /></div>
        		<div id="textobtnprpal">Administraci&oacute;n de plegables V&amp;G</div>
			</div>
		</a>
    </td>
    <td>
	    <a href="?op=awl">
			<div id="btnprpal">
				<div id="btnpizq"><img src="imagenes/add_links.png" width="48" height="48" border="0" /></div>
        		<div id="textobtnprpal">Agregar un link a la base de datos</div>
			</div>
		</a>
    </td>
    <td>
	    <a href="?op=apr">
			<div id="btnprpal">
				<div id="btnpizq"><img src="imagenes/up_file.png" width="48" height="48" border="0" /></div>
        		<div id="textobtnprpal">Agregar un programa de radio o plegable</div>
			</div>
		</a>
    </td>
    <td>
	    <a href="?op=re">
        	<div id="btnprpal">
            	<div id="btnpizq"><img src="imagenes/reportes.png" width="48" height="48" border="0" /></div>
				<div id="textobtnprpal">Reportes</div>
			</div>
        </a>
    </td>
    <td>
	    <a href="?salir=adminvideo">
			<div id="btnprpal">
				<div id="btnpizq"><img src="imagenes/salir.png" width="48" height="48" border="0" /></div>
        		<div id="textobtnprpal">Salir del panel de administraci&oacute;n</div>
			</div>
		</a>
    </td>
  </tr>
</table>
<div id="sombra"><div id="sombra1">&nbsp;</div><div id="sombra3">&nbsp;</div><div id="sombra2">&nbsp;</div></div>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td class="menu">
    	<table width="99%" align="center"border="0" cellspacing="0" cellpadding="0" class="menu">
		  <tr>
		    <td id="esq_sup_izq">&nbsp;</td>
		    <td id="mdl_sup">&nbsp;</td>
		    <td id="esq_sup_der">&nbsp;</td>
		  </tr>
		  <tr>
		    <td id="mdl_izq">&nbsp;</td>
		    <td id="mdl_cen">
			    <ul>
		    		<?php
						menu($op);
					?>
			    </ul>
                <a href="../admin_video">
                	<div id="btnprpal">
						<div id="btnpizq">&nbsp;<img src="imagenes/panel_ppal 40x40.png" width="40" height="40" border="0" /></div>
        				<div id="textobtnprpal">Panel Principal</div>
					</div>
				</a><br />
                <a href="?op=cc">
                	<div id="btnprpal">
						<div id="btnpizq">&nbsp;<img src="imagenes/panel_ppal 40x40.png" width="40" height="40" border="0" /></div>
        				<div id="textobtnprpal">Cambiar contrase&ntilde;a</div>
					</div>
				</a>
		   	</td>
		    <td id="mdl_der">&nbsp;</td>
		  </tr>
		  <tr>
		    <td id="esq_inf_izq">&nbsp;</td>
		    <td id="mdl_inf">&nbsp;</td>
		    <td id="esq_inf_der">&nbsp;</td>
		  </tr>
		</table>
	</td>
    <td valign="top">
	    <table width="99%" align="center"border="0" cellspacing="0" cellpadding="0" class="menu">
		  <tr>
		    <td id="esq_sup_izq">&nbsp;</td>
		    <td id="mdl_sup">&nbsp;</td>
		    <td id="esq_sup_der">&nbsp;</td>
		  </tr>
		  <tr>
		    <td id="mdl_izq">&nbsp;</td>
		    <td id="mdl_cen" valign="top">
			   	<?php
					switch($op)
					{
						case "lv":	$ord = orden($op, $o);
									$o1 = $ord[0]; $o2 = $ord[1];
									$opciones = "6;$o1;$o2;;$reg_empezar/$reg_mostrar";
									if($op_form != NULL || $op_form != "") panel($op, $op_form, $o1, $o2, $reg_empezar, $pag);
									else paginacion("libro_visitas", $op, $opciones, $reg_empezar, $pag);
									break;
						case "wl":	$ord = orden($op, $o);
									$o1 = $ord[0]; $o2 = $ord[1];
									$opciones = "6;$o1;$o2;;$reg_empezar/$reg_mostrar";
									if($op_form != NULL || $op_form != "") panel($op, $op_form, $o1, $o2, $reg_empezar, $pag);
									else paginacion("weblinks", $op, $opciones, $reg_empezar, $pag);
									break;
						case "pr":	$ord = orden($op, $o);
									$o1 = $ord[0]; $o2 = $ord[1];
									$opciones = "6;$o1;$o2;;$reg_empezar/$reg_mostrar";
									if($op_form != NULL || $op_form != "") panel($op, $op_form, $o1, $o2, $reg_empezar, $pag);
									else paginacion("radio", $op, $opciones, $reg_empezar, $pag);
									break;
						case "vyg":	$ord = orden($op, $o);
									$o1 = $ord[0]; $o2 = $ord[1];
									$opciones = "6;$o1;$o2;;$reg_empezar/$reg_mostrar";
									if($op_form != NULL || $op_form != "") panel($op, $op_form, $o1, $o2, $reg_empezar, $pag);
									else paginacion("videos_garabatos", $op, $opciones, $reg_empezar, $pag);
									break;
						case "awl":	$ord = orden($op, $o);
									$o1 = $ord[0]; $o2 = $ord[1];
									$opciones = "6;$o1;$o2;;$reg_empezar/$reg_mostrar";
									if($op_form != NULL || $op_form != "") formulario($op_form);
									else paginacion("weblinks", $op, $opciones, $reg_empezar, $pag);
									break;
						case "apr":	$ord = orden($op, $o);
									$o1 = $ord[0]; $o2 = $ord[1];
									$opciones = "6;$o1;$o2;;$reg_empezar/$reg_mostrar";
									if($op_form != NULL || $op_form != "") formulario($op_form);
									else paginacion("radio", $op, $opciones, $reg_empezar, $pag);
									break;
						case "re":	$ord = orden($op, $o);
									$o1 = $ord[0]; $o2 = $ord[1];
									$opciones = "6;$o1;$o2;;$reg_empezar/$reg_mostrar";
									if($op_form != NULL || $op_form != "") panel($op, $op_form, $o1, $o2, $reg_empezar, $pag);
									else paginacion("facturas", $op, $opciones, $reg_empezar, $pag);
									break;
						case "cc":	include("cambio_clave.php");
									break;
						default:	$ord = orden($op, $o);
									$o1 = $ord[0]; $o2 = $ord[1];
									$opciones = "6;$o1;$o2;;$reg_empezar/$reg_mostrar";
									if($op_form != NULL || $op_form != "") panel($op, $op_form, $o1, $o2, $reg_empezar, $pag);
									else paginacion("libro_visitas", $op, $opciones, $reg_empezar, $pag);
									break;
					}
				?>
		   	</td>
		    <td id="mdl_der">&nbsp;</td>
		  </tr>
		  <tr>
		    <td id="esq_inf_izq">&nbsp;</td>
		    <td id="mdl_inf">&nbsp;</td>
		    <td id="esq_inf_der">&nbsp;</td>
		  </tr>
		</table>
    </td>
  </tr>
</table>
</BODY>
</HTML>
<?php
}
else
{
	echo '<script languaje="Javascript">location.href="../admin_video"</script>';
}
ob_end_flush();
?>