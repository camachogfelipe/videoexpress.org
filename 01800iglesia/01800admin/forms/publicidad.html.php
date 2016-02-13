<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../Scripts/jquery-ui/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Scripts/jquery.form.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<script type="text/javascript" src="../Scripts/publicidad_form.js"></script>
<script type="text/javascript" src="upload_files/LoadVars.js"><!--// http://www.devpro.it/javascript_id_92.html //--></script>
<script type="text/javascript" src="upload_files/BytesUploaded.js"><!--// http://www.devpro.it/javascript_id_96.html //--></script>
<script type="text/javascript">
	var bUploaded = new BytesUploaded('upload_files/whileuploading.php');
</script>
<form action="index3.php" method="post" enctype="multipart/form-data" name="publicidad" id="publicidad">
<?php
if(isset($_REQUEST['id']) and is_numeric($_REQUEST['id'])) {
	$this->post['id'] = $_REQUEST['id'];
	echo '	<input type="hidden" name="id" value="'.$_REQUEST['id'].'" />'."\n";
	$this->aviso_publicidad();
	if(!empty($this->resultados)) {
		$this->post['opp'] = "guardar";
		$tmp = explode(" - ", $this->resultados['pub_telefono']);
		unset($this->resultados['pub_telefono']);
		$this->resultados['tel'] = $tmp[0];
		$this->resultados['celular'] = $tmp[1];
		$this->resultados['pbx'] = $tmp[2];
	}
	else $this->post['opp'] = "crear";
}
?>
	<input type="hidden" name="op" value="10" />
    <input type="hidden" name="opp" value="<?php echo $this->post['opp']; ?>" />
    <table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td width="180"><div id="label">Nombre de la empresa</div></td>
        <td><input name="empresa" type="text" id="empresa" size="40" tabindex="1" value="<?php
			if($this->post['opp'] == "guardar") echo $this->resultados['pub_empresa'];
        ?>" /><span id="empresa_error"></span></td>
      </tr>
      <tr>
        <td><div id="label">T&eacute;lefono:</div></td>
        <td><input name="tel" type="text" id="tel" size="40" tabindex="2" value="<?php
			if($this->post['opp'] == "guardar") echo $this->resultados['tel'];
        ?>" /><span id="tel_error"></span></td>
      </tr>
      <tr>
        <td><div id="label">T&eacute;lefono movil:</div></td>
        <td><input name="movil" type="text" id="movil" size="40" tabindex="3" value="<?php
			if($this->post['opp'] == "guardar") echo $this->resultados['celular'];
        ?>" /><span id="movil_error"></span></td>
      </tr>
      <tr>
        <td><div id="label">PBX</div></td>
        <td><input name="pbx" type="text" id="pbx" size="40" tabindex="4" value="<?php
			if($this->post['opp'] == "guardar") echo $this->resultados['pbx'];
        ?>" /><span id="pbx_error"></span></td>
      </tr>
      <tr>
        <td><div id="label">P&aacute;gina web:</div></td>
        <td><input name="web" type="text" id="web" size="40" tabindex="5" value="<?php
			if($this->post['opp'] == "guardar") echo $this->resultados['pub_web'];
        ?>" /><span id="web_error"></span></td>
      </tr>
      <tr>
        <td><div id="label">Correo electr&oacute;nico:</div></td>
        <td><input name="email" type="text" id="email" size="40" tabindex="6" value="<?php
			if($this->post['opp'] == "guardar") echo $this->resultados['pub_email'];
        ?>" /><span id="email_error"></span></td>
      </tr>
      <tr>
        <td valign="top"><div id="label">Lugar de aparici&oacute;n:</div></td>
        <td>Paises <input name="lapa1" type="checkbox" id="lapa1" value="Y" tabindex="7"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_lugar_aparicion_paises'] == "Y") echo ' checked="checked"';
        	?> /> 
        	Departamentos <input name="lapa2" type="checkbox" id="lapa2" value="Y" tabindex="8"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_lugar_aparicion_deptos'] == "Y") echo ' checked="checked"';
        	?> />
            Ciudades <input name="lapa3" type="checkbox" id="lapa3" value="Y" tabindex="9"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_lugar_aparicion_ciudades'] == "Y") echo ' checked="checked"';
        	?> />
			Iglesias <input name="lapa4" type="checkbox" id="lapa4" value="Y" tabindex="10"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_lugar_aparicion_iglesia'] == "Y") echo ' checked="checked"';
        	?> /><br /> 
            Inscripci&oacute;n de iglesia <input name="lapa5" type="checkbox" id="lapa5" value="Y" tabindex="11"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_lugar_aparicion_inscripcion'] == "Y") echo ' checked="checked"';
        	?> />
            &iquest;Qu&eacute; es 01800? <input name="lapa6" type="checkbox" id="lapa6" value="Y" tabindex="12"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_lugar_aparicion_01800'] == "Y") echo ' checked="checked"';
        	?> />
            Contacto <input name="lapa7" type="checkbox" id="lapa7" value="Y" tabindex="13"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_lugar_aparicion_contacto'] == "Y") echo ' checked="checked"';
        	?> /><br />
            Glosario <input name="lapa8" type="checkbox" id="lapa8" value="Y" tabindex="14"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_lugar_aparicion_glosario'] == "Y") echo ' checked="checked"';
        	?> />
            <br /><span id="lapa_error"></span>
        </td>
      </tr>
      <tr>
        <td><div id="label">&iquest;Publicidad activa?</div></td>
        <td>Si <input name="pact" type="radio" id="pact" tabindex="15" value="Y"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_activa'] == "Y") echo ' checked="checked"';
				else echo ' checked="checked"';
        	?> /> 
        	No <input name="pact" type="radio" id="pact" value="N" tabindex="16"<?php
				if($this->post['opp'] == "guardar" and $this->resultados['pub_activa'] == "N") echo ' checked="checked"';
        	?> />
          <span id="pact_error"></span>
        </td>
      </tr>
      <tr>
        <td><div id="label">Logotipo de la empresa:</div></td>
        <td><?php
        		if($this->post['opp'] == "guardar") {
					echo "Logotipo actual: ".$this->resultados['pub_logo'];
					echo '<input name="logotipo" id="logotipo" type="hidden" value="'.$this->resultados['pub_logo'].'" />';
					echo '<br /><input name="logotipo1" id="logotipo1" type="file" tabindex="17" />';
					echo '<span id="logotipo1_error"></span>';
				}
				else echo '<input name="logotipo" id="logotipo" type="file" tabindex="17" /><span id="logotipo_error"></span>'."\n"; 
			?>
        </td>
      </tr>
      <tr>
        <td valign="top"><div id="label" valign="top">Texto del aviso: (Max 250)</div></td>
        <td><textarea name="texto" id="texto" cols="40" rows="5" tabindex="18" onkeyup="contar('texto')"><?php
			if($this->post['opp'] == "guardar") echo $this->resultados['pub_texto'];
        ?></textarea>
        	</span><span id="texto_error"></span><br />Caracteres: <span id="texto-contar"></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
        	<button name="submit" type="submit" tabindex="19">
            	<img src="../imagenes/boton_enviar_form_contacto.png" width="26" height="26" align="absmiddle" /> Crear aviso
			</button>
		</td>
      </tr>
	</table>
</form>
<div id="fileprogress"></div>
<pre><?php include("upload_files/test2.php"); ?></pre>