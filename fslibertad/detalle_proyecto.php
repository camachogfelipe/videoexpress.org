<?php
session_start();
/*error_reporting(E_ALL);
ini_set("display_errors", 1);*/
if(isset($_GET['l'])){ $_SESSION['lang'] = $_GET['l']; }
?>
<script src="https://www.google.com/jsapi?key=ABQIAAAAOMhRlZ-C7tduTCg23mYARBTCXIT2lC7rH4jAmoltB9iwUyU0wBRaXiFXHijoSGE2LyjCFiHG-lsNvw" type="text/javascript"></script>
<script type="text/javascript">google.load("mootools", "1.3.0");</script>
<script type="text/javascript" src="scripts/mootools-more.js"></script>
<script type="text/javascript" src="scripts/McTranslate.js"></script>
<script type="text/javascript" src="scripts/jquery-1.5.1.js"></script>
<script type="text/javascript" src="scripts/fslibertad.js"></script>
<script type="text/javascript" src="scripts/flowplayer-3.2.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="detalle_proyecto.css" />
<div id="detalle_proyecto">
<?php
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			require("fsladmin/funciones.php");
			$conecta = conecta_bd();
			$consulta = consulta_bd("proyectos", "*", "1;;;id_proyecto='$id'");
			
			while($filaproyecto = mysql_fetch_object($consulta))
			{
				echo '<div id="DT_logo">';
				if($filaproyecto->logo_proyecto == NULL) $logoproyecto = "Defaultproyectos.png";
				else $logoproyecto = $filaproyecto->logo_proyecto;
				echo '<img src="proyectos/logos/'.$logoproyecto.'" width="150" height="150">';
				echo '</div>';
				echo '<div id="DT_descripcion">';
				echo '<table cellpadding="5" cellspacing="0" border="1" align="center" id="DT_tabla">';
				echo '<caption>Detalles del proyecto</caption>';
				echo '<tr>';
				echo '<td id="DT_titulo">Fecha de inicio: </td>';
				echo '<td>'.$filaproyecto->fecha_inicio.'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td id="DT_titulo">Fecha de terminaci&oacute;n:</td><td>';
				if($filaproyecto->fecha_final == "0000-00-00") echo "En desarrollo";
				else echo $filaproyecto->fecha_final;
				echo '</td></tr>';
				echo '<tr>';
				echo '<td id="DT_titulo">&Uacute;ltima actividad: </td>';
				echo '<td>'.$filaproyecto->ultima_actividad.'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<br /><td id="DT_titulo">Lugar de desarrollo: </td>';
				echo '<td>'.$filaproyecto->donde.'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td id="DT_titulo">Personas a cargo: </td>';
				echo '<td><ul>';
				$items = explode(",", $filaproyecto->quienes);
				foreach($items as $k) echo '<li>'.$k.'</li>';
				echo '</ul></td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td id="DT_titulo">Inversi&oacute;n: </td><td>';
				echo 'CO$ '.number_format($filaproyecto->inversion_pesos).'<br />';
				echo 'US$ '.number_format($filaproyecto->inversion_dolares);
				echo '</td></tr>';
				echo '<tr>';
				echo '<td id="DT_titulo">Personas a impactar o impactadas: </td>';
				echo '<td>'.number_format($filaproyecto->personas_impactadas).'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td id="DT_titulo">Fotos: </td>';
				echo '<td>';
				if(!empty($filaproyecto->fotos))
				{
					echo '<div id="slideshow">';
					$fotos = explode(",", $filaproyecto->fotos);
					$a=0;
					foreach($fotos as $item)
					{
						echo '<img src="proyectos/fotos/'.$item.'" /> ';
						$a++;
						if($a == 3) echo "<br />";
					}
					echo '</div>';
				}
				echo '</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td id="DT_titulo">Descripci&oacute;n: </td>';
				echo '<td>'.$filaproyecto->descripcion.'</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td id="DT_titulo">Video: </td>';
				echo '<td>';
				if($filaproyecto->video != NULL || $filaproyecto->video != "")
				{
					echo '<a href="proyectos/videos/'.$filaproyecto->video.'" ';
					echo 'style="display:block;width:490px;height:280px; margin-left:auto;margin-right:auto" id="player"></a>';
					?>
                    <!-- this will install flowplayer inside previous A- tag. -->
                    <script>
						flowplayer("player", "scripts/flowplayer-3.2.5.swf",
						{
							clip: {
								autoPlay: false,
							}
						});
					</script>
				<?php
				}
				echo '</td>';
				echo '</tr>';
				echo '</table>';
				echo '</div>';
			}

			if($_SESSION['lang'] == "en")
			{
				echo '<script type="text/javascript">translate()</script>';
			}
			//desconecta_bd($conecta);
		}
		else echo "Los detalles del proyecto no han sido cargados";
	?>
</div>