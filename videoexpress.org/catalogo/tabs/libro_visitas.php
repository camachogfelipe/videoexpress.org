<?php
if($_GET['inc'] == 1)
{
	include("../../catalogo/include/funciones_globales.php");
	$id_p = $_GET['id_p'];
	$aud = $_GET['aud'];
}
$articulo = $id_p;
$tabla = "libro_visitas";
$conecta = conecta_bd("videoexpress");

if($url != "libro_visitas")
{
	$pagina = "videoclips";
	$vermas = $_REQUEST['vermas'];

	if(isset($_GET['vermas'])) $where = "id_libro<=$vermas and pagina='$aud'";
	else $where = "pagina='$aud'";
	if($articulo != "*") $where .= " and articulo='$articulo'";
	$where .= " and activo='1'";
	
	$resultid = consulta_bd($tabla,"*","5;id_libro;DESC;$where;3");

	while (($damefila=mysql_fetch_object($resultid)) && ($num_filas<2))
	{
		if($damefila->sexo == '0') $avatar = "$pagina/mujeres/";
		elseif($damefila->sexo == '1') $avatar = "$pagina/hombres/";
		
		if($damefila->edad == '0') $avatar .= "0";
		if($damefila->edad == '13') $avatar .= "1";
		if($damefila->edad == '26') $avatar .= "3";
		if($damefila->edad == '50') $avatar .= "5";
   	?>
<link href="../../libro_visitas/<?php echo $pagina ?>/libro.css" rel="stylesheet" type="text/css">

<div id="comentario">
  <div id="avatar" style="background-image:url(../../libro_visitas/<?php echo $avatar ?>.png)"></div>
		<div id="numcomentario">
       	<?php echo strip_tags($damefila->articulo); ?>
        </div>
		<div id="comentario_top"></div>
<div id="nombre">
           	<?php //si el visitante no introdujo nombre muestro como nombre "Anónimo"
			if ($damefila->nombre == "-") echo "Anónimo";
			elseif ($damefila->email != "-") echo '<a href="mailto:' . $damefila->email . '">' . $damefila->nombre . '</a>';
			else echo $damefila->nombre;
			echo "<br />".$damefila->fecha;
			?>
  </div>
  <div id="texto_comentario"><?php echo strip_tags($damefila->comentario)?><br /><br />
        Valoraci&oacute;n: <?php $star = $damefila->valoracion;
		for($i=1; $i<=$star; $i++) echo '<img src="../../libro_visitas/'.$pagina.'/estrella.png" width="21" height="22" align="top" />';
		if($star < 5) for($i=$star+1; $i<=5; $i++) echo '<img src="../../libro_visitas/'.$pagina.'/estrella_vacia.png" width="21" height="22" align="top" />';?>
  </div>
  <div id="comentario_bottom"></div>
</div>
	   <br>
       <?php
		$num_filas++;
	} //termina el bucle while
	if($num_filas < 1) echo "<div style=\"padding: 15px; color:#FFF\"><strong>No existen firmas en el libro de visitas de \"".$titulo."\"</strong></div><p></p>";
	//si quedan más valoraciones en el conjunto de resultados, muestro el enlace de "Ver más"
	if ($damefila)
	{
		echo '<script type="text/javascript">
	  function recargar(){   
       /// Aqui podemos enviarle alguna variable a nuestro script PHP
    var variable_post="";
       /// Invocamos a nuestro script PHP
    $.post("libro_visitas.php?vermas='.$damefila->id_libro.'&id_p='.$id_p.'&inc=1&aud='.$aud.'", { variable: variable_post }, function(data){
       /// Ponemos la respuesta de nuestro script en el DIV recargado
    var activeTab = $("#comentarios").html(data);
	$(activeTab).fadeIn(); 
    });        
}
	  </script>';
		echo '<div id="vermas"><a href="#" onclick="javascript:recargar();">Ver m&aacute;s comentarios</a></div>';
	}
}

function toma_imagen($articulo)
{
	$conecta = conecta_bd("videoexpress");
	$consulta = consulta_bd("radio", "Imagen", "1;;;id_radio='$articulo'");
	while ($damefila=mysql_fetch_object($consulta))
	{
		$img = $damefila->Imagen;
	}
	return $img;
}
?>