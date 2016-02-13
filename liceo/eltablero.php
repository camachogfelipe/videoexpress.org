<link rel="stylesheet" href="scripts/thickbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="scripts/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="scripts/thickbox.js"></script>
<script src="scripts/flowplayer-3.2.4.min.js" type="text/javascript"></script>
<?php include("administracion/conexion.php"); ?>
<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td width="30%" valign="top">
		<?php
		if($_GET['a'] != NULL)
		{
			$query = mysql_query("SELECT DISTINCT(area) FROM alumnos WHERE alumno='$_GET[a]' and curso='$_GET[c]' ORDER BY area ASC");
			echo "<ul id=\"tablero\">";
			while($row=mysql_fetch_object($query))
			{
				echo "<li>&Aacute;rea ".$row->area."</li>";
				$query2 = mysql_query("SELECT titulo FROM alumnos WHERE area='$row->area' and alumno='$_GET[a]' and curso='$_GET[c]' ORDER BY titulo ASC");
				echo "<ul id=\"tablero\">";
				while($row2=mysql_fetch_object($query2))
				{
					echo '<li><a href="?ac=9&a='.$_GET['a'].'&t='.$row2->titulo.'&c='.$_GET['c'].'">'.$row2->titulo.'</a></li>';
				}
				echo "</ul>";
			}
			echo "</ul>";
		}
		?>
    </td>
    <td width="70%" valign="top">
    	<div id="eltablero">
    	<?php
		if($_GET['a'] != NULL and $_GET['t'] != NULL)
		{
			$query = mysql_query("SELECT titulo, archivo FROM alumnos WHERE alumno='$_GET[a]' and titulo='$_GET[t]'");
			while($row=mysql_fetch_object($query))
			{
				echo "<center><strong>".$row->titulo."</strong></center>";
				$archivo = "alumnos/".$row->archivo;
				$_FILES['myfile']['name'] = $archivo;
				$tipo = strtolower(pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION));

				if($tipo == "png" || $tipo == "jpg" || $tipo == "jpeg")
				{
					echo "<br /><center>";
					$atributos = getimagesize($archivo);
					if($atributos[0] > 440 || $atributos[1] > 380)
					{
						echo '<a href="'.$archivo.'" title="'.$_GET['t'].'" class="thickbox"><img src="resize.php?archivo='.$archivo.'" border="0" alt="Ver la imagen completa"><img src="imagenes/zoomin.png" border="0" width="24" height="24" alt="Ver la imagen completa"></a>';
					}
					else
					{
						echo '<img src="alumnos/'.$row->archivo.'" width="'.$atributos[0].'" height="'.$atributos[1].'">';
					}
					echo "</center>";
				}
				if($tipo == "pdf")
				{
					echo '<embed src="alumnos/'.$row->archivo;
					echo '#toolbar=0&navpanes=0&scrollbar=1" width="554" height="325" style="margin-top: 10px"></embed>';
					echo '<noembed>Para ver la reseña se requiere Adobe Acrobat 8 o superior<br />Por favor instalelo<br /><a href="http://get.adobe.com/es/reader/?promoid=BUIGO">Adquirir Adobe Acrobat</a></noembed>';
				}
				if($tipo == "pps" || $tipo == "ppt" || $tipo == "pptx" || $tipo == "ppsx" || $tipo == "doc" || $tipo == "docx")
					echo '<a href="alumnos/'.$row->archivo.'">Descargar el archivo</a>';
				if($tipo == "mp4" || $tipo == "flv")
				{
					echo '<a href="alumnos/'.$row->archivo;
			 		echo '" style="display:block;width:554px;height:325px;margin-top:10px" id="player"></a>';
			        echo '<!-- this will install flowplayer inside previous A- tag. -->
					<script>
						flowplayer("player", "scripts/flowplayer-3.2.5.swf",
						{
							clip:  {
							autoPlay: true,
						}
					});
					</script>';
				}
			}
		}
		?>
        </div>
	 </td>
  </tr>
</table>