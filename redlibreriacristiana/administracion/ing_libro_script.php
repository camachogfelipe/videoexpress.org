<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']))
{
   conecta_bd("redlibr_redlibreria");
   
   $titulo		= htmlentities($titulo);
   $autor		= htmlentities($autor);
   $editorial	= htmlentities($editorial);
   $sinopsis	= htmlentities($sinopsis);
   $articulos_relacionados = htmlentities($articulos_relacionados);

   //obtenemos la fecha de hoy
   $num_dia = date(j);
   $mes = date(n);
   $anio = date(Y);
   //formamos la fecha del día
   $fecha = "$anio-$mes-$num_dia";
   
   //procedemos a ejecutar los scripts necesarios para ingresar el libro a la base de datos
   //procedemos a copiar la imagen en el directorio de imagenes de libros
   if ($_REQUEST["action"] == "upload")
   {
      // obtenemos los datos del archivo 
      $tamano = $_FILES["imagen_caratula"]['size'];
      $tipo = $_FILES["imagen_caratula"]['type'];
      $archivo = $_FILES["imagen_caratula"]['name'];
   
      if ($archivo != "")
      {
		  $cadena_buscar['á'] = "a";
		  $cadena_buscar['é'] = "e;";
		  $cadena_buscar['í'] = "i";
		  $cadena_buscar['ó'] = "o";
		  $cadena_buscar['ú'] = "u";
		  $cadena_buscar['ñ'] = "n";
		  $cadena_buscar['Á'] = "A";
		  $cadena_buscar['É'] = "E";
		  $cadena_buscar['Í'] = "I";
		  $cadena_buscar['Ó'] = "O";
		  $cadena_buscar['Ú'] = "U";
		  $cadena_buscar['Ñ'] = "N";
		  $cadena_buscar[' '] = "_";

         //remplazamos las cadenas dentro del archivo
		 $archivo = strtr($archivo, $cadena_buscar);
		 $archivo = strtolower($archivo);

		 include("resize.php");
         
         $destino =  "../imagenes_articulos/";
         $destino .= $archivo;

		 if($imagen_caratula != NULL) unlink($_SERVER['DOCUMENT_ROOT']."/imagenes_articulos/".$imagen_caratula);
         if (copy($_FILES['imagen_caratula']['tmp_name'],$destino))
         {
			 $thumb=new thumbnail($_SERVER['DOCUMENT_ROOT']."/imagenes_articulos/".$archivo);			// generate image_file, set filename to resize
			 $thumb->size_width(160);				// set width for thumbnail, or
		 	 $thumb->size_height(220);				// set height for thumbnail, or
			 $thumb->jpeg_quality(100);				// [OPTIONAL] set quality for jpeg only (0 - 100) (worst - best), default = 75
			 $thumb->save($_SERVER['DOCUMENT_ROOT']."/imagenes_articulos/".$archivo);
             $status = "El libro se ha ingresado con exito";
         }
         else
         {
               $status = "Error al subir el archivo";
         }
	  }
      else
      {
         $archivo = $imagen_caratula;
         if ($archivo != NULL) $status = "Se han actualizado los datos";
         else $status = "La imagen está vacía";
      }
   
      if ($id > 0)
      {
         $query = "UPDATE articulos SET ";
		 $query .= "tipo = '$es', ";
         $query .= "titulo = '$titulo', ";
         $query .= "autor = '$autor', ";
         $query .= "editorial = '$editorial', ";
         $query .= "paginas = '$paginas', ";
         $query .= "tipo_caratula = '$tipo_caratula', ";
         $query .= "size = '$size', ";
         $query .= "precio_oficial = '$precio_oficial', ";
         $query .= "categoria_general = '$categoria_general', ";
         $query .= "resena = '$sinopsis', ";
         $query .= "articulos_relacionados = '$articulos_relacionados', ";
         $query .= "imagen_caratula = '$archivo', ";
         $query .= "en_promocion = '$en_promocion', ";
         $query .= "precio_promocion = '$precio_promocion', ";
         $query .= "articulo_promocion = '$articulo_promocion', ";
		 $query .= "novedad = '$novedad' ";
         $query .= "WHERE id='$id'";
         mysql_query($query) or die(mysql_error());
      }
      else
      {
         //Todo parece correcto procedemos con la inserccion
         $query = "INSERT INTO articulos (";
         $query .= "tipo, titulo, autor, editorial, paginas, tipo_caratula, size, precio_oficial, resena, articulos_relacionados, categoria_general, imagen_caratula, en_promocion, precio_promocion, articulo_promocion, novedad";
         $query .= ") VALUES (";
         $query .= "'$es', '$titulo', '$autor', '$editorial', '$paginas', '$tipo_caratula', '$size', '$precio_oficial', '$sinopsis', '$articulos_relacionados', '$categoria_general', '$archivo', '$en_promocion', '$precio_promocion', '$articulo_promocion', '$novedad')";
         mysql_query($query) or die(mysql_error());
      }
	  $query = "UPDATE datos SET ultima_actualizacion='$fecha'";
      mysql_query($query) or die(mysql_error());
   } 
   else
   {
      $status = "La acción que esta intentando no se puede realizar";
   }
}
else
{
   echo '<script type="text/javascript">window.location="../administracion";</script>';
}
?>
