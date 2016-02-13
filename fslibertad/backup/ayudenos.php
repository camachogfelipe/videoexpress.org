<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="ac" class="titulo_menu_contenido"><span>Ayudenos a crecer</span></div>
    <div id="menu_contenido" class="menu_ac">
    	<li><a href="?op=5&s=1" class="<?php if($_GET['s']==1 || $_GET['s']==NULL) echo "active" ?>">Escribanos</a></li>
                    <hr size="3" />
        <li><a href="?op=5&s=2" class="<?php if($_GET['s']==2) echo "active" ?>">Donaciones</a></li>
    </div>
    <div id="contenido_contenido">
    <?php
	switch($_GET['s'])
	{
		case 1: formulario($e);
        		break;
		case 2: donar();
				break;
		default: formulario($e);
				 break;
	}
	?>
    </div>
</div>
<div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>

<?php
function donar()
{
	echo "<span>Cuenta Helm Bank</span>";
	echo "<p>Ahorros No. 013042199<br/>Nombre de la cuenta: Fundaci&oacute;n Semillas de Libertad<br />Nit. 900.388.711-9</p>";
	echo "<span>Si requiere apoyo t&eacute;cnico comun&iacute;quese con el banco al n&uacute;mero 581 81 81 en Bogot&aacute; &oacute; al n&uacute;mero 01800 512 633 en el resto del pa&iacute;s.";
}

function formulario($e)
{
	if($e == NULL)
	{
		?>
        <span id="titulo_contenido" class="color5">Tipos de ayuda</span>
	    <p style="text-align:justify">Impulsar el crecimiento integral del Ser Humano y el desarrollo de su Potencial Creativo, con el fin de generar un nuevo liderazgo renovador y transformador con la Verdad del Reino de Dios</p>
        <span id="titulo_contenido" class="color5">Formulario de cont&aacute;cto</span><br /><br />
        <form action="" method="post" name="form_ayudenos">
        	<label for="nombres_apellidos">Nombres y apellidos<br /></label><input id="campos_form" name="nombres_apellidos" type="text" size="50" maxlength="350" /><br />
            <label for="correo">Correo electr&oacute;nico</label><br /><input id="campos_form2" name="correo" type="texto" size="50" maxlength="350" /><br />
          	<label for="tipo_ayuda">Tipo de ayuda</label><br /><select id="campos_form3" name="tipo_ayuda">
              <option value="economica">En dinero</option>
              <option value="voluntariado">Voluntariado</option>
              <option value="especie">Bienes o &aacute;rticulos</option>
              <option value="otro">Otro</option>
            </select><br />
            <label for="telefono">Tel&eacute;fono</label><br /><input id="campos_form4" name="telefono" type="texto" size="30" maxlength="20" /><br />
            <label for="celular">Tel&eacute;fono m&oacute;vil</label><br /><input id="campos_form5" name="celular" type="texto" size="30" maxlength="20" /><br />
            <label for="ciudad">Ciudad</label><br /><input id="campos_form6" name="ciudad" type="texto" size="50" maxlength="200" /><br />
            <label for="pais">Pais</label><br /><input id="campos_form7" name="pais" type="texto" size="50" maxlength="200" /><br />
            <label for="asunto">Asunto</label><br /><textarea id="campos_form8" name="asunto" cols="50" rows="5"></textarea><br />
        </form>
        <?php
	}
	else
	{
		echo "Su propuesta de ayuda quedor registrada, pronto lo contactaremos";
	}
}
?>