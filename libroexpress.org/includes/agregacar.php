<?php
session_start();
//error_reporting(E_ALL);
//@ini_set('display_errors', '1');
//con session_start() creamos la sesi&#243;n si no existe o la retomamos si ya ha sido creada
extract($_REQUEST);
//la funci&#243;n extract toma las claves de una matriz asoiativa y las convierte en nombres de variable,
//asign&#225;ndoles a esas variables valores iguales a los que ten&#237;a asociados en la matriz. Es decir, convierte a $_GET['id'] en $id,
//sin que tengamos que tomarnos el trabajo de escribir $id=$_GET['ID'];
include('../administracion/conexion.php');
conecta_bd("libroexpress");
//inclu&#237;mos la conexi&#243;n a nuestra base de datos
if(!isset($cantidad)){$cantidad=1;}
//Como tambi&#233;n vamos a usar este archivo para actualizar las cantidades,
//hacemos que cuando la misma no est&#233; indicada sea igual a 1
$qry=mysql_query("select * from libros where id='".$id."'");
//Si ya hemos introducido alg&#250;n producto en el carro lo tendremos guardado temporalmente
//en el array superglobal $_SESSION['carro'], de manera que rescatamos los valores de dicho array
//y se los asignamos a la variable $carro, previa comprobaci&#243;n con isset de que $_SESSION['carro']
//ya haya sido definida
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];
while ($row = mysql_fetch_object($qry))
{
   $titulo              = $row->titulo;
   $precio_dolares         = $row->precio_dolares;
   $en_promocion        = $row->en_promocion;
   $porcentaje_promocion   = $row->porcentaje_promocion;
   $articulo_promocion     = $row->articulo_promocion;
   if ($en_promocion == 'Si')
   {
      //determinamos el tipo de promocion
      if ($porcentaje_promocion != 0)
      {
         include('calcular_promocion.php');
         $precio_dolares = number_format($precio_pos_dolar, 2);
      }
      else
      {
         $titulo .= " + ".$articulo_promocion;
      }
   }
}
//Ahora introducimos el nuevo producto en la matriz $carro, utilizando como &#237;ndice el id del producto
//en cuesti&#243;n, encriptado con md5. Utilizamos md5 porque genera un valor alfanum&#233;rico que luego,
//cuando busquemos un producto en particular dentro de la matriz, no podr&#225; ser confundido con la posici&#243;n
//que ocupa dentro de dicha matriz, como podr&#237;a ocurrir si fuera s&#243;lo num&#233;rico.
//Cabe aclarar que si el producto ya hab&#237;a sido agregado antes, los nuevos valores que le asignemos reemplazar&#225;n
//a los viejos.
//Al mismo tiempo, y no porque sea estrictamente necesario sino a modo de ejemplo, guardamos m&#225;s de un valor
//en la variable $carro, vali&#233;ndonos de nuevo de la herramienta array.
$carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'titulo'=>$titulo,'precio_dolares'=>$precio_dolares,'id'=>$id);
//Ahora dentro de la sesi&#243;n ($_SESSION['carro']) tenemos s&#243;lo los valores que ten&#237;amos (si es que ten&#237;amos alguno) antes de ingresar
//a esta p&#225;gina y en la variable $carro tenemos esos mismos valores m&#225;s el que acabamos de sumar. De manera que
//tenemos que actualizar (reemplazar) la variable de sesi&#243;n por la variable $carro.
$_SESSION['carro']=$carro;
//Y volvemos a nuestro cat&#225;logo de art&#237;culos. La cadena SID representa al identificador de la sesi&#243;n, que, dependiendo
//de la configuraci&#243;n del servidor y de si el usuario tiene o no activadas las cookies puede no ser necesario pasarla por la url.
//Pero para que nuestro carro funcione, independientemente de esos factores, conviene escribirla siempre.
if($pagina == 'busqueda') header("Location:$pagina.php?".SID."texto_busqueda=$texto_busqueda&lugar_busqueda=$lugar_busqueda");
elseif($pagina == 'resultados_promos') echo "<script languaje='Javascript'>location.href='$pagina.php?".SID."tipo_promo=$tipo_promo&status=true'</script>";
else echo "<script languaje='Javascript'>location.href='$pagina.php?".SID."pag=$pag&cat_gral=$cat_gral&cat_esp=$cat_esp&status=true&titulo=$titulo'</script>";
?>
