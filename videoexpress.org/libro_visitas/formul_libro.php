<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form name=librovisitas action="?art=<?php echo $articulo ?>" method="post">
<table width="350" cellspacing="0" cellpadding="0" border="0">
<tr>
    <td><b><img src="../libro_visitas/firma.png" width="64" height="64" align="middle" /> Firma el Libro de Visitas</b></td>
</tr>
<tr>
    <td><?php echo $pregunta ?></td>
<tr>
<tr>
	<td align="left" valign="top" style="padding-top: 3px">
    <table width="100%" border="0" cellspacing="0" cellpadding="3">
	  <tr>
	    <td width="63%" style="border-right: 1px dotted #000">Nombre <input type="Text" name="nombre" size="20" maxlength="150"></td>
	    <td width="37%">Sexo: F<input name="sexo" type="radio" id="sexo" value="0" checked="checked" /> M<input type="radio" name="sexo" id="sexo" value="1" /></td>
	    </tr>
	  <tr>
	    <td style="border-right: 1px dotted #000">Email <input type="Text" name="email" size="20" maxlength="100"></td>
	    <td>edad <select name="edad" id="edad">
	      <option value="0" selected="selected">0-12</option>
	      <option value="13">13-25</option>
	      <option value="26">26-49</option>
	      <option value="50">50+</option>
	        </select></td>
	    </tr>
	  </table>
       Valoraci&oacute;n
       <select name="valoracion">
         <option value=1>Repelente
       <option value=2>Mal
       <option value=3 selected>Regular
       <option value=4>Bien
       <option value=5>Fant&aacute;stica
     </select><br /><br />
       Comentarios:<br />
       <textarea name="comentario" cols="35" rows="3"></textarea>
      </td>
    </tr>
    <tr>
       <td colspan=2 align=center class=fuente8>
       <br>
       <input type="submit" value=" Enviar la firma al libro de visitas ">
       </td>
    </tr>
    </table>
    </td>
</tr>
</table>
</form>
</body>
</html>
