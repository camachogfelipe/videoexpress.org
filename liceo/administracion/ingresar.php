<?php
session_start();

// check session variable
if (isset($_SESSION['valid_user']) and $_SESSION['permisos'][3] == "Y")
{
	$editar = $_REQUEST['editar'];
	$nombre = $_REQUEST['nombre'];
	$email = $_REQUEST['email'];
	$ingresar = $_REQUEST['in'];
	$No = $_REQUEST['No'];
	
	if ($ingresar == true) $No = 0;

	if ($ingresar == true && $nombre != NULL && $email != NULL)
	{
		include ("conexion.php");
		
		$sql = "SELECT COUNT(*) FROM emails";

		$result = mysql_query($sql) or die("La siguiente consulta contiene alg&uacute;n error:<br>nSQL: <b>$sql</b>");
		$total_resultados = mysql_fetch_array($result);
	
		$num = $total_resultados[0];
		$num++;		
		
		if ($info[No] > 0)
		{
			$query = "UPDATE emails SET nombre='$nombre' WHERE No='$No'";
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='tabla_padres.php'</script>";
		}
		else
		{
			//Todo parece correcto procedemos con la inserccion
			$query = "INSERT INTO emails (No, nombre, email) VALUES('$num', '$nombre', '$email')";		
			mysql_query($query) or die(mysql_error());
			echo "<script languaje='Javascript'>location.href='tabla_padres.php'</script>";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<script>
//Pon en la variable obligatorios el name de todos los campos que deben rellenar

obligatorio = ["nombre", "email"];
vacio = 0;

//Pon en la veriable textoObligatorio el texto que quieres que aparezca en el alert

textoObligatorio=["Nombre", "E-mail"];

function comprobar(este)
{
	for(a=0; a<obligatorio.length; a++)
	{
		if (a == 1)
		{
			isMail(este.elements[obligatorio[1]].value);
			if (x == 1)
			{
				este.elements[obligatorio[a]].focus();
				return false;
			}
		}
		
		if(este.elements[obligatorio[a]].value == "")
		{
			alert("Por favor, rellena el campo "+textoObligatorio[a]);
			este.elements[obligatorio[a]].focus();
			return false;
		}
	}
	return true;
}

function isMail(Cadena) {   
  
    Punto = Cadena.substring(Cadena.lastIndexOf('.') + 1, Cadena.length);            // Cadena del .com   
    Dominio = Cadena.substring(Cadena.lastIndexOf('@') + 1, Cadena.lastIndexOf('.'));    // Dominio @lala.com   
    Usuario = Cadena.substring(0, Cadena.lastIndexOf('@'));                  // Cadena lalala@   
    Reserv = "@/º\"\'+*{}\\<>?¿[]áéíóú#·¡!^*;,:";                      // Letras Reservadas   
       
    // Añadida por El Codigo para poder emitir un alert en funcion de si email valido o no   
    valido = true;   
       
    // verifica qie el Usuario no tenga un caracter especial   
    for (var Cont=0; Cont<Usuario.length; Cont++)
	{   
        X = Usuario.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
  
    // verifica qie el Punto no tenga un caracter especial   
    for (var Cont=0; Cont<Punto.length; Cont++)
	{   
        X=Punto.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
    }   
                           
    // verifica qie el Dominio no tenga un caracter especial   
    for (var Cont=0; Cont<Dominio.length; Cont++)
	{   
        X=Dominio.substring(Cont,Cont+1);
        if (Reserv.indexOf(X)!=-1) valido = false;
        }   
  
    // Verifica la sintaxis básica.....   
    if (Punto.length<2 || Dominio <1 || Cadena.lastIndexOf('.')<0 || Cadena.lastIndexOf('@')<0 || Usuario<1)
	{   
        valido = false;
    }   
       
    // Añadido por El Código para que emita un alert de aviso indicando si email válido o no   
    if (valido)
	{   
		return x = 0;
    }
	else
	{   
        alert('Email no válido.');
		return x = 1;
    }   
}
</script>
</head>

<body>
<center>
<form id="form1" name="form1" method="post" action="ingresar.php?in=true" onsubmit="return comprobar(this)" >
<table width="500" border="0" cellspacing="3px" cellpadding="0" style="margin-top: 20px">
  <tr>
    <td>
     <table width="500" border="0" cellspacing="3px" cellpadding="0">
     <?php if($editar == true)
	  {
		echo "<tr><td width='70' style='text-align: left'>Padre No.</td><td width='430'>$No<input name='No' type='hidden' id='No' size='10' maxlength='3' value='$info[No]'</td></tr>";
	  }?>
      <tr>
        <td width="70" style="text-align: left">Nombre</td>
        <td width="430"><input name="nombre" type="text" id="nombre" tabindex="1" size="60" maxlength="150" value="<?php if($editar == true)
	  {
	  	echo "$nombre";
	  } ?>" /></td>
      </tr>
      <tr>
        <td style="text-align: left">E-mail</td>
        <td><input name="email" type="text" id="email" tabindex="2" size="60" maxlength="150" value="<?php if($editar == true)
	  {
	  	echo "$email";
	  } ?>" /></td>
      </tr>
     </table>
    </td>
  </tr>
  <tr>
    <td style="text-align:center">
     <input name="limpiar" type="reset" value="Limpiar el formulario" tabindex="3" />
     <input name="submit" type="submit" value="Ingresar a la lista" tabindex="4" />
    </td>
  </tr>
</table>
</form>
</center>
</body>
</html>
<?php
}
else
{
	include ('index.php');
}
?>