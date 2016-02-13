<?php 
session_start();
//error_reporting(E_ALL);
//@ini_set('display_errors', '1');
//con session_start() creamos la sesión si no existe o la retomamos si ya ha sido creada
extract($_REQUEST);
include("../include/funciones_globales.php");
$conecta = conecta_bd("videoexpress");

$valor_alquiler = $_SESSION['alquiler'];

if (isset($_SESSION['usuario_afiliado']) and $_SESSION['activo'] == 'si')
{
	if ($tipo_pedido == 'alquiler')
	{
		if ($_SESSION['pel_alq'] >= 0 && $_SESSION['pel_alq'] <= 3) $_SESSION['pel_alq']++;
		else $tipo_pedido = "compra";
	}
	if ($tipo_pedido == 'resena')
	{
		if ($_SESSION['res'] >= 0 && $_SESSION['res'] <= 3) $_SESSION['res']++;
	}
}
else
{
	if ($tipo_pedido == 'resena')
	{
		if ($_SESSION['res'] >= 0 && $_SESSION['res'] <= 3) $_SESSION['res']++;
	}
	
}
//la función extract toma las claves de una matriz asoiativa y las convierte en nombres de variable,
//asignándoles a esas variables valores iguales a los que tenía asociados en la matriz. Es decir, convierte a $_GET['id'] en $id,
//sin que tengamos que tomarnos el trabajo de escribir $id=$_GET['ID']; 
//incluímos la conexión a nuestra base de datos
if(!isset($cantidad) || $cantidad <= 0){$cantidad=1;}
//Como también vamos a usar este archivo para actualizar las cantidades,
//hacemos que cuando la misma no esté indicada sea igual a 1
$qry=mysql_query("select * from catalogo where id='".$id."'");
$row=mysql_fetch_array($qry);
//Si ya hemos introducido algún producto en el carro lo tendremos guardado temporalmente
//en el array superglobal $_SESSION['carro'], de manera que rescatamos los valores de dicho array
//y se los asignamos a la variable $carro, previa comprobación con isset de que $_SESSION['carro']
//ya haya sido definida
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];
if ($tipo_pedido == 'resena')
{
	$row['precio_compra'] = 0;
}
//Ahora introducimos el nuevo producto en la matriz $carro, utilizando como índice el id del producto
//en cuestión, encriptado con md5. Utilizamos md5 porque genera un valor alfanumérico que luego,
//cuando busquemos un producto en particular dentro de la matriz, no podrá ser confundido con la posición
//que ocupa dentro de dicha matriz, como podría ocurrir si fuera sólo numérico.
//Cabe aclarar que si el producto ya había sido agregado antes, los nuevos valores que le asignemos reemplazarán
//a los viejos. 
//Al mismo tiempo, y no porque sea estrictamente necesario sino a modo de ejemplo, guardamos más de un valor 
//en la variable $carro, valiéndonos de nuevo de la herramienta array.
$carro[$id]=array('identificador'=>$id,'cantidad'=>$cantidad,'producto'=>$row['titulo'],'precio_compra'=>$row['precio_compra'],'id'=>$id,'tipo_pedido'=>$tipo_pedido);
//Ahora dentro de la sesión ($_SESSION['carro']) tenemos sólo los valores que teníamos (si es que teníamos alguno) antes de ingresar
//a esta página y en la variable $carro tenemos esos mismos valores más el que acabamos de sumar. De manera que 
//tenemos que actualizar (reemplazar) la variable de sesión por la variable $carro.
$_SESSION['carro']=$carro;

if (isset($_SESSION['usuario_afiliado']) and $_SESSION['activo'] == 'si')
{
	$contador=0;
	$suma=0;
	$subto_compra = $subto_alquiler = $suma = $ta = $tc = 0;
	foreach($carro as $k => $v)
	{
		$id = $v['id'];
		if ($v['tipo_pedido'] == 'compra'){ $subto = $v['cantidad'] * $v['precio_compra']; $subto_compra += $subto; $tc += 1; }
		if ($v['tipo_pedido'] == 'alquiler') { $subto_alquiler += $valor_alquiler; $ta += 1; }
		if ($ta == 3) $subto_alquiler = 20000;
		if ($ta == 4) $subto_alquiler = 24000;
		$suma=$subto_alquiler+$subto_compra;
		$contador++;
	}
	if ($ta >= 0 && $ta <= 4) $_SESSION['pel_alq'] = $ta;
	$_SESSION['suma'] = $suma;
	$_SESSION['tot_pel'] = $contador;
}
//Y volvemos a nuestro catálogo de artículos. La cadena SID representa al identificador de la sesión, que, dependiendo 
//de la configuración del servidor y de si el usuario tiene o no activadas las cookies puede no ser necesario pasarla por la url.
//Pero para que nuestro carro funcione, independientemente de esos factores, conviene escribirla siempre.
echo '<script languaje="Javascript">history.go(-1)</script>';
?>