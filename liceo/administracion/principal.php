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
</head>
<body id="main_body">
<div style="overflow:auto">
<div id="main_menu">
	<?php if($_SESSION['permisos'][0] == "Y") { ?>
	<div id="menu_admon">
    	<a href="editar.php" target="mostrar">
        	<div id="img2"><img src="iconfolder/editar_boletines.png" width="32" height="32" border="0" align="texttop"></div>
            Crear un nuevo boletín
		</a>
	</div>
    <?php }
	if($_SESSION['permisos'][1] == "Y") { ?>
	<div id="menu_admon">
    	<a href="tabla_contenido.php" target="mostrar">
        	<div id="img2"><img src="iconfolder/ver_boletines.png" width="32" height="32" border="0" align="texttop"></div>
            Ver todos los boletines
        </a>
	</div>
    <?php }
	if($_SESSION['permisos'][3] == "Y") { ?>
	<div id="menu_admon">
    	<a href="ingresar.php" target="mostrar">
        	<div id="img2"><img src="iconfolder/padrespng.png" width="32" height="32" border="0" align="texttop"></div>
            Ingresar nuevo padre a la lista de emails</a></div>
    <?php }
	if($_SESSION['permisos'][4] == "Y") { ?>
	<div id="menu_admon">
    	<a href="tabla_padres.php" target="mostrar">
        	<div id="img2"><img src="iconfolder/lista_padres.png" width="32" height="32" border="0" align="texttop"></div>
            Ver la lista de emails de los padres inscritos</a></div>
    <?php }
	if($_SESSION['permisos'][6] == "Y") { ?>
	<div id="menu_admon">
    	<a href="subir_archivos.php" target="mostrar">
        	<div id="img2"><img src="iconfolder/subir_fichero.png" width="32" height="32" border="0" align="texttop"></div>
            Subir un archivo a información general</a></div>
    <?php }
	if($_SESSION['permisos'][7] == "Y") { ?>
	<div id="menu_admon">
    	<a href="subir_archivos.php?accion=listar" target="mostrar">
        	<div id="img2"><img src="iconfolder/ver_fichero.png" width="32" height="32" border="0" align="texttop"></div>
            Ver archivos de información general</a></div>
    <?php }
	if($_SESSION['permisos'][9] == "Y") { ?>
	<div id="menu_admon">
    	<a href="mail.php?es=1" target="mostrar" name="mail">
        	<div id="img2"><img src="iconfolder/nuevo_boletin.png" width="32" height="32" border="0" align="texttop"></div>
            Enviar por mail el último boletín</a></div>
    <?php }
	if($_SESSION['permisos'][10] == "Y") { ?>
	<div id="menu_admon">
    <a href="up_file_alumno.php" target="mostrar">
        	<div id="img2"><img src="iconfolder/subir_prof.png" width="32" height="32" border="0" align="texttop"></div>
      Subir un trabajo del alumno</a></div>
    <?php }
	if($_SESSION['permisos'][11] == "Y") { ?>
	<div id="menu_admon">
    	<a href="usuarios.php" target="mostrar">
        	<div id="img2"><img src="iconfolder/users.png" width="32" height="32" border="0" align="texttop"></div>
            Panel de control de usuarios</a></div>
    <?php } ?>
	<div id="menu_admon">
    	<a href="cambio_clave.php" target="mostrar">
        	<div id="img2"><img src="iconfolder/key.png" width="32" height="32" border="0" align="texttop"></div>
            Cambiar su clave</a></div>
	<div id="menu_admon">
    	<a href="salir.php">
        	<div id="img2"><img src="iconfolder/close.png" width="32" height="32" border="0" align="texttop"></div>
            Salir</a></div>
</div>
<div id="main_iframe">
<iframe frameborder="0" name="mostrar" id="mostrar" src="bienvenida.php" scrolling="auto" style="border: 0px none; border-style:none none none none; width:100%; height:550px">Su explorador no soporta frames, por favor actualicelo</iframe>
</div>
</div>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>