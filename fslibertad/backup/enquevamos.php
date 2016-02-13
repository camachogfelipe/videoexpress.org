<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="eqv" class="titulo_menu_contenido"><span>&iquest;En qu&eacute; vamos?</span></div>
    <div id="menu_contenido" class="menu_eqv">
    	<li><a href="?op=4&s=6" class="<?php if($_GET['s']==6 || $_GET['s']==NULL) echo "active" ?>">Arte y entretenimiento</a></li>
                    <hr size="3" />
    	<li><a href="?op=4&s=4" class="<?php if($_GET['s']==4) echo "active" ?>">Econom&iacute;a y negocios</a></li>
                    <hr size="3" />
        <li><a href="?op=4&s=2" class="<?php if($_GET['s']==2) echo "active" ?>">Educaci&oacute;n</a></li>
                    <hr size="3" />
        <li><a href="?op=4&s=5" class="<?php if($_GET['s']==5) echo "active" ?>">Familia</a></li>
                    <hr size="3" />
        <li><a href="?op=4&s=3" class="<?php if($_GET['s']==3) echo "active" ?>">Gobierno civil y Estado</a></li>
                    <hr size="3" />
    	<li><a href="?op=4&s=1" class="<?php if($_GET['s']==1) echo "active" ?>">Iglesia</a></li>
                    <hr size="3" />
        <li><a href="?op=4&s=7" class="<?php if($_GET['s']==7) echo "active" ?>">Medios de comunicaci&oacute;n</a></li>
    </div>
    <div id="contenido_contenido"><span>
    <?php
	include("fsladmin/funciones.php");
	switch($_GET['s'])
	{
		case 1: mostrar_proyectos("iglesia");
				break;
		case 2: mostrar_proyectos("educacion");
				break;
		case 3: mostrar_proyectos("gobierno");
				break;
				
		case 4: mostrar_proyectos("economia");
				break;
				
		case 5: mostrar_proyectos("familia");
				break;
		case 6: mostrar_proyectos("arte");
				break;
		case 7: mostrar_proyectos("medios");
				break;
		case 8: informe_anual();
				break;
		default: mostrar_proyectos("arte");
				 break;
	}
	?></span>
    </div>
</div>
<div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>