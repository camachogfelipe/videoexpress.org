<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="ac" class="titulo_menu_contenido"><span>Ayudenos a crecer</span></div>
    <div id="menu_contenido" class="menu_ac">
    	<li><a href="?op=5&s=1" class="<?php if($_GET['s']==1 || $_GET['s']==NULL) echo "active" ?>">Escribanos</a></li>
                    <hr size="3" />
        <li><a href="?op=5&s=2" class="<?php if($_GET['s']==2) echo "active" ?>">Donaciones</a></li>
    </div>
    <div id="contenido_contenido">
    <?php
	switch($_GET['s'])
	{
		case 1: texto();
				include("pa.php");
        		break;
		case 2: cargar_informacion_gral($_GET['op'], "donaciones");
				break;
		default: texto();
				 include("pa.php");
				 break;
	}
	?>
    </div>
</div>
<div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>

<?php
function texto()
{
	?>
    <span id="titulo_contenido" class="color5">Tipos de ayuda</span>
	<p style="text-align:justify">Nuestro prop&oacute;sito es impulsar el crecimiento integral del Ser Humano y el desarrollo de su Potencial Creativo, con el fin de generar un nuevo liderazgo renovador y transformador con la Verdad del Reino de Dios.</p> 
    <p> </p>
    <p> Requerimos su ayuda en muchas áreas con aportes, respaldo o participando en los proyectos de atención de familias con personas discapacitadas. </p>
	<p> </p>
    <p>Queremos personas como usted que nos ayuden a crecer en este prop&oacute;sito. 
    <p>Por favor diligencie el formulario a continuaci&oacute;n dici&eacute;ndonos en que nos puede ayudar.</p>
    </p>
	<?php
}
?>