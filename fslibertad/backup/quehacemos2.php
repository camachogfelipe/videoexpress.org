<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="qh" class="titulo_menu_contenido"><span>&iquest;Qu&eacute; hacemos?</span></div>
    <div id="menu_contenido" class="menu_qh">
    	<li><a href="?op=3&s=1" class="<?php if($_GET['s']==1 || $_GET['s']==NULL) echo "active" ?>">Plan de trabajo</a></li>
    </div>
    <div id="contenido_contenido">
    <?php
	switch($_GET['s'])
	{
		case 1: ?><span id="titulo_contenido" class="color3">Plan de trabajo:</span>
		<p>Las Familias de Dios habiten en moradas de paz, en habitaciones seguras y en serenos lugares de reposo, en unidad, amor y prosperidad.</p><p>Isa&iacute;as 32: 16-20</p>
        Impulsar el crecimiento integral del Ser Humano y el desarrollo de su Potencial Creativo, con el fin de generar un nuevo liderazgo renovador y transformador con la Verdad del Reino de Dios, apoyando a la Iglesia de Cristo a cumplir la Gran Comisi&oacute;n.<p>Romanos 12:1-2</p>
        <?php break;
		default: ?><span id="titulo_contenido" class="color3">Plan de trabajo:</span>
		<p>Las Familias de Dios habiten en moradas de paz, en habitaciones seguras y en serenos lugares de reposo, en unidad, amor y prosperidad.</p><p>Isa&iacute;as 32: 16-20</p>
        Impulsar el crecimiento integral del Ser Humano y el desarrollo de su Potencial Creativo, con el fin de generar un nuevo liderazgo renovador y transformador con la Verdad del Reino de Dios, apoyando a la Iglesia de Cristo a cumplir la Gran Comisi&oacute;n.<p>Romanos 12:1-2</p>
       <?php
	   		  break;
	}
	?>
    </div>
</div>
<div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>