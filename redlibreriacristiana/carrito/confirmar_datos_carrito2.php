<?php session_start(); ?>
<script type="text/javascript" src="scripts/jquery-1.5.1.js"></script>
<script>
function carrito(x)
{
	$("#precio_carrito").html("$ "+x);
}
</script>
<?php
$carro = $_SESSION['carro'];
$continuar = $_GET['continuar'];
$mensaje = NULL;

if($carro == NULL)
{
   echo "<center><span id=\"obligatorio\">No has ingresado nada al carrito</span></center><br />";
}

$fecha = date("Y-m-j H:i:s");

if ($continuar == 'true' and $carro != NULL)
{
   include('../administracion/funciones.php');
   conecta_bd("redlibr_redlibreria");

   $cedula = $_POST['cedula'];
   $nombres = $_POST['nombres'];
   $apellidos  = $_POST['apellidos'];
   $direccion  = $_POST['dir'];
   $telefono   = $_POST['tel'];
   $celular = $_POST['cel'];
   $email      = $_POST['email'];
   $ciudad     = $_POST['ciudad'];
   $pais    = $_POST['pais'];
   $notired = $_POST['notired'];

   $query = mysql_query("SELECT cedula FROM clientes WHERE cedula = '$cedula'");

   while($row=mysql_fetch_object($query))
   {
      //Mostramos los titulos de los articulos o lo que deseemos...
      $cedula2 = $row->cedula;
   }
   if ($cedula2 != NULL)
   {
      $query = "UPDATE clientes SET ";
      $query .= "nombre = '$nombres', ";
      $query .= "apellidos = '$apellidos', ";
      $query .= "direccion = '$direccion', ";
      $query .= "telefono = '$telefono', ";
      $query .= "celular = '$celular', ";
      $query .= "correo = '$email', ";
      $query .= "ciudad = '$ciudad', ";
      $query .= "pais = '$pais', ";
	  $query .= "notired = '$notired' ";
      $query .= "WHERE cedula='$cedula'";
      mysql_query($query) or die(mysql_error());
   }
   else
   {
      //Todo parece correcto procedemos con la inserccion
         $query = "INSERT INTO clientes (";
         $query .= "cedula, nombre, apellidos, direccion, telefono, celular, correo, ciudad, pais, notired";
         $query .= ") VALUES (";
         $query .= "'$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$celular', '$email', '$ciudad', '$pais', '$notired')";
         mysql_query($query) or die(mysql_error());
   }

   $articulos = $cantidades = $precios_unitarios = "";
   $precio = 0;
   foreach($carro as $k => $v)
   {
      $articulos .= $v['titulo']."+";
      $cantidades .= $v['cantidad']."+";
      $precios_unitarios .= $v['precio_oficial']."+";
      $subto=$v['cantidad']*$v['precio_oficial'];
      $precio=$precio+$subto;
   }

   $query = "INSERT INTO pedidos (";
   $query .= "id_factura, id_comprador, articulos, cantidades, precios_unitarios, total, fecha_emision";
   $query .= ") VALUES (";
   $query .= "'$id_factura', '$cedula', '$articulos', '$cantidades', '$precios_unitarios', '$precio', '$fecha')";
   mysql_query($query) or die(mysql_error());

   unset($_SESSION['carro']);
   unset($_SESSION['total']);

   $id_ingresado = $cedula;
   include('mail.php');

   $mensaje = "<span class='detalle' style='font-size: 20px; text-align: justify'><p>Forma de pago:</p>";
   $mensaje .= "Proximamente PagosOnline<br />Actualmente consignar en:";
   $mensaje .= "<br /><br />Banco BCSC Colmena<br />Cuenta de ahorros No. 26507189970<br />A nombre de Asociaci&oacute;n Ministerios RED de Edificaci&oacute;n<br />Nit. 900.266.873-1";
   echo $mensaje .= "<br /><br /><img src=\"images/Imagenes de edicion/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> Gracias, la operaci&oacute;n se ha realizado con &eacute;xito<br />Favor verificar el e-mail ingresado</span>";
   echo '<script type="text/javascript">carrito("0");</script>';
}
?>