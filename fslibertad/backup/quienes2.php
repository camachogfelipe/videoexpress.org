<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="quienes" class="titulo_menu_contenido"><span>Quienes somos</span></div>
    <div id="menu_contenido" class="menu_quienes">
    	<span>
    	<li><a href="?op=1&s=1" class="<?php if($_GET['s']==1 || $_GET['s']==NULL) echo "active" ?>">Visi&oacute;n y Misi&oacute;n</a></li>
        <li><a href="?op=1&s=2" class="<?php if($_GET['s']==2) echo "active" ?>">Prop&oacute;sito</a></li>
        <li><a href="?op=1&s=3" class="<?php if($_GET['s']==3) echo "active" ?>">Valores</a></li>
        <li><a href="?op=1&s=4" class="<?php if($_GET['s']==4) echo "active" ?>">Objeto social</a></li>
        <li><a href="?op=1&s=5" class="<?php if($_GET['s']==5) echo "active" ?>">Estructura organizacional</a></li>
        <li><a href="?op=1&s=6" class="<?php if($_GET['s']==6) echo "active" ?>">Historia</a></li>
        <li><a href="?op=1&s=7" class="<?php if($_GET['s']==7) echo "active" ?>">Biograf&iacute;a fundadores</a></li>
        </span>
    </div>
    <div id="contenido_contenido">
    <?php
	switch($_GET['s'])
	{
		case 1: ?><span id="titulo_contenido" class="color1">Visi&oacute;n:</span>
        <p>Que en la naci&oacute;n las familias vivan en hogares de paz, en habitaciones seguras y que sean lugares de reposo, unidad, amor, prosperidad y luz para las naciones.</p>
	  <span><em>Isa&iacute;as 32: 16-20</em></span>
  	  <p id="titulo_contenido" class="color1">Misi&oacute;n:</p>
        <span>Promover la justicia impulsando el crecimiento integral del Ser Humano y su familia, desarrollando su potencial creativo, con el prop&oacute;sito de generar un nuevo liderazgo renovador y transformador con la Verdad del Reino de Dios.</span><p><em>Romanos 12:1-2</em></p>
        <?php break;
		case 2: echo '<span id="titulo_contenido" class="color1">Prop&oacute;sito</span>';
				include("proposito.html");
				break;
		case 3: echo '<span id="titulo_contenido" class="color1">Valores</span>';
				echo '<p>Nuestros valores se fundamentan en la Palabra de Mateo 5:1-12 y Galatas 5:22-26, como son:</p>';
				echo '<ul id="trad">
						<li>Amor</li>
						<li>Humildad</li>
						<li>Paciencia</li>
						<li>Bondad</li>
						<li>Justicia</li>
						<li>Compasi&oacute;n</li>
						<li>Integridad</li>
						<li>Paz</li>
						<li>Valent&iacute;a</li>
						<li>Alegr&iacute;a</li>
					</ul>';
				break;
		case 4: echo '<span id="titulo_contenido" class="color1">Objeto Social</span>';
				include("objsocial.html");
				break;
		case 5: echo '<span id="titulo_contenido" class="color1">Estructura organizacional</span>';
				break;
		case 6: echo '<span id="titulo_contenido" class="color1">Historia</span>';
				break;
		case 7: echo '<span id="titulo_contenido" class="color1">Biograf&iacute;a fundadores</span>';
				include("biofundadores.html");
				break;
		default: ?><span id="titulo_contenido" class="color1">Visi&oacute;n:</span>
   	  	<p>Que en la naci&oacute;n las familias vivan en hogares de paz, en habitaciones seguras y que sean lugares de reposo, unidad, amor, prosperidad y luz para las naciones.</p>
		<span><em>Isa&iacute;as 32: 16-20</em></span>
	  	<p id="titulo_contenido" class="color1">Misi&oacute;n:</p>
        <span>Promover la justicia impulsando el crecimiento integral del Ser Humano y su familia desarrollando su potencial creativo, con el prop&oacute;sito de generar un nuevo liderazgo renovador y transformador con la Verdad del Reino de Dios.</span><p><em>Romanos 12:1-2</em></p>
       <?php
	   			break;
	}
	?>
    </div>
</div>
<div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>