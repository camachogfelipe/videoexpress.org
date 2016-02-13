<?php
session_start();
include("../include/funciones_generales.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<b><k>Como afiliarse:</k>
</b> Diligenciar el formulario dando clic en el v&iacute;nculo de abajo que dice "Me deseo afiliar", y diligenciarlo con los datos que se solicitan:
				<ul><li>Nombres y apellidos</li>
				<li>Barrio</li>
				<li>Tel&#233;fonos de casa y/o oficina.</li>
				<li>Direcci&#243;n de entrega y recogida (inicialmente en Bogot&#225; &#8211; Colombia).</li>
				<li>E-mail.</li>
				</ul>
				<p>Una vez suministrados los datos, lo llamaremos para confirmarle la aprobaci&#243;n de afiliaci&#243;n,
				 fecha y lugar de entrega, all&#237; le enviaremos cuatro (4) pel&#237;culas de su elecci&#243;n y factura de afiliaci&#243;n
				  con un valor &#250;nico de $ "<?php mostrar_val_sesiones("afi"); ?>", que se paga en su domicilio al momento de la entrega.</p>
				<ul>
				<li>Para poder alquilar pel&#237;culas es necesario estar afiliado.</li>
                <li>Cuando vaya a alquilar, su pedido debe ser de dos (2) pel&iacute;culas como m&iacute;nimo.</li>
				<li>El valor de alquiler por unidad es de $ "<?php mostrar_val_sesiones("alq"); ?>" pesos.</li>
				<li>Las entregas y recogidas son siempre a domicilio en cualquier lugar de la cuidad.</li>
				<li>Las pel&#237;culas son originales.</li>
				<li>El tiempo del que dispone para verlas es de tres (3) d&#237;as.</li>
				<li>Si en el cat&aacute;logo no esta lo que busca, puede solicitarla (luego de analizarla)  con gusto la compraremos para que usted la <b>estrene</b>.</li>
                </ul>
</body>
</html>