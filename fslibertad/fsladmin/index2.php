<?php
session_start();
ini_set ('error_reporting', E_ALL);
include("funciones.php");

if(isset($_REQUEST['salir'])) salir($_REQUEST['salir']);

if(isset($_SESSION['fsluser']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
<link rel="shortcut icon" href="../imagenes/faviconsemillas.ico" />
<link href="../fslibertad.css" rel="stylesheet" type="text/css" />
<link href="../admin.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>_:_ FSlibertad Panel de administraci&oacute;n _:_</title>
<script type="text/javascript" src="../scripts/jquery-1.5.1.js"></script>
<script type="text/javascript" src="../scripts/jquery.corner.js"></script>
<script type="text/javascript" src="../scripts/thickbox.js"></script>
<link href="../scripts/thickbox.css" rel="stylesheet" type="text/css" />
<script>
jQuery(document).ready(function()
{
	
	settings = {
          tl: { radius: 30 },
          tr: { radius: 30 },
          bl: { radius: 30 },
          br: { radius: 30 },
          antiAlias: true,
          autoPad: true,
          validTags: ["div", "table", "ul", "input", "textarea", "select", "li"]
	}
	$("#menu_contenido").corner("round 22px");
	
	$("#menu_contenido h3:first").addClass("active");
	$("#menu_contenido span:not(:first)").hide();

	$("#menu_contenido h3").click(function(){
		$(this).next("span").slideToggle("slow")
		.siblings("span:visible").slideUp("slow");
		$("#menu_contenido span li").removeClass("active");
		$(this).toggleClass("active");
		$(this).siblings("h3").removeClass("active");
	});
	$("#menu_contenido span li").click(function(){
		$(this).addClass("active");
		$(this).siblings("li").removeClass("active");
	});
	$("#submenu li").click(function(){
		$(this).addClass("active");
		$(this).siblings("li").removeClass("active");
		alert("ejecutando");
	});
	$("#submenu1 li").click(function(){
		$(this).addClass("active");
		$(this).siblings("li").removeClass("active");
		alert("ejecutando");
	});
});

function recargar(x,y,z)
{
	var pagina=x+".php?"+y;
	$.post(pagina, function(data){
		$(z).load($(z).html(data));
	});
}
</script>
</head>

<body>
<div id="div_main">
   	<div id="logo_top"><img src="../imagenes/fondo_logo.png" width="1200" height="219" border="0" /></div>
    <div id="main">
		<div id="banderas" class="salir">
			<a href="?salir=true" title="Salir">
            	<img src="../imagenes/salir.png" width="34" height="34" align="absmiddle" border="0" /> Salir
			</a>
		</div>
	    <div id="bienvenida">
   			<span id="bnvnombre">Bienvenido <?php echo $_SESSION['Nombre'] ?></span><br />
            <span id="bnvfechas">&Uacute;ltimo acceso: <?php echo $_SESSION['ingreso'] ?>, 
            Creado: <?php echo $_SESSION['creado'] ?></span>
		</div>
        <div id="cuerpo" class="cuerpo">
			<div id="quienes" class="titulo_menu_contenido"><span>Menu</span></div>
			<div id="menu_contenido" class="menu_quienes">
            	<h3>&iquest;Quien&eacute;s somos?</h3>
                <span>
                	<li id="submenu_contenido" onclick="recargar('formulario_gral','op=1&s=vision&es=n','#contenido_contenido')">
                    	Editar Visi&oacute;n
					</li>
					<li id="submenu_contenido" onclick="recargar('formulario_gral','op=1&s=mision&es=n','#contenido_contenido')">
                    	Editar Misi&oacute;n
					</li>
                    <li id="submenu_contenido" onclick="recargar('formulario_gral','op=1&s=proposito&es=n','#contenido_contenido')">
                    	Editar Prop&oacute;sito
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_gral','op=1&s=valores&es=n','#contenido_contenido')">
                    	Editar Valores
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_gral','op=1&s=objsocial&es=n','#contenido_contenido')">
                        Editar Objeto Social
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_gral','op=1&s=estructuraorganizacional&es=n','#contenido_contenido')">
                        Editar Estructura de influencia
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_gral','op=1&s=historia&es=n','#contenido_contenido')">
                        Editar Historia
                    </li>
                    <li id="submenu_contenido" onclick="recargar('biofundadores','','#contenido_contenido')">
                        Ver y Editar Biografia Fundadores
                    </li>
                    <li id="submenu_contenido" onclick="recargar('junta','','#contenido_contenido')">
                        Editar Junta directiva
                    </li>
                    <li id="submenu_contenido" onclick="recargar('colaboradores','','#contenido_contenido')">
                        Editar Colaboradores
                    </li>
				</span>
				<hr size="3" />
				<h3>&iquest;Para qui&eacute;n trabajamos?</h3>
                <span>
                	<li id="submenu_contenido" onclick="recargar('formulario_gral','op=2&s=pqtgral&es=n','#contenido_contenido')">
                    	Editar Texto general
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_gral','op=2&s=servicios&es=n','#contenido_contenido')">
                    	Editar Servicios
                    </li>
				</span>
				<hr size="3" />
				<h3>&iquest;Qu&eacute; hacemos?</h3>
                <span>
                	<li id="submenu_contenido" onclick="recargar('formulario_gral','op=3&s=qhgral&es=n','#contenido_contenido')">
                    	Editar texto general
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_qh','op=3&s=aye&es=s','#contenido_contenido')">
                    	Editar monta&ntilde;a Arte y entretenimiento
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_qh','op=3&s=eyn&es=s','#contenido_contenido')">
                    	Editar monta&ntilde;a Econom&iacute;a y negocios</li>
                    <li id="submenu_contenido" onclick="recargar('formulario_qh','op=3&s=educacion&es=s','#contenido_contenido')">
                    	Editar monta&ntilde;a Educaci&oacute;n
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_qh','op=3&s=familia&es=s','#contenido_contenido')">
                    	Editar monta&ntilde;a Familia
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_qh','op=3&s=gcye&es=s','#contenido_contenido')">
                    	Editar monta&ntilde;a Gobierno civil y Estado
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_qh','op=3&s=iglesia&es=s','#contenido_contenido')">
                    	Editar monta&ntilde;a Igles&iacute;a
                    </li>
                    <li id="submenu_contenido" onclick="recargar('formulario_qh','op=3&s=medcomunica&es=s','#contenido_contenido')">
                    	Editar monta&ntilde;a Medios de comunicaci&oacute;n
                    </li>
				</span>
                <hr size="3" />
				<h3>&iquest;En qu&eacute; vamos?</h3>
                <span>
                	<li id="submenu_contenido" onclick="recargar('index3','op=4&s=vlp','#contenido_contenido')">
                    	Ver lista de proyectos actuales
                    </li>
                    <li id="submenu_contenido" onclick="recargar('crear_proyecto','op=4&s=crear','#contenido_contenido')">
                    	Crear nuevo proyecto
                    </li>
				</span>
                <hr size="3" />
                <h3>Ayudenos a crecer</h3>
                <span>
                	<li id="submenu_contenido" onclick="recargar('index3','op=5&s=verpropuestas&t=PA','#contenido_contenido')">
                    	Ver propuestas enviadas
                    </li>
					<li id="submenu_contenido" onclick="recargar('formulario_gral','op=5&s=donaciones','#contenido_contenido')">
                    	Editar texto Donaciones
                    </li>
				</span>
				<hr size="3" />
				<h3>Comparte tu sue&ntilde;o</h3>
                <span>
                	<li id="submenu_contenido" onclick="recargar('index3','op=6&s=versolicitudes&t=SA','#contenido_contenido')">
                    	Ver solicitudes de ayuda
                    </li>
				</span>
                <hr size="3" />
				<h3>Varios</h3>
                <span>
                	<li id="submenu_contenido" onclick="recargar('editorial','op=7&s=editorial','#contenido_contenido')">
                    	Editorial
                    </li>
                    <li id="submenu_contenido" onclick="recargar('semillas','op=7&s=semilla','#contenido_contenido')">
                    	Semillas de libertad
                    </li>
                    <li id="submenu_contenido" onclick="recargar('semillas2','op=7&s=semilla2','#contenido_contenido')">
                    	Peque&ntilde;as ense&ntilde;anzas
                    </li>
                    <li id="submenu_contenido" onclick="recargar('index3','op=7&s=cambioclave&id=<?php echo $_SESSION['fsluser'] ?>','#contenido_contenido')">
                    	Cambiar su clave
                    </li>
				</span>
			</div>
			<div id="contenido_contenido"></div>
        </div>
	</div>
</div>
</body>
</html>
<?php
}
else header("Location: ../");
?>