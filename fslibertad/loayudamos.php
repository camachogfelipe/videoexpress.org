<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="lac" class="titulo_menu_contenido"><span>Comparte tu sue&ntilde;o</span></div>
    <div id="menu_contenido" class="menu_lac">
    	<li><a href="?op=6&s=1" class="<?php if($_GET['s']==1 || $_GET['s']==NULL) echo "active" ?>">Escribanos</a></li>
    </div>
    <div id="contenido_contenido"><p style="text-align:justify">La fundaci&oacute;n esta en disposici&oacute;n de ayudar y apoyar proyectos que sean para el crecimiento integral del ser humano. Escribanos una breve descripci&oacute;n de su proyecto en el formulario a continuaci&oacute;n, y nosotros lo contactaremos para definir si su proyecto est&aacute; a nuestro alcance y dentro de nuestro prop&oacute;sito. Gracias por contactarnos.
    </p>
    <?php
	switch($_GET['s'])
	{
		case 1: include("sa.php");
        		break;
		default: include("sa.php");
				 break;
	}
	?>
    </div>
</div>
<div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>