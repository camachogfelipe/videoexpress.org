<?php
session_start();
if (isset($_SESSION['user_admin']))
{
	echo "<link href=\"../../estilo.css\" rel=\"stylesheet\" type=\"text/css\" /><span style=\"color:#000\">";
	$id = $_REQUEST['id'];
	$pertenece_a = "videx";
	$afiliacion = $_REQUEST['afiliacion'];
	$anular = $_REQUEST['anular'];
	$anular2 = $_REQUEST['anular2'];
	
	if($id != NULL)
	{
		if($anular != NULL and $anular2 == NULL)
		{
			echo "<center>";
			echo "<div style=\"witdh:500px; border: 1px dotted #09C; padding: 5px\">";
			echo "<span style='color:#000'>&iquest;Est&aacute; seguro de querer eliminar el pedido No. $id?</span><br>";
			echo "<br /><span id='menu_admon2' style='border: 1px solid #09C; padding: 2px; background-color: #EFF'>";
			echo "<a href=\"cancelar_factura.php?id=$id&anular=$anular&anular2=s\">Aceptar</a></span>&nbsp;";
			echo "<span id='menu_admon2' style='border: 1px solid #09C; padding: 2px; background-color: #EFF'>";
			echo "<a href=\"javascript:history.go(-1)\">Cancelar</a></span><br />";
			echo "</div>";
			echo "</center>";
		}
		else
		{
			if($anular == 'pedido' and $anular2 == 's')
			{
				include('../../include/funciones_globales.php');
				$query = del_datos_tabla("pedidos","id_factura='$id'");
				
				echo "<span style='color:#000'>El pedido No. $id ha sido anulado con exito</span>";
			}
			elseif($anular == 'factura' and $anular2 == 's')
			{
				include('../../include/funciones_globales.php');
				$conecta = conecta_bd("videoexpress");
				$id_comprador = dato_columna("facturas","id_comprador","1;;;id_factura='$id';");
				$saldo_cliente = dato_columna("usuarios","saldo","1;;;codigo_cliente='$id_comprador';");
				$saldo_factura = dato_columna("facturas","precio","1;;;id_factura='$id';");
				$saldo = $saldo_cliente + $saldo_factura;
				$query = act_datos_tabla("usuarios","saldo='$saldo'","codigo_cliente='$id_comprador'",1);
				$query = del_datos_tabla("facturas","id_factura='$id'");
				$query = del_datos_tabla("dolar_fac_libro","id_factura='$id'");
				$query = del_datos_tabla("info_fac_videx","id_factura='$id'");
				$query = del_datos_tabla("info_peliculas","id_factura='$id'");
				
				echo "<br /><span style='color:#000'>La factura No. $id ha sido anulada con exito, el cliente No. $id_comprador tiene un saldo a favor de $ $saldo</span>";
			}
			else
			{
				include('../../include/funciones_globales.php');
				$conecta = conecta_bd("libroexpress");
				$query = mysql_query("SELECT factura_del, factura_al, resolucion_dian, fecha_res_dian, factura_actual FROM datos");
				while($row=mysql_fetch_object($query))
				{
					//Mostramos los titulos de los articulos o lo que deseemos...
					$factura_del = $row->factura_del;
					$factura_al = $row->factura_al;
					$resolucion_dian = $row->resolucion_dian;
					$fecha_res_dian = $row->fecha_res_dian;
				}

				$dian = "$factura_del-$factura_al@$resolucion_dian@$fecha_res_dian@";
			
				$conecta = conecta_bd("videoexpress");
				
				if($afiliacion == 'si') $recompra = "no";
				else $recompra = "si";

				$result = consulta_bd("pedidos","*","1;;;id_factura='$id'");
				while ($row = mysql_fetch_object($result))
				{
					$id_comprador = $row->id_comprador;
					$tipo = $row->tipo;
					$articulos = $row->articulos;
					$cantidades = $row->cantidades;
					$precios_unitarios = $row->precios_unitarios;
					$precio = $row->precio;
					$fecha_emision = $row->fecha_emision;
					$id_peliculas = $row->id_peliculas;
				}

				$tipo1 = explode('+',$tipo);
				$sizeof = sizeof($tipo1);
				$sizeof--;
				$ta = 0;
				for ($i=0; $i<$sizeof; $i++)
				{
					if($tipo1[$i] == "alquiler") $ta += 1;
				}

				if($ta == 0) { $devueltas = "si"; }
				elseif($ta >= 1) $devueltas = "no";

				$dia	= date(j);
				$mes	= date(m);
				$anio	= date(Y);
				$hora	= date("H:i:s");
				
				//verificamos que sea la primera factura del año
				$max_anio = dato_columna("facturas", "MAX(fecha_cancelada_anio)", "-1;;;;;");
				if($max_anio < $anio)
				{
					include("../reportes/funciones_reportes.php");
					ingresos_y_capital();
					$dia = date(d); $mes = date(m);
					act_datos_tabla("ingresos_y_capital","anio_$anio='$dia-$mes-$anio'","id='3'",1);
				}

				$columna = "id_comprador, tipo, articulos, cantidades, precios_unitarios, precio, fecha_emision, ";
				$columna .= "fecha_cancelada_dia, fecha_cancelada_mes, fecha_cancelada_anio, fecha_cancelada_hora, fecha_cancelada,";
				$columna .= " dian, Pertenece_a";
				$valores = "'$id_comprador', '$tipo', '$articulos', '$cantidades', '$precios_unitarios', '$precio', ";
				$valores .= "'$fecha_emision',  '$dia', '$mes', '$anio', '$hora', '$anio-$mes-$dia', '$dian', '$pertenece_a'";
				$query = ing_datos_tabla("facturas",$columna,$valores);
				
				$ult_factura = dato_columna("facturas", "MAX(id_factura)", "-1;;;;;");
				
				$anio = date(Y);
				$columna = "id_factura, devueltas, recompra, id_peliculas, anio";
				$valores = "'$ult_factura', '$devueltas', '$recompra', '$id_peliculas', '$anio'";
				$query = ing_datos_tabla("info_fac_videx", $columa, $valores);
				$query = del_datos_tabla("pedidos","id_factura=$id");
				//guardamos el valor aumentado en uno de las veces que se ha alquilado la pelicula
				$id_peliculas = explode("@", $id_peliculas);
				$sizeof = sizeof($id_peliculas);
				$sizeof--;

				for($a=0; $a<$sizeof; $a++)
				{
					$result = consulta_bd("catalogo","alquilada","1;;;id='$id_peliculas[$a]'");
					while ($row = mysql_fetch_object($result))
					{
						$alquilada = $row->alquilada;
					}
					$alquilada += 1;
					$query = act_datos_tabla("catalogo","alquilada='$alquilada'","id='$id_peliculas[$a]'",1);
				}

				echo "<img src=\"../../Imagenes_pagina/informacion.png\" width=\"25\" height=\"25\" align=\"absmiddle\" /> <span id=\"informacion_gral\"> <span style='color:#000'>El pedido No. $id, ha sido facturado con exito</span>";
			}
		}
	}
}
else
{
	include ('index.php');
}
?>
