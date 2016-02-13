<?php
defined( '_01800' ) or die(header ("Location: ../"));
if (isset($_SESSION['user_01800']))
{
	$servidor = $_SERVER['REQUEST_URI'];
	$pos = strpos($servidor, "?");
	if($pos !== false) :
		$servidor = mb_substr($servidor, 0, $pos);
	endif;
	?>
<div id="panel">
  <div class="encabezado"> <img src="../imagenes/logo.png" width="176" height="109" align="left" />
    <div id="usr_info"> <br>
      <p><span id="titulos">Bienvenido: </span><?php echo $_SESSION['nombre']; ?><br>
        <span id="titulos">&Uacute;ltimo acceso: </span><?php echo $_SESSION['user_uacceso']; ?>
      </p>
    </div>
    <div id="div_busqueda"> <a href="<?php echo $_SERVER['PHP_SELF']; ?>?salir" id="Salir">Salir <img src="../imagenes/iconos_admin/icono_admin-salir.png" width="37" height="37" align="absmiddle" /></a>
      <div id="formbusqueda"> Busqueda rapida por aquí<br>
        <img src="../imagenes/senal.png" width="10" height="10" /><br>
        <form action="index3.php?op=20" method="post" name="busqueda" id="busqueda">
          <select name="categoria">
            <option value="paises.nombre">Pa&iacute;s</option>
            <option value="localidades.nombre">Ciudad</option>
            <option value="igl_nombre">Iglesia</option>
            <option value="igl_pastor_ppal">Pastor</option>
            <option value="Todos">Todos</option>
          </select>
          <input name="palabra" type="text" id="input_busqueda" size="30" value="" />
          <button type="submit" id="submit" name="submit" title="Buscar"> <img src="../imagenes/boton_buscar.png" width="17" height="17" align="absmiddle" /> </button>
        </form>
      </div>
    </div>
  </div>
  <br>
  <div id="menu" class="medio">
    <li><a href="<?= $servidor ?>" id="Home" class="active">Home</a></li>
    <hr class="hr_menu" />
    <?php if($_SESSION['user_tipo'] == "SA" || $_SESSION['user_tipo'] == "AI") { ?>
    <li><a href="#vli" id="vli" onClick="recargar('index3','op=1','#panel_derecho_menu')">Ver mi lista de Iglesias</a></li>
    <hr class="hr_menu" />
    <?php }
	if($_SESSION['user_tipo'] == "I") {
	?>
    <li><a id="Editar_mi_iglesia" href="#Editar_mi_iglesia" title="Editar" onclick="recargar('index3','op=2&e=true&id=<?php echo $_SESSION['user_igl'] ?>','#panel_derecho_menu')">Editar mi iglesia</a></li>
    <li><a id="Editar_informacion_adicional" href="#Editar_informacion_adicional" title="Editar" onclick="recargar('index3','op=25&id=<?php echo $_SESSION['user_igl'] ?>&palabra=1&categoria=1','#panel_derecho_menu')">Editar información adicional</a></li>
    <?php } ?>
    <li><a href="#vmc" id="vmc" onClick="recargar('index3','op=4','#panel_derecho_menu')">Mensajes de contactenos</a></li>
    <li><a href="#sa" id="sa" onClick="recargar('index3','op=7','#panel_derecho_menu')">Sugerencias de actualizaci&oacute;n</a></li>
    <hr class="hr_menu" />
    <li><a href="#listc" id="listc" onClick="recargar('index3','op=42','#panel_derecho_menu')">Grupos para mensajes</a></li>
    <li><a href="#listu" id="listu" onClick="recargar('index3','op=48','#panel_derecho_menu')">Usuarios de mensajes</a></li>
    <li><a href="#listenv" id="listenv" onClick="recargar('index3','op=52','#panel_derecho_menu')">Enviar E-MAIL</a></li>
    <li><a href="#listsms" id="listsms" onClick="recargar('index3','op=58','#panel_derecho_menu')">Enviar SMS</a></li>
    <li><a href="#saldosms" id="saldosms" onClick="recargar('index3','op=59','#panel_derecho_menu')">Saldo SMS</a></li>
    <hr class="hr_menu" />
    <?php if($_SESSION['user_tipo'] == "SA") : ?>
    <li><a href="#est" id="est" onClick="recargar('index3','op=54','#panel_derecho_menu')">Listas de estadísticas</a></li>
    <li><a href="#estc" id="estc" onClick="recargar('index3','op=55','#panel_derecho_menu')">Crear nueva estadística</a></li>
    <hr class="hr_menu" />
    <?php endif; ?>
    <?php if($_SESSION['user_tipo'] == "SA" || $_SESSION['user_tipo'] == "AI") { ?>
    <li><a href="#vlu" id="vlu" onClick="recargar('index3','op=5','#panel_derecho_menu')">Ver lista de usuarios</a></li>
    <li><a href="#ii" id="ii" onClick="recargar('index3','op=2','#panel_derecho_menu')">Inscribir una iglesia</a></li>
    <?php } if($_SESSION['user_tipo'] == "I") { ?>
    <li><a href="#vlu" id="vlu" onClick="recargar('index3','op=21&iduser=<?php echo $_SESSION['user_01800'] ?>','#panel_derecho_menu')">Editar mi informaci&oacute;n personal</a></li>
    <?php } ?>
    <hr class="hr_menu" />
    <li><a href="#cc" id="cc" onClick="recargar('index3','op=6','#panel_derecho_menu')">Cambiar su clave de acceso</a></li>
    <hr class="hr_menu" />
    <?php if($_SESSION['user_tipo'] == "SA") { ?>
    <li><a href="#abr" id="abr" onClick="recargar('index3','op=9','#panel_derecho_menu')">Administrar Banner Rotativo</a></li>
    <li><a href="#ap" id="ap" onClick="recargar('index3','op=10','#panel_derecho_menu')">Administrar Publicidad</a></li>
    <hr class="hr_menu" />
    <li><a href="#apg" id="apg" onClick="recargar('index3','op=11','#panel_derecho_menu')">Agregar palabras al glosario</a></li>
    <li><a href="#mpg" id="mpg" onClick="recargar('index3','op=27','#panel_derecho_menu')">Mostrar palabras del glosario</a></li>
    <hr class="hr_menu" />
    <li><a href="#gcontinente" id="gccontinente" onClick="recargar('index3','op=61','#panel_derecho_menu')">Crear Continente</a></li>
    <li><a href="#gpais" id="gcpais" onClick="recargar('index3','op=62','#panel_derecho_menu')">Crear País</a></li>
    <li><a href="#gregion" id="gcregion" onClick="recargar('index3','op=63','#panel_derecho_menu')">Crear Región/Departamento</a></li>
    <li><a href="#gciudad" id="gcciudad" onClick="recargar('index3','op=64','#panel_derecho_menu')">Crear Ciudad/Municipio</a></li>
    <li><a href="#gciudad" id="gcbuscar" onClick="recargar('index3','op=65','#panel_derecho_menu')">Buscar</a></li>
    <hr class="hr_menu" />
    <li><a href="<?= $servidor ?>?op=66&op2=1" id="smmd">Subir iglesias de la misma denominación</a></li>
    <li><a href="<?= $servidor ?>?op=67&op2=2" id="smmp">Subir iglesias de diferente denominación</a></li>
    <hr class="hr_menu" />
    <li><a href="#si" id="si" onClick="recargar('index3','op=8','#panel_derecho_menu')">Solicitudes de inscripci&oacute;n</a></li>
    <li><a href="#t01800" id="t01800" onClick="recargar('index3','op=30','#panel_derecho_menu')">Editar 01800</a></li>
    <li><a href="http://www.01800iglesia.org/01800admin/manual01800iglesiaorg.pdf" target="_new">Manual de Usuario</a></li>
    <?php } ?>
  </div>
  <div id="panel_derecho_menu">
    <?php include("index3.php") ?>
  </div>
</div>
<?php
}
else header ("Location: ../");
?>
