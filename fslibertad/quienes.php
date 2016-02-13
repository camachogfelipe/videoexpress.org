<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="quienes" class="titulo_menu_contenido"><span>Quienes somos</span></div>
    <div id="menu_contenido" class="menu_quienes">
    	<span>
    	<li><a href="?op=1&amp;s=1" class="<?php if($_GET['s']==1 || $_GET['s']==NULL) echo "active" ?>">Visi&oacute;n y Misi&oacute;n</a></li>
		<hr size="3" />
        <li><a href="?op=1&amp;s=2" class="<?php if($_GET['s']==2) echo "active" ?>">Prop&oacute;sito</a></li>
        <hr size="3" />
        <li><a href="?op=1&amp;s=3" class="<?php if($_GET['s']==3) echo "active" ?>">Valores</a></li>
        <hr size="3" />
        <li><a href="?op=1&amp;s=4" class="<?php if($_GET['s']==4) echo "active" ?>">Objeto social</a></li>
        <hr size="3" />
        <li><a href="?op=1&amp;s=5" class="<?php if($_GET['s']==5) echo "active" ?>">Estructura de influencia</a></li>
        <hr size="3" />
        <li><a href="?op=1&amp;s=6" class="<?php if($_GET['s']==6) echo "active" ?>">Historia</a></li>
        <hr size="3" />
        <li><a href="?op=1&amp;s=7" class="<?php if($_GET['s']==7) echo "active" ?>">Biograf&iacute;a fundadores</a></li>
        <hr size="3" />
        <li><a href="?op=1&amp;s=8" class="<?php if($_GET['s']==8) echo "active" ?>">Junta Directiva</a></li>
        <hr size="3" />
        <li><a href="?op=1&amp;s=9" class="<?php if($_GET['s']==9) echo "active" ?>">Colaboradores</a></li>
        </span>
    </div>
    <div id="contenido_contenido">
    <?php
	switch($_GET['s'])
	{
		case 1: cargar_informacion_gral($_GET['op'], "vision");
				cargar_informacion_gral($_GET['op'], "mision");
				break;
		case 2: cargar_informacion_gral($_GET['op'], "proposito");
				break;
		case 3: cargar_informacion_gral($_GET['op'], "valores");
				break;
		case 4: cargar_informacion_gral($_GET['op'], "objsocial");
				break;
		case 5: cargar_informacion_gral($_GET['op'], "estructuraorganizacional");
				break;
		case 6: cargar_informacion_gral($_GET['op'], "historia");
				break;
		case 7: cargar_informacion_fundadores();
				break; 
		case 8: cargar_informacion_junta();
				break; 
		case 9: colaboradores();
				break;
		default: cargar_informacion_gral($_GET['op'], "vision");
				 cargar_informacion_gral($_GET['op'], "mision");
				 break;
	}
	?>
    </div>
</div>
<div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>