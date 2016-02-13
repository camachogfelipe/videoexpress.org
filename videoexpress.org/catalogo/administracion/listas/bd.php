<?php
/*$con = mysql_connect("localhost","root", "camachitos");
if (!$con)
{
die('Sin conexion: ' . mysql_error());
}
mysql_select_db("videoexpress", $con);*/

include('../conexion.php');

//return a list of all the users
$Query = "SELECT * from catalogo";
$Result = mysql_query( $Query );

$Return = "<users>";

while ( $User = mysql_fetch_object( $Result ) )
{
$Return .= "<user>
<id>".$User->id."</id>
<titulo>".$User->titulo."</titulo>
<auditorio>".$User->auditorio."</auditorio>
<clasificacion>".$User->clasificacion."</clasificacion>
<genero>".$User->genero."</genero>
<tiempo>".$User->tiempo."</tiempo>
<descripcion>".$User->descripcion."</descripcion>
<imagen>../../Imagenes_peliculas/".$User->imagen."</imagen>
<formato>".$User->formato."</formato>
<fecha>".$User->fecha."</fecha>
<nuevo>".$User->nuevo."</nuevo>
<compra>".$User->compra."</compra>
<precio_compra>".$User->precio_compra."</precio_compra>
<alquiler>".$User->alquiler."</alquiler>
<pc>".$User->precio_compra."</pc>
<alquilada>".$User->alquilada."</alquilada>
<trailer>../../files/".$User->trailer."</trailer>
<resena>".$User->resena."</resena>
</user>";
}
$Return.= "</users>";

mysql_free_result($Result);
print ($Return);

?>

<?xml version="1.0" encoding="UTF-8"?>
<playlist version="1" xmlns="http://xspf.org/ns/0/">
    <title>Ounage Playlist</title>
    <creator>Dew</creator>
    <link>http://www.blup.fr/</link>
    <info>The Best Playlist for Testing</info>
    <image>covers/tracklist.jpg</image>

    <trackList>
	<?php
		include('../catalogo/include/funciones_globales.php');
		$conecta = conecta_bd("videoexpress");
		
		$Result = consulta_bd("radio", "*", "3;id_radio;ASC;Activo=1;");

		$Return = "<users>";

		while ( $User = mysql_fetch_object( $Result ) )
		{
			$Return .= "<track>
			<location>mp3/".$User->Archivo."</location>
			<creator>".$User->Descripcion."</creator>
			<album>español</auditorio>
			<title>".$User->Nombre."</clasificacion>
			<image>covers/".$User->Imagen."</imagen>
			<tiempo>".$User->tiempo."</tiempo>
			<link>libro_visitas.php?art=".$User->Id_radio."</descripcion>
			</track>";
		}
		$Return.= "</users>";

		mysql_free_result($Result);
		print ($Return);
	?>
    
</trackList>
</playlist>