esto es el index
<?php
echo "cargo index";
include("../catalogo/include/funciones_globales.php");
if($_REQUEST['art'] == NULL) $articulo = "*";
else echo $articulo = $_REQUEST['art']; 
$tabla = "libro_visitas";
$conecta = conecta_bd("videoexpress");
//eliminamos las etiquetas HTML y PHP de las cadenas de texto
$nombre = strip_tags($_REQUEST["nombre"]);
$email = strip_tags($_REQUEST["email"]);
$valoracion = $_REQUEST['valoracion'];
$comentario = strip_tags($_REQUEST["comentario"]);
$edad = $_REQUEST['edad'];
$sexo = $_REQUEST['sexo'];

$url = explode("/", $_SERVER['REQUEST_URI']);
/*$sizeof = sizeof($url);
for($i=0; $i<$sizeof; $i++) echo "URL[$i] = ".$url[$i]."<br />";*/

if($url[1] != "libro_visitas")
{
	$pagina = $url[1];
	if($nombre == NULL and $email == NULL and $valoracion == NULL and $comentario == NULL)
	{
		$vermas = $_REQUEST['vermas'];
		
		if(isset($_GET['vermas'])) $where = "id_libro<=$vermas and pagina='$pagina'";
		else $where = "pagina='$pagina'";
		if($articulo != "*") $where .= " and articulo='$articulo'";
		
		$resultid = consulta_bd($tabla,"*","5;id_libro;DESC;$where;4");
	
		while (($damefila=mysql_fetch_object($resultid)) && ($num_filas<3))
		{
			if($damefila->sexo == '0') $avatar = "mujeres/";
			elseif($damefila->sexo == '1') $avatar = "hombres/";
			
			if($damefila->edad == '0') $avatar .= "0";
			if($damefila->edad == '13') $avatar .= "1";
			if($damefila->edad == '26') $avatar .= "3";
			if($damefila->edad == '50') $avatar .= "5";
    	?>
        <div id="comentario">
			<div id="avatar" style="background-image:url(../libro_visitas/<?php echo $avatar ?>.png)"></div>
			<div id="numcomentario"><?php echo strip_tags($damefila->id_libro)?></div>
			<div id="comentario_top"></div>
		    <div id="nombre">
            	<?php //si el visitante no introdujo nombre muestro como nombre "Anónimo"
				if ($damefila->nombre == "-") echo "Anónimo";
				elseif ($damefila->email != "-") echo '<a href="mailto:' . $damefila->email . '">' . $damefila->nombre . '</a>';
				else echo $damefila->nombre;
				?>
            </div>
		    <div id="texto_comentario"><?php echo strip_tags($damefila->comentario)?><br /><br />
            Valoración: <?php $star = $damefila->valoracion;
			for($i=1; $i<=$star; $i++) echo '<img src="../libro_visitas/estrella.png" width="21" height="22" align="top" />';
			if($star < 5) for($i=$star+1; $i<=5; $i++) echo '<img src="../libro_visitas/estrella_vacia.png" width="21" height="22" align="top" />';?>
            </div>
            <div id="comentario_bottom"></div>
		</div>
	    <br>
    	<?php
			$num_filas++;
		} //termina el bucle while
if($num_filas < 1) echo "<strong>No existen firmas en el libro de visitas de ".$url[1]."</strong><p></p>";
		//si quedan más valoraciones en el conjunto de resultados, muestro el enlace de "Ver más"
		if ($damefila)
		{
			echo "<div align=left><b><a href=\"?vermas=$damefila->id_libro&pagina=$pagina";
			if($articulo != NULL) echo "&art=$articulo";
			echo "\">Ver más mensajes</a></b></div><br>";
		}
		if($articulo != "*") include("formul_libro.php");
	}
	else
	{	
		//Cortamos las cadenas demasiado largas
		$nombre=substr($nombre,0,150);
		$email=substr($email,0,80);

		ing_datos_tabla($tabla,"nombre, email, valoracion, comentario, pagina, articulo, edad, sexo","'$nombre','$email','$valoracion','$comentario','$pagina', '$articulo', '$edad', '$sexo'");

		echo '<div align="center"><b>Muchas gracias por tu participación</b></div>';
	}
}
else echo "<strong>Usted no esta autorizado a ver estos comentarios</strong>";
?>