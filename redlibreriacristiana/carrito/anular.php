<?php session_start(); ?>
<script type="text/javascript" src="scripts/jquery-1.5.1.js"></script>
<?php
unset($_SESSION['carro']);
unset($_SESSION['total']);
?>
<script>
function carrito()
{
	$("#precio_carrito").html("$ 0");
}
</script>
<script type="text/javascript">
carrito();
alert("Se ha vaciado el carrito de compras");
</script>
<p align="center" id="carrito" class="texto2">No tiene ning&uacute;n &aacute;rticulo en el carrito</p>
