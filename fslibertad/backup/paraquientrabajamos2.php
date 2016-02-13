<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="pqt" class="titulo_menu_contenido"><span>Para quien trabajamos</span></div>
    <div id="menu_contenido" class="menu_pqt">
    	<li><a href="?op=2&s=6" class="<?php if($_GET['s']==6 || $_GET['s']==NULL) echo "active" ?>">Arte y Entretenimiento</a></li>
    	<li><a href="?op=2&s=4" class="<?php if($_GET['s']==4) echo "active" ?>">Econom&iacute;a y negocios</a></li>
        <li><a href="?op=2&s=2" class="<?php if($_GET['s']==2) echo "active" ?>">Educaci&oacute;n</a></li>
        <li><a href="?op=2&s=5" class="<?php if($_GET['s']==5) echo "active" ?>">Familia</a></li>
        <li><a href="?op=2&s=3" class="<?php if($_GET['s']==3) echo "active" ?>">Gobierno civil y Estado</a></li>
    	<li><a href="?op=2&s=1" class="<?php if($_GET['s']==1) echo "active" ?>">Iglesia</a></li>
        <li><a href="?op=2&s=7" class="<?php if($_GET['s']==7) echo "active" ?>">Medios de comunicaci&oacute;n</a></li>
    </div>
    <div id="contenido_contenido">
    <?php
	switch($_GET['s'])
	{
		case 1: ?><span id="titulo_contenido" class="color2">Iglesia:</span>
		<p>Apoyar a las iglesias (Liderazgo), en formaci&oacute;n y transformaci&oacute;n del individuo y su familia, para vivir de acuerdo al prop&oacute;sito de Dios.</p>
        <span>Apoyar a diferentes ministerios que requieran tanto de fondos como de impulso y soporte gerencial.</span>
        <p>Ser vocero (explorador) de otros ministerios en los diferentes escenarios que intervenga "FSL".</p>
        <span>Hacer alianzas estrategicas para cumplir la misi&oacute;n y la visi&oacute;n de la fundaci&oacute;n.</span>
        <?php break;
		case 2: ?><span id="titulo_contenido" class="color2">Educaci&oacute;n:</span>
		<p></p>
        <?php break;
		case 3: ?><span id="titulo_contenido" class="color2">Gobierno civil y Estado:</span>
		<p>Apoyar a los hombres que ejercen autoridad en los diferentes entes del estado.</p>
        <span>Apoyar proyectos de transformaci&oacute;n (buen gobierno) en las entidades guvernamentales.</span>
        <p>Aportar estudios que permitan ver el evangelio trasnformador como activo fundamental en el desarrollo del pa&iacute;s.</p>
        <span>Ense&ntilde;ar desde la ni&ntilde;es la importancia de participar activamente en los procesos pol&iacute;ticos (seg&uacute;n el llamado individual) para tener en el futuro gobernantes cristianos.</span>
        <?php break;
		case 4: ?><span id="titulo_contenido" class="color2">Econom&iacute;a y negocios:</span>
		<p>Buscar oportunidad de negocios en los diferentes campos de la econom&iacute;a que permitan fortalecer los proyectos de la fundaci&oacute;n.</p>
        <span>Ser puente de bendici&oacute;n para proveer trabajo a las familias objeto de "FSL" y poder generar empresa.</span>
        <p>Formar y capacitar en temas empresariales y de gerencia.</p>
        <span>Hacer consultor&iacute;as empresariales en los diferentes campos.</span>
        <?php break;
		case 5: ?><span id="titulo_contenido" class="color2">Familia:</span>
		<p>Campa&ntilde;as para dignificar al discapacitado en un entorno hostil.</p>
        <span>Apoyar a los discapacitados y sus familias espiritual, emocional, medica y finacieramente.</span>
        <p>Realizar brigadas m&eacute;dicas.</p>
        <span>Realizar brigadas productivas y competitivas.</span>
        <p>Dar consultor&iacute;as (consejer&iacute;as especializadas) en diferentes &aacute;reas de la salud y la econom&iacute;a.</p>
        <span>Brindar oportunidad a los adolescentes, j&oacute;venes y sus familias en espacios de esparcimiento que los atraiga m&aacute;s que los que ofrece el mundo.</span>
        <p>Discipular las familias y enviarlas a las congregaciones locales cercana a sus lugar de residencia.</p>
        <?php break;
		case 6: ?><span id="titulo_contenido" class="color2">Arte y entretenimiento:</span>
        <?php break;
		case 7: ?><span id="titulo_contenido" class="color2">Medios de comunicaci&oacute;n:</span>
        <?php break;
		default: ?><span id="titulo_contenido" class="color2">Arte y entrenimiento:</span>
       <?php
	   			 break;
	}
	?>
    </div>
</div>
<div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>