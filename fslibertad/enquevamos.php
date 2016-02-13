<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="eqv" class="titulo_menu_contenido"><span>Noticias y Artículos</span></div>
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
                    <hr size="3" />
        <li><a href="?op=4&s=7" class="<?php if($_GET['s']==8) echo "active" ?>">Informe anual</a></li>
    </div>
    <div id="contenido_contenido"><span>
    <?php
	$ed = $_GET['ed'];
	switch($_GET['s'])
	{
		case 1: encabezado_nya($ed, $_GET['s']);
				if($ed == NULL) mostrar_proyectos("iglesia");
				else vereditorial($ed);
				break;
		case 2: encabezado_nya($ed, $_GET['s']);
				if($ed == NULL) mostrar_proyectos("educacion");
				else vereditorial($ed);
				break;
		case 3: encabezado_nya($ed, $_GET['s']);
				if($ed == NULL) mostrar_proyectos("gcye");
				else vereditorial($ed);
				break;
		case 4: encabezado_nya($ed, $_GET['s']);
				if($ed == NULL) mostrar_proyectos("economia");
				else vereditorial($ed);
				break;
		case 5: encabezado_nya($ed, $_GET['s']);
				if($ed == NULL) mostrar_proyectos("familia");
				else vereditorial($ed);
				break;
		case 6: encabezado_nya($ed, $_GET['s']);
				if($ed == NULL) mostrar_proyectos("aye");
				else vereditorial($ed);
				break;
		case 7: encabezado_nya($ed, $_GET['s']);
				if($ed == NULL) mostrar_proyectos("mdc");
				else vereditorial($ed);
				break;
		case 8: informe_anual();
				break;
		default: encabezado_nya($ed, $_GET['s']);
				 if($ed == NULL) mostrar_proyectos("mdc");
				 else vereditorial($ed);
				 break;
	}
	?></span>
    </div>
</div>
<div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>