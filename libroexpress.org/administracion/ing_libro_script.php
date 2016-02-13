<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']))
{
   include ("conexion.php");
   conecta_bd("libroexpress");

   //obtenemos la fecha de hoy
   $num_dia = date(j);
   $mes = date(n);
   $anio = date(Y);
   //formamos la fecha del día
   $fecha = "$anio-$mes-$num_dia";
   
   //procedemos a ejecutar los scripts necesarios para ingresar el libro a la base de datos
   
   //seleccionamos el numero de la imagen para ingresarla
   $sql = "SELECT num_img FROM datos";
   $result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
   while($row=mysql_fetch_object($result))
   {
      $numimg = $row->num_img;
   }

   //procedemos a copiar la imagen en el directorio de imagenes de libros
   if ($_REQUEST["action"] == "upload")
   {
      // obtenemos los datos del archivo 
         $tamano = $_FILES["imagen_caratula"]['size'];
         $tipo = $_FILES["imagen_caratula"]['type'];
       $archivo_tmp = $_FILES["imagen_caratula"]['name'];
   
         if ($archivo_tmp != "")
      {
            // guardamos el archivo a la carpeta imagenes_libros                 
         $numimg++;
         $num_img = $numimg;
         $numimg = "CL".$numimg;
         $numimg .= "_";
         
         $tmp = $archivo_tmp;
         $archivo_tmp = $numimg;
         $archivo_tmp .= $tmp;
         
         //establecemos las cadenas que debemos remplazar
         $cadena_buscar['á'] = "a";
         $cadena_buscar['é'] = "e";
         $cadena_buscar['í'] = "i";
         $cadena_buscar['ó'] = "o";
         $cadena_buscar['ú'] = "u";
         $cadena_buscar['ñ'] = "n";
         
         //remplazamos las cadenas dentro del archivo
         $archivo = strtr($archivo_tmp, $cadena_buscar);
         
         $destino =  "../imagenes_libros/";
         $destino .= $archivo;
         
         if (copy($_FILES['imagen_caratula']['tmp_name'],$destino))
         {
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
         $query = "UPDATE libros SET ";
         $query .= "titulo = '$titulo', ";
         $query .= "autor = '$autor', ";
         $query .= "editorial = '$editorial', ";
         $query .= "paginas = '$paginas', ";
         $query .= "tipo_pasta = '$tipo_pasta', ";
         $query .= "size = '$size', ";
         $query .= "precio_dolares = '$precio_dolares', ";
         $query .= "categoria_general = '$categoria_general', ";
         $query .= "sinopsis = '$sinopsis', ";
         $query .= "categoria_especifica = '$categoria_especifica', ";
         $query .= "articulos_relacionados = '$articulos_relacionados', ";
         $query .= "imagen_caratula = '$archivo', ";
         $query .= "en_promocion = '$en_promocion', ";
         $query .= "porcentaje_promocion = '$porcentaje_promocion', ";
         $query .= "articulo_promocion = '$articulo_promocion' ";
         $query .= "WHERE id='$id'";
         mysql_query($query) or die(mysql_error());
         $query = "UPDATE datos SET ultima_actualizacion='$fecha', num_img='$num_img'";
         mysql_query($query) or die(mysql_error());
      }
      else
      {
         //Todo parece correcto procedemos con la inserccion
         $query = "INSERT INTO libros (";
         $query .= "titulo, autor, editorial, paginas, tipo_pasta, size, precio_dolares, categoria_general, sinopsis, categoria_especifica, articulos_relacionados, imagen_caratula, en_promocion, porcentaje_promocion, articulo_promocion";
         $query .= ") VALUES (";
         $query .= "'$titulo', '$autor', '$editorial', '$paginas', '$tipo_pasta', '$size', '$precio_dolares', '$categoria_general', '$sinopsis', '$categoria_especifica', '$articulos_relacionados', '$archivo', '$en_promocion', '$porcentaje_promocion', '$articulo_promocion')";
         mysql_query($query) or die(mysql_error());
         $query = "UPDATE datos SET ultima_actualizacion='$fecha', num_img='$num_img'";
         mysql_query($query) or die(mysql_error());
      }
   } 
   else
   {
      $status = "La acción que esta intentando no se puede realizar";
   }
}
else
{
   include ('index.php');
}
?>
