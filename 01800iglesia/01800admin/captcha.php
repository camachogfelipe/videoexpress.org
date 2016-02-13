<?php
session_start();
// Indicamos el tamaño de nuestro captcha, puede ser aleatorio para mayor seguridad
$captchaTextSize = 7;
do {
	// Generamos un string aleatorio y lo encriptamos con md5
	$md5Hash = md5( microtime( ) * time( ) );
	// Eliminamos cualquier caracter extraño
	preg_replace( '([1aeilou0])', "", $md5Hash );
} while( strlen( $md5Hash ) < $captchaTextSize );
// necesitamos sólo 7 caracteres para este captcha
$key = mb_substr($md5Hash, 0, $captchaTextSize, "UTF-8");
// Guardamos la clave en la variable de sesión. La clave esta encriptada.
$_SESSION['key'] = md5( $key );

$imageNum = mt_rand(0, 5);
$urlImage = "images/captcha".$imageNum.".png";

$captchaImage = imagecreatefrompng( $urlImage );
/*
Seleccionamos un color de texto. Cómo nuestro fondo es un verde agua, escogeremos un cólor verde para el texto. El color del texto es, preferentemente, el mismo que el del background, aunque un poco más oscuro para poder distnguirlo.
*/
$textColor = imagecolorallocate( $captchaImage, 31, 118, 92 );
/*
Seleccionamos un color para las líneas que queremos se dibujen en nuestro captcha. En este caso usaremos una mezcla entre verde y azul
*/
$lineColor = imagecolorallocate( $captchaImage, 15, 103, 103 );

// recuperamos el parametro tamaño de imagen
$imageInfo = getimagesize( $urlImage );
// decidimos cuantas líneas queremos dibujar
$linesToDraw = 10;
// Añadimos las líneas de manera aleatoria
for( $i = 0; $i < $linesToDraw; $i++ ) {
	// utilizamos la función mt_rand()
	$xStart = mt_rand( 0, $imageInfo[ 0 ] );
	$xEnd = mt_rand( 0, $imageInfo[ 0 ] );
	// Dibujamos la linea en el captcha
	imageline( $captchaImage, $xStart, 0, $xEnd, $imageInfo[1], $lineColor );
}

/*
Escribimos nuestro string aleatoriamente, utilizando una fuente true type. En este caso, estamos utilizando BitStream Vera Sans Bold, pero podemos utilizar cualquier otra.
*/
imagettftext( $captchaImage, 20, 0, 35, 35, $textColor, "fonts/VeraBd.ttf", $key );

header('Content-type: image/png');
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Fri, 19 Jan 1994 05:00:00 GMT"); 
header("Pragma: no-cache");
imagepng($captchaImage);
?>