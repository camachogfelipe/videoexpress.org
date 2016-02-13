<?php
session_start();

  // check session variable

if (isset($_SESSION['valid_user']))
{
   if(isset($datos)) $sql = "select $datos FROM $tabla where Pertenece_a='libro' ORDER BY ";
   else $sql = "select * FROM $tabla ORDER BY ";
   $pag = $_REQUEST['pag'];
   if ($pag == NULL) $pag = 0;
   else $pag -= 1;

   $y = $pag * $lis;
   
   $limit = "LIMIT $y, $lis";
   
   if($tabla == 'clientes')
   {
      switch ($x)
      {
         //orden por cedula
         case "1":   $sql .= "(cedula) ASC ".$limit;
                  break;
         //orden por nombre
         case "2":   $sql .= "(nombre) ASC ".$limit;
                  break;
         //orden por apellidos
         case "3":   $sql .= "(apellidos) ASC ".$limit;
                  break;
         //orden por direccion
         case "4":   $sql .= "(direccion) ASC ".$limit;
                  break;
         //orden por telefono
         case "5":   $sql .= "(telefono) ASC ".$limit;
                  break;
         //orden por celular
         case "6":   $sql .= "(celular) ASC ".$limit;
                  break;
         //orden por correo
         case "7":   $sql .= "(correo) ASC ".$limit;
                  break;
         //orden por ciudad
         case "8":   $sql .= "(ciudad) ASC ".$limit;
                  break;
         //orden por pais
         case "9":   $sql .= "(pais) ASC ".$limit;
                  break;
      }
   }
   if($tabla == 'facturas' || $tabla == "facturas LEFT JOIN dolar_fac_libro USING (`id_factura`)")
   {
      switch ($x)
      {
         //orden por id
         case "1":   $sql .= "(id_factura) ASC ".$limit;
                     break;
         //orden por id comprador
         case "2":   $sql .= "(id_comprador) ASC ".$limit;
                     break;
         //orden por autor
         case "3":   $sql .= "(precio) ASC ".$limit;
                     break;
         //orden por fecha de cancelada
         case "4":   $sql .= "(fecha_cancelada) DESC ".$limit;
                     break;
         //orden por fecha de emision
         case "5":   $sql .= "(fecha_emision) DESC ".$limit;
                     break;
         case "6":   $sql .= "(dolar_facturado) ASC";
                     break;
      }
   }
   if($tabla == 'libros')
   {
      switch ($x)
      {
         //orden por id
         case "1":   $sql .= "(id) ASC ".$limit;
                  break;
         //orden por titulo
         case "2":   $sql .= "(titulo) ASC ".$limit;
                  break;
         //orden por autor
         case "3":   $sql .= "(autor) ASC ".$limit;
                  break;
         //orden por editorial
         case "4":   $sql .= "(editorial) ASC ".$limit;
                  break;
      }
   }
   if($tabla == 'pedidos')
   {
      switch ($x)
      {
         //orden por id
         case "1":   $sql .= "(id_factura) ASC ".$limit;
                     break;
         //orden por id comprador
         case "2":   $sql .= "(id_comprador) ASC ".$limit;
                     break;
         //orden por autor
         case "3":   $sql .= "(precio) ASC ".$limit;
                     break;
         //orden por fecha de emision
         case "4":   $sql .= "(fecha_emision) DESC ".$limit;
                     break;
         //orden por valor del dolar a facturar
         case "4":   $sql .= "(dolar_factura) ASC ".$limit;
                     break;
      }
   }
   if($tabla == 'tips')
   {
      switch ($x)
      {
         //orden por id
         case "1":   $sql .= "(id) ASC ".$limit;
                  break;
         //orden por id comprador
         case "2":   $sql .= "(categoria) ASC ".$limit;
                  break;
      }
   }
}
else
{
   include ('index.php');
}
?>
