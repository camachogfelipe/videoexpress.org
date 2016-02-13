<link href="../Scripts/jquery-ui/css/smoothness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery-ui/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript" src="../Scripts/jquery.form.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<script src="../Scripts/estadistica.js"></script>

<div class="estadisticas"><?php
if(isset($this->mensaje)) :
	$this->mensaje->mostrar_mensaje();
else :
?>
<p>Total estadisticas: <?php echo $this->total_estadisticas; ?></p>
<table width="100%" border="0" cellpadding="2" cellspacing="3" id="vli_table">
  <thead>
    <th width="15%">Tipo lugar</th>
    <th width="18%">Lugar</th>
    <th>Datos</th>
    <th width="10%">Fecha</th>
    <th width="18%">Acciones</th>
  </thead>
  <tbody>
  	<?php foreach($this->resultados as $estadistica) : ?>
    <tr valign="top">
      <td align="center"><?php
	  switch($estadistica['tabla_campo']) :
	  	case 'continentes'	: echo "Continente"; break;
		case 'paises'		: echo "País"; break;
		case 'regiones'		: echo "Departamento / Estado"; break;
		case 'localidades'	: echo "Ciudad / Municipio"; break;
	  endswitch;
      ?></td>
      <td align="center"><?php
	  	$this->bd->datos("nombre");
		$this->bd->tabla($estadistica['tabla_campo']);
		$this->bd->opciones("WHERE id='".$estadistica['id_campo']."'");
		echo $estadistica['id_campo'] = $this->bd->dato_unico();
	  ?></td>
      <td><?= nl2br($estadistica['datos']) ?></td>
      <td><?= $estadistica['fecha'] ?></td>
      <td align="center"><a href="#editarEstadistica" title="Editar estadística" onclick="recargar('index3','op=56&id=<?php
	    echo $estadistica['id'] ?>&pag=<?= $this->pag ?>','#panel_derecho_menu')">
          <img src="../imagenes/iconos_admin/icono_admin-palabra_edit.png" width="37" height="37" border="0" title="Editar" />
        </a>&nbsp;&nbsp;
        <a href="#eliminarEstadistica" title="Eliminar estadística" onclick="eliminar('<?php
	    echo $estadistica['id'] ?>', '<?= $this->pag ?>')">
          <img src="../imagenes/iconos_admin/icono_admin-palabra_eliminar.png" width="37" height="37" border="0" title="Eliminar" />
        </a>
      </td>
	</tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php
endif;
?>
</div>