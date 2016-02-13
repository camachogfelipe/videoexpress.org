<?php
session_start();
if (isset($_SESSION['fsluser']))
{
	include("funciones.php");
	$op = $_REQUEST['op'];
	$subseccion = $_REQUEST['s'];
	$es = $_REQUEST['es'];
	$id = $_REQUEST['id'];
	if($id != NULL and $s != "crear")
	{
		$conecta = conecta_bd();
		$consulta = consulta_bd("proyectos", "*", "1;;;id_proyecto='$id';");
		while($filas = mysql_fetch_object($consulta))
		{
			$monte = $filas->monte;
			$nombre = $filas->nombre;
			$fecha_inicio = explode("-", $filas->fecha_inicio);
			$fecha_final = explode("-", $filas->fecha_final);
			$ultima_actividad = $filas->ultima_actividad;
			$donde = $filas->donde;
			$participantes = $filas->quienes;
			$personas = $filas->personas_impactadas;
			$fotos = $filas->fotos;
			$logo_proyecto = $filas->logo_proyecto;
			$descripcion = $filas->descripcion;
			$video = $filas->video;
			$inversion_pesos = $filas->inversion_pesos;
			$inversion_dolares = $filas->inversion_dolares;
		}
	}
?>
		<script language="javascript" src="../scripts/jquery.validate.js"></script>
        <script language="javascript" src="../scripts/jquery.validate.additional-methods.js"></script>
        <script type="text/javascript" src="../scripts/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
		<script type="text/javascript" src="../scripts/editor_texto.js"></script>
        <script language="javascript">
			$('#formulario_proyecto').submit(function()
			{
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						$("#formulario_proyecto").hide();
						var result = $('#enviado').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		</script>
		<form action="procesar_proyecto.php?<?php echo "e=1" ?>" method="post" id="formulario_proyecto" name="formulario_proyecto">
        	<input type="hidden" id="op" name="op" value="<?php echo $op ?>" />
        	<input type="hidden" id="s" name="s" value="<?php echo $subseccion ?>" />
            <input type="hidden" id="es" name="es" value="<?php echo $es ?>" />
            <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />
	        <table width="100%" border="0" cellspacing="2" cellpadding="3">
			  <tr>
			    <td width="40%"><label for="monte">Tipo de monta&ntilde;a:</label></td>
			    <td>
                	<select id="monte" name="monte">
		    			<option value="">Seleccione el tipo de monta&ntilde;a</option>
				        <option value="aye" <?php if($monte=='aye') echo 'selected="selected"' ?>>Arte y Entretenimiento</option>
        				<option value="eyn" <?php if($monte=='eyn') echo 'selected="selected"' ?>>Econom&iacute;a y negocios</option>
				        <option value="educacion" <?php if($monte=='educacion') echo 'selected="selected"' ?>>Educaci&oacute;n</option>
        				<option value="familia" <?php if($monte=='familia') echo 'selected="selected"' ?>>Familia</option>
				        <option value="gcye" <?php if($monte=='gcye') echo 'selected="selected"' ?>>Gobierno civil y Estado</option>
        				<option value="iglesia" <?php if($monte=='iglesia') echo 'selected="selected"' ?>>Iglesia</option>
		        		<option value="mdc" <?php if($monte=='mdc') echo 'selected="selected"' ?>>Medios de comunicaci&oacute;n</option>
					</select>
                </td>
			  </tr>
			  <tr>
			    <td><label for="nombre">Nombre del proyecto: </label></td>
			    <td><input name="nombre" type="text" id="nombre" value="<?php echo $nombre ?>" size="50" /></td>
			  </tr>
			  <tr>
			    <td>Fecha de inicio:</td>
			    <td>
		            <select id="anio1" name="anio1">
    					<option value="">Seleccione el a&ntilde;o</option>
						<?php
							$anio = date(Y);
							for($i=$anio; $i<=$anio+1; $i++)
							{
								echo '<option value="'.$i.'"';
								if($fecha_inicio[0]==$i) echo ' selected="selected"';
								echo '>'.$i.'</option>';
							}
						?>
					</select>
        		    <select id="mes1" name="mes1">
    					<option value="">Seleccione el mes</option>
						<?php
							$mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
							for($i=1; $i<=12; $i++)
							{
								echo '<option value="'.$i.'"';
								if($fecha_inicio[1]==$i) echo ' selected="selected"';
								echo '>'.$mes[$i].'</option>';
							}
						?>
					</select>
        		    <select id="dia1" name="dia1">
    					<option value="">Seleccione el d&iacute;a</option>
						<?php
							for($i=1; $i<=31; $i++)
							{
								echo '<option value="'.$i.'"';
								if($fecha_inicio[2]==$i) echo ' selected="selected"';
								echo '>'.$i.'</option>';
							}
						?>
					</select>
                </td>
			  </tr>
			  <tr>
			    <td>Fecha de terminaci&oacute;n:</td>
			    <td>
        		    <select id="anio2" name="anio2">
		    			<option value="">Seleccione el a&ntilde;o</option>
						<?php
							$anio = date(Y);
							for($i=$anio; $i<=$anio+10; $i++)
							{
								echo '<option value="'.$i.'"';
								if($fecha_final[0]==$i) echo ' selected="selected"';
								echo '>'.$i.'</option>';
							}
						?>
					</select>
        		    <select id="mes2" name="mes2">
		    			<option value="">Seleccione el mes</option>
						<?php
							$mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
							for($i=1; $i<=12; $i++)
							{
								echo '<option value="'.$i.'"';
								if($fecha_final[1]==$i) echo ' selected="selected"';
								echo '>'.$mes[$i].'</option>';
							}
						?>
					</select>
		            <select id="dia2" name="dia2">
    					<option value="">Seleccione el d&iacute;a</option>
						<?php
							for($i=1; $i<=31; $i++)
							{
								echo '<option value="'.$i.'"';
								if($fecha_final[2]==$i) echo ' selected="selected"';
								echo '>'.$i.'</option>';
							}
						?>
					</select>
                </td>
			  </tr>
			  <tr>
			    <td><label for="donde">Lugar de trabajo del proyecto: </label></td>
		    	<td><input name="donde" type="text" id="donde" value="<?php echo $donde ?>" size="50" /></td>
			  </tr>
			  <tr>
			    <td><label for="participantes">Participantes: (Separe por comas cada participante) </label></td>
		    	<td><input name="participantes" type="text" id="participantes" value="<?php echo $participantes ?>" size="50" /></td>
			  </tr>
			  <tr>
			    <td><label for="personas">Personas a impactar o impactadas: </label></td>
		    	<td><input name="personas" type="text" id="personas" value="<?php echo $personas ?>" size="50" /></td>
			  </tr>
			  <tr>
			    <td><label for="inversion_pesos">Inversi&oacute;n en pesos: </label></td>
			    <td><input name="inversion_pesos" type="text" id="inversion_pesos" value="<?php echo $inversion_pesos ?>" size="50" /></td>
			  </tr>
			  <tr>
			    <td><label for="inversion_dolares">Inversi&oacute;n en dolares: </label></td>
			    <td><input name="inversion_dolares" type="text" id="inversion_dolares" value="<?php echo $inversion_dolares ?>" size="50" /></td>
			  </tr>
			</table>
    	    <div>
				<div><label for="ultima_actividad">&Uacute;ltima actividad: </label></div>
				<div>
                	<textarea id="ultima_actividad" name="ultima_actividad" class="tinymce" style="width:100%; min-height:300px"><?php echo $ultima_actividad ?></textarea>
				</div>
			</div>
            <div>
				<div><label for="descripcion">Descripci&oacute;n: </label></div>
				<div>
                	<textarea id="descripcion" name="descripcion" class="tinymce" style="width:100%; min-height:300px"><?php echo $descripcion ?></textarea>
				</div>
			</div>
            <button type="hidden" id="submit" name="submit">
            	<img src="../imagenes/boton_enviar_off.png" width="24" height="24" /> Enviar
			</button>
		</form>
        <div id="enviado"></div>
<?php
}
else header("Location: ../");
?>