<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="qh" class="titulo_menu_contenido"><span>&iquest;Qu&eacute; hacemos?</span></div>
    <div id="menu_contenido" class="menu_qh">
    	<li><a href="?op=3&s=6" class="<?php if($_GET['s']==6) echo "active" ?>">Arte y Entretenimiento</a></li>
                    <hr size="3" />
    	<li><a href="?op=3&s=4" class="<?php if($_GET['s']==4) echo "active" ?>">Econom&iacute;a y negocios</a></li>
                    <hr size="3" />
        <li><a href="?op=3&s=2" class="<?php if($_GET['s']==2) echo "active" ?>">Educaci&oacute;n</a></li>
                    <hr size="3" />
        <li><a href="?op=3&s=5" class="<?php if($_GET['s']==5) echo "active" ?>">Familia</a></li>
                    <hr size="3" />
        <li><a href="?op=3&s=3" class="<?php if($_GET['s']==3) echo "active" ?>">Gobierno civil y Estado</a></li>
                    <hr size="3" />
    	<li><a href="?op=3&s=1" class="<?php if($_GET['s']==1) echo "active" ?>">Iglesia</a></li>
                    <hr size="3" />
        <li><a href="?op=3&s=7" class="<?php if($_GET['s']==7) echo "active" ?>">Medios de comunicaci&oacute;n</a></li>
    </div>
    <div id="contenido_contenido">
      <div id="div_izq_contenido2">
        <div id="contenido_contenido2">
          <?php
	switch($_GET['s'])
	{
		case 1:	quehacemos("iglesia");
				break;
		case 2:	quehacemos("educacion");
				break;
		case 3:	quehacemos("gcye");
				break;
		case 4:	quehacemos("eyn");
				break;
		case 5:	quehacemos("familia");
				break;
		case 6:	quehacemos("aye");
				break;
		case 7:	quehacemos("medcomunica");
				break;
		default:	cargar_informacion_gral($_GET['op'], "qhgral");
					break;
	}
	?>
        </div>
      </div>
      <div id="div_der_contenido2"></div>
  </div></div><div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>