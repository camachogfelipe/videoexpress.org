<?php
error_reporting(0);
$sec = $_REQUEST['seccion'];
$id = $_REQUEST['id'];

$bd = 'enews';
include('administracion/conexion.php');

switch ($sec)
{
	case 'buenas_nuevas'	: $logo = "bg-logo-top-buenas-nuevas.gif";
						  	  $img_seccion = "statement1-buenas-nuevas.gif";
	  						  $color = "#3BB3C3";
							  $mensaje = "Video y mensaje<br />si pueden ir de la mano si se ense&ntilde;a adecuadamente";
							  $tabla = "buenas_nuevas";
							  $info = resultados($tabla, $id);
							  $tit_sec = "Buenas nuevas para ver";
			    	          break;
	case 'garabatos'		: $logo = "bg-logo-top-garabatos.gif";
	  					 	  $img_seccion = "statement1-garabatos.gif";
							  $color = "#F8C301";
							  $mensaje = "Pel&iacute;culas destacadas<br />para ni&ntilde;os y ni&ntilde;as,<br />con principios y valores";
							  $tabla = "garabatos";
							  $info = resultados($tabla, $id);
							  $tit_sec = "Videos y garabatos";
				              break;
	case 'nueva_mente'		: $logo = "bg-logo-top-nueva-mente.gif";
							  $img_seccion = "statement1-nueva-mente.gif";
							  $color = "#DA251C";
							  $mensaje = "Todo empieza<br />por lo que le pongas<br />a tu cabeza en especial si es lo bueno, lo justo y lo recto";
							  $tabla = "nueva_mente";
							  $info = resultados($tabla, $id);
							  $tit_sec = "Nueva...mente";
			 				  break;
	case 'para_editar'		: $logo = "bg-logo-top-para-editar.gif";
							  $img_seccion = "statement1-para-editar.gif";
							  $color = "#9CCE17";
							  $mensaje = "Un editorial<br />de Manuel Obando<br />sobre un tema<br />de actualidad<br />que se ve claramente";
							  $tabla = "para_editar";
							  $info = resultados($tabla, $id);
							  $tit_sec = "Para editar...";
							  break;
	case 'primera_fila'	    : $logo = "bg-logo-top-primera-fila.gif";
							  $img_seccion = "statement1-primera-fila.gif";
							  $color = "#E67817";
							  $mensaje = "Clasificaci&oacute;n y evaluaci&oacute;n de las pel&iacute;culas en cartelera; lo que sirve y lo que no a la familia";
							  $tabla = "primera_fila";
							  $info = resultados($tabla, $id);
							  $tit_sec = "En primera fila";
 			  				  break;
	default 		  		: $logo = "bg-logo-top-buenas-nuevas.gif";
							  $img_seccion = "statement1-buenas-nuevas.gif";
							  $color = "#3BB3C3";
							  $mensaje = "Video y mensaje<br />si pueden ir de la mano si se ense&ntilde;a adecuadamente";
							  $tabla = "buenas_nuevas";
							  $info = resultados($tabla, $id);
							  $tit_sec = "Buenas nuevas para ver";
							  break;
}

function resultados($tabla, $id)
{
	$sql = "select COUNT(*) FROM $tabla";
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
	$total_resultados = mysql_fetch_array($result);
	
	$tmp = $total_resultados[0];
	$info[tr] = $tmp;
	
	if ($id == NULL || $id <= 0 || $id > $tmp) $id = $total_resultados[0];
	
	$sql = "SELECT * FROM $tabla WHERE No_seccion = '$id'";
	
	$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$cadbusca</b>");

	$No_items = 0;
	while ($row = mysql_fetch_array($result))
	{
		$info[No] 				= "{$row['No_seccion']}";
		$info[titulo]			= "{$row['Titulo']}";
		$info[texto] 			= "{$row['Texto']}";
		$info[img_photo_main]	= "{$row['Img_photo_main']}";
		$info[fecha]			= "{$row['fecha']}";
		$No_items++;
	}
	
	return $info;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VideoExpress.org:@news:<?php echo $tit_sec ?></title>
<meta name="keywords" content="keyword1, keyword2, keyword3, etc..." />
<meta name="description" content="Description of website here..." />
<link rel="shortcut icon" href="../images/favicon.ico" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["nombre", "email"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Nombre", "E-mail"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if (a == 1)
		{
			isMail(este.elements[obligatorio[1]].value);
			if (x == 1)
			{
				este.elements[obligatorio[a]].focus();
				return false;
			}
		}
		
		if(este.elements[obligatorio[a]].value == "")
		{
			alert("Por favor, rellena el campo "+textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}

function isMail(Cadena) {   
  
    Punto = Cadena.substring(Cadena.lastIndexOf('.') + 1, Cadena.length);            // Cadena del .com   
    Dominio = Cadena.substring(Cadena.lastIndexOf('@') + 1, Cadena.lastIndexOf('.'));    // Dominio @lala.com   
    Usuario = Cadena.substring(0, Cadena.lastIndexOf('@'));                  // Cadena lalala@   
    Reserv = "@/º\"\'+*{}\\<>?¿[]áéíóú#·¡!^*;,:";                      // Letras Reservadas   
       
    // A&#241;adida por El Codigo para poder emitir un alert en funcion de si email valido o no   
    valido = true;   
       
    // verifica qie el Usuario no tenga un caracter especial   
    for (var Cont=0; Cont<Usuario.length; Cont++)
	{   
        X = Usuario.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
  
    // verifica qie el Punto no tenga un caracter especial   
    for (var Cont=0; Cont<Punto.length; Cont++)
	{   
        X=Punto.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
                           
    // verifica qie el Dominio no tenga un caracter especial   
    for (var Cont=0; Cont<Dominio.length; Cont++)
	{   
        X=Dominio.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
        }   
  
    // Verifica la sintaxis b&#225;sica.....   
    if (Punto.length<2 || Dominio <1 || Cadena.lastIndexOf('.')<0 || Cadena.lastIndexOf('@')<0 || Usuario<1)
	{   
        valido = false;
    }   
       
    // A&#241;adido por El C&#243;digo para que emita un alert de aviso indicando si email v&#225;lido o no   
    if (valido)
	{   
		return x = 0;
    }
	else
	{   
        alert('Email no válido.');
		return x = 1;
    }   
}
</script>
</head>
<body>
<div id="main">
  <div id="logo" style="background-image: url(imagenes/<?php echo $logo; ?>)">
   <div id="img_logo"><img src="imagenes/logo.png" alt="VideoExpress News" width="243" height="55" border="0" usemap="#Map" />
     <map name="Map" id="Map">
       <area shape="rect" coords="0,-4,243,55" href="http://www.videoexpress.org" alt="Home" />
     </map>
   </div>
    <ul id="navbar">
     <li>
      <a href="../enews/?id=<?php echo $info['No']; ?>"><span>Home</span></a>
     </li>
     <li>
      <a href="?seccion=para_editar&id=<?php echo $info['No']; ?>"><span>Para editar</span></a>
     </li>
     <li>
      <a href="?seccion=primera_fila&id=<?php echo $info['No']; ?>"><span>En primera fila</span></a>
     </li>
     <li>
      <a href="?seccion=nueva_mente&id=<?php echo $info['No']; ?>"><span>Nueva...mente</span></a>
     </li>
     <li>
      <a href="?seccion=buenas_nuevas&id=<?php echo $info['No']; ?>"><span>Buenas nuevas para ver</span></a>
     </li>
     <li>
      <a href="?seccion=garabatos&id=<?php echo $info[No]; ?>"><span>Videos y Garabatos</span></a>
     </li>
    </ul>
   <div class="clear"></div>
  </div>
  <div id="main-inner">
    <div id="main-inner-left">
     <div id="photo-main" style="background: url(imagenes-para-secciones/photo-main/<?php echo $info[img_photo_main]; ?>) no-repeat">
      <div id="photo-main" class="mascara"></div>
     </div>
     <p id="edicion" style="background-color:<?php echo $color; ?>">
      VideoExpress News &bull; N&uacute;mero <?php echo $info[No]; ?> &bull; <?php echo $info[fecha]; ?>
     </p>
     <p class="Titulo" id="Titulo" style="color: <?php echo $color; ?>"><?php echo $info[titulo]; ?></p>
     <div style="text-align: justify; overflow: hidden">
      <?php echo $info[texto]; ?>
     </div>
    </div>
    <div id="main-inner-right"><img src="imagenes/<?php echo $img_seccion; ?>" alt="Seccion Buenas nuevas para ver" />
      <div id="box-small">
        <div id="box-top-small"></div>
        <p>
         <strong style="color: <?php echo $color ?>"><?php echo $mensaje; ?>
         </strong>
        </p>
        <p>&nbsp;</p>
      </div>
      <div style="margin-top: 10px; background: url(imagenes/encabezado-enews.png) no-repeat; height: 16px; color: #FFF; padding: 5px">
       Suscribirse a E-news
      </div>
      <div style="border-left: 2px solid #0c2987; border-right: 2px solid #0c2987; padding: 2px">
       <form action="suscribirse.php?ac=inscribirse" method="post" enctype="multipart/form-data" name="suscripcion" onSubmit="return comprobar(this)">
        Nombre completo:<br /><input name="nombre" type="text" size="22" maxlength="150" /><br /><br />
        E-mail:<br /><input name="email" type="text" size="22" maxlength="150" /><br /><br />
        <center><input name="Suscribirse" type="submit" value="Suscribirse" /></center>
       </form>
      </div>
      <div><img src="imagenes/pie-enews.png" width="171" height="14" /></div>
    </div>
    <div class="clear"></div>
    <table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
	 <tr>
      <td>
       <div id="navbar">
        <ul>
         <li class="menu_derecha"><a href="../"><span>VideoExpress.org</span></a></li>
         <li class="menu_derecha"><a href="../catalogo"><span>Catalogo</span></a></li>
         <li class="menu_derecha">
          <?php
 		   $id = $info[No] - 1;
		  
 		   if ($id == 0) echo "<span>Articulo anterior</span>";
		   else echo "<a href=\"?seccion=$tabla&id=$id\"><span>Articulo anterior</span></a>";
		  ?>
         </li>
         <li>
          <?php
		   if ($info[tr] == $info[No]) echo "<span>Articulo siguiente</span>";
		   else
		   {
			   $id = $info[No] + 1;
			   echo "<a href=\"?seccion=$tabla&id=$id\"><span>Articulo siguiente</span></a>";
		   }
		  ?>
         </li>
        </ul>
       </div>
      </td>
     </tr>
    </table>
  </div>
  <div id="linkweb" style="width:652px">Cont&aacute;ctenos a <a href="mailto:news@videoexpress.org; gerencia@videoexpress.org" class="linkweb"><u>enews@videoexpress.org</u>  / <u>gerencia@videoexpress.org</u></a><br />
    Tel.: (57 1) 526 9007  &bull; Cel.: 312 4907879<br />
    Bogot&aacute; - Colombia
    &bull; &copy; VideoExpress.org</a>. 2009.
 </div>
</div>
</body>
</html>