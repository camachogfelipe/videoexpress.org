<?php
$url = explode("?", $_SERVER['REQUEST_URI']);
if(strpos($url[1], "ing=1") > 0) $url = $url[1];
elseif(strpos($url[1], "msj=") > 0) $url = substr($url[1],0,-5)."ing=1";
else $url = $url[1]."&ing=1";
?>
<script type="text/javascript" src="upload_files/LoadVars.js"><!--// http://www.devpro.it/javascript_id_92.html //--></script>
<script type="text/javascript" src="upload_files/BytesUploaded.js"><!--// http://www.devpro.it/javascript_id_96.html //--></script>
<script type="text/javascript">
	var bUploaded = new BytesUploaded('upload_files/whileuploading.php');
</script>
<form name="<?php echo $nombre_form ?>" method="post" action="<?php echo "?".$url ?>" enctype="multipart/form-data">
<?php
$msj = $_REQUEST['msj'];
if($msj == 1)
{
	if($_GET['inf'] == NULL and $_GET['f1'] == NULL and $_GET['f2'] == NULL) echo '<img src="imagenes/info.png" width="48" height="48" align="absmiddle" /><span id="info">Los datos se ingresaron con exito</span>';
	else
	{
		$f1 = $_GET['f1'];
		$f2 = $_GET['f2'];
		$opciones = "fecha_cancelada >= '".$f1."' and fecha_cancelada <= '".$f2."'";
		$reg_mostrar = 10;
		if(isset($_REQUEST['pag']))
		{
			$pag = $_REQUEST['pag'];
			$reg_empezar = ($pag - 1) * $reg_mostrar;
			$pag_actual = $pag;
		}
		else
		{
			$pag = 1;
			$reg_empezar = 0;
			$pag_actual = 1;
		}
		if($_GET['o'] == NULL) { $o1 = "id_factura"; $o2 = "ASC"; }
		else
		{
			$o = explode("/", $_GET['o']);
			$o1 = $o[0]; $o2 = $o[1];
		}
		paginacion("facturas", "re", "5;$o1;$o2;$opciones;$reg_empezar/$reg_mostrar", $reg_empezar, $pag);
		$total_valor = dato_columna("facturas", "SUM(precio)","1;;;$opciones;");
		echo '<p id="encabezado_tabla">El total de las facturas en este rango de fecha es de: $ '.number_format($total_valor)."</p>";
		echo '<a href="print.php?f1='.$f1.'&f2='.$f2.'" target="_new"><img src="imagenes/print.png" width="16" height="16" align="absmiddle" border="0" /> Imprimir informe</a>';
	}
}
elseif($msj == 2)
{
	if($form == "link") formlink($nombre_form);
	elseif($form == "archivo")
	{
		if($op_form == "aa_vyg") add_archivo_vyg($nombre_form);
		else add_archivo_pr($nombre_form);
	}
	elseif($form == "irf") irf($nombre_form);
	
	echo "<div id=\"error2\"><img src=\"imagenes/error.png\" width=\"48\" height=\"48\" align=\"absmiddle\" /> ";
	if($_GET['inf'] == NULL) echo "Alg&uacute;n campo est&aacute; vac&iacute;o";
	else echo "La fecha inicial es mayor a la fecha final";
	
	echo "</span></div>";
}
else
{
	if($form == "link") formlink($nombre_form);
	elseif($form == "archivo")
	{
		if($op == "pr") add_archivo_pr($nombre_form);
		elseif($op == "vyg") add_archivo_vyg($nombre_form);
		echo '<input name="action" type="hidden" value="upload" />';
	}
	elseif($form == "irf") irf($nombre_form);
}
?>
<div id="fileprogress"></div><pre><?php include("upload_files/test2.php") ?></pre>
</form>
<?php
function pinta_ingresar($nombre_form)
{
	?>
    	<a href="javascript:document.<?php echo $nombre_form ?>.submit(
		<?php if($nombre_form != "irf") { ?>bUploaded.start('fileprogress')<?php } ?>)" style="border:1px">
			<div id="btn">
				<img src="imagenes/aceptar.png" width="25" height="25" border="0" align="left" alt="ingresar">
				<div id="texto">Ingresar</div>
			</div>
		</a>
	<?php
}

function pinta_limpiar($nombre_form)
{
	?>
    	<a href="javascript:document.<?php echo $nombre_form ?>.reset()">
			<div id="btn">
				<img src="imagenes/limpiar.png" width="25" height="25" border="0" align="left" alt="ingresar">
				<div id="texto">Limpiar</div>
			</div>
		</a>
	<?php
}

function formlink($nombre_form)
{
	?>
		<table width="60%" border="0" cellspacing="2" cellpadding="0">
		  <tr>
		    <td width="30%">Nombre</td>
		    <td width="30%"><input name="name_link" type="text" id="name_link" size="40" /></td>
            <td rowspan="3" width="60" align="center" valign="middle">
            	<?php
					if($nombre_form == "vyglink") $img = "index_r1_c4.png";
					elseif($nombre_form == "mealink") $img = "index_r2_c3.png";
                ?>
            	<img src="../portafolio/imagenes/<?php echo $img; ?>" width="150" height="120" />
            </td>
		  </tr>
		  <tr>
		    <td>Link http://www.</td>
		    <td><input name="dir_link" type="text" id="dir_link" size="40" /></td>
		  </tr>
		  <tr>
		    <td align="right"><?php pinta_ingresar($nombre_form); ?></td>
		    <td align="left"><?php pinta_limpiar($nombre_form); ?></td>
		  </tr>
		</table>
    <?php
}

function add_archivo_vyg($nombre_form)
{
	?>
    	<table width="55%" border="0" cellspacing="2" cellpadding="0">
	      <tr>
    	    <td width="50%">T&iacute;tulo</td>
        	<td><input name="titulo_vyg" type="text" id="titulo_vyg" size="40" /></td>
	      </tr>
          <tr>
    	    <td width="50%">Tema</td>
        	<td><input name="tema_vyg" type="text" id="tema_vyg" size="40" /></td>
	      </tr>
          <tr>
    	    <td width="50%">Auditorio</td>
        	<td><input name="auditorio_vyg" type="text" id="auditorio_vyg" size="40" /></td>
	      </tr>
    	  <tr>
        	<td>Archivo (.swf o .flv)</td>
	        <td><input type="file" name="archivo_vyg" id="archivo_vyg" /></td>
    	  </tr>
	      <tr>
    	    <td>Valor por 100 unidades</td>
        	<td><input name="vx100_vyg" type="text" id="vx100_vyg" size="20" /></td>
	      </tr>
    	  <tr>
        	<td>Valor por 500 unidades</td>
	        <td><input name="vx500_vyg" type="text" id="vx500_vyg" size="20" /></td>
    	  </tr>
	      <tr>
    	    <td>Valor por 1000 unidades</td>
        	<td><input name="vx1000_vyg" type="text" id="vx1000_vyg" size="20" /></td>
	      </tr>
    	  <tr>
        	<td>Valor por 2000 o m&aacute;s unidades</td>
	        <td><input name="vx2000_vyg" type="text" id="vx2000_vyg" size="20" /></td>
    	  </tr>
	      <tr>
    	    <td valign="top">Descripci&oacute;n</td>
        	<td><textarea name="descripcion_vyg" cols="39" rows="5" id="descripcion_vyg"></textarea></td>
	      </tr>
    	  <tr>
        	<td align="right"><?php pinta_ingresar($nombre_form); ?></td>
		    <td align="left"><?php pinta_limpiar($nombre_form); ?></td>
    	  </tr>
	    </table>
    <?php
}

function add_archivo_pr($nombre_form)
{
	?>
    	<table width="55%" border="0" cellspacing="2" cellpadding="0">
	      <tr>
    	    <td width="50%">T&iacute;tulo</td>
        	<td><input name="titulo_pr" type="text" id="titulo_pr" size="40" /></td>
	      </tr>
    	  <tr>
        	<td>Archivo (.mp3, .wma)</td>
	        <td><input type="file" name="archivo_pr" id="archivo_pr" /></td>
    	  </tr>
	      <tr>
    	    <td>Imagen (.jpg, .jpeg, .png)</td>
        	<td><input type="file" name="imagen_pr" id="imagen_pr" /></td>
	      </tr>
	      <tr>
    	    <td valign="top">Autores</td>
        	<td><textarea name="descripcion_pr" cols="39" rows="5" id="descripcion_pr"></textarea></td>
	      </tr>
    	  <tr>
        	<td align="right"><?php pinta_ingresar($nombre_form); ?></td>
		    <td align="left"><?php pinta_limpiar($nombre_form); ?></td>
    	  </tr>
	    </table>
    <?php
}

function irf($nombre_form)
{
	?>
    	<table width="55%" border="0" cellspacing="2" cellpadding="0">
	      <tr>
    	    <td width="40%">Fecha inicio</td>
        	<td><label for="dia1">D&iacute;a </label><select name="dia1" id="dia1">
              <?php
			    for($i=1; $i<=31; $i++)
				{
					if($i > 0 and $i < 10) echo '<option value="0'.$i.'">'.$i.'</option>';
					else echo '<option value="'.$i.'">'.$i.'</option>';
					echo "\n";
				}
			  ?>
      	      </select>
              <label for="mes1">mes </label><select name="mes1" id="mes1">
              <?php
			    $mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			    for($i=1; $i<=12; $i++)
				{
					if($i > 0 and $i < 10) echo '<option value="0'.$i.'">'.$mes[$i].'</option>';
					else echo '<option value="'.$i.'">'.$mes[$i].'</option>';
					echo "\n";
				}
			  ?>
      	      </select>
              <label for="anio1">A&ntilde;o </label><select name="anio1" id="anio1">
              <?php
			    $anio_ac = date("Y");
			    for($i=2009; $i<=$anio_ac; $i++) { echo '<option value="'.$i.'">'.$i.'</option>'; echo "\n"; }
			  ?>
      	      </select>
            </td>
	      </tr>
    	  <tr>
        	<td>Fecha final</td>
	        <td><label for="dia2">D&iacute;a </label><select name="dia2" id="dia2">
              <?php
			    $d = date(j);
			    for($i=1; $i<=31; $i++)
				{
					if($i > 0 and $i < 10) echo '<option value="0'.$i.'" ';
					else echo '<option value="'.$i.'" ';
					if($i == $d) echo 'selected="selected"';
					echo '>'.$i.'</option>';
					echo "\n";
				}
			  ?>
      	      </select>
              <label for="mes2">mes </label><select name="mes2" id="mes2">
              <?php
			    $mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
				$m = date(n);
			    for($i=1; $i<=12; $i++)
				{
					if($i > 0 and $i < 10) echo '<option value="0'.$i.'" ';
					else echo '<option value="'.$i.'" ';
					if($i == $m) echo 'selected="selected"';
					echo '>'.$mes[$i].'</option>';
					echo "\n";
				}
			  ?>
      	      </select>
              <label for="anio2">A&ntilde;o </label><select name="anio2" id="anio2">
              <?php
			    $anio_ac = date(Y);
			    for($i=2009; $i<=$anio_ac; $i++)
				{
					echo '<option value="'.$i.'" ';
					if($i == $anio_ac) echo 'selected="selected"';
					echo '>'.$i.'</option>';
					echo "\n";
				}
			  ?>
      	      </select>
            </td>
    	  </tr>
    	  <tr>
        	<td align="right"><?php pinta_ingresar($nombre_form); ?></td>
		    <td align="left"><?php pinta_limpiar($nombre_form); ?></td>
    	  </tr>
	    </table>
    <?php
}
?>
