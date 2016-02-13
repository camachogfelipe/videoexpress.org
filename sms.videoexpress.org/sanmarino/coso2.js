var counter = 1;
var limit = 3;
function addInput(dynamicInput){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Entry " + (counter + 1) + " <br>     <form method='post' enctype='multipart/form-data' name='form1' id='form1'>
            <table width='800px' border='0' cellspacing='0' cellpadding='2'  align='center'>
            <thead>
                <tr> 
                <th colspan='4'>.CREACION DE USUARIOS DE MENSAJERIA.</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <td><strong>Nombre:</strong></td>
                    <td><input name='nombres' type='text' id='nombres' maxlength='250' value='<?=eliminarInvalidos($_POST['nombres']); ?>' /></td>
                </tr>
                <tr> 
                    <td><strong>E-mail:</strong></td>
                    <td><input name='email' type='text' id='email' maxlength='250' value='<?=eliminarInvalidos($_POST['email']); ?>' /></td>
                </tr>
                <tr> 
                    <td><strong>Celular:</strong></td>
                    <td><input name='celular' type='text' id='celular' maxlength='250' value='<?=soloNumeros($_POST['celular']); ?>' /></td>
                </tr>
                <tr> 
                    <td><strong>Grupos:</strong></td>
                    <td><?
					$sql= 'SELECT sms_grupos.* ';
					$sql.=' FROM sms_grupos';
					$sql.=' ORDER BY nombre asc ';
					
					$PSN->query($sql);
					$num=$PSN->num_rows();
					if($num > 0)
					{
						while($PSN->next_record())
						{
							?><input type='checkbox' name='listaasociar[]' value='<?=$PSN->f('id'); ?>'><?=$PSN->f('nombre'); ?><br /><?
						}
					}
					?>
                    </td>
                </tr>
                </tbody>
            </table>
            <input type='hidden' name='funcion' id='funcion' value='' />
            <br />
            <hr color='#0000FF' width='800px' />
            <br />
            <center><input type='button' name='button' onclick='generarForm()' value='Crear Usuario' style='background-color:#FFFFFF;border-color:#0000FF;color:#006600;font-weight:bold'></center>
                 <input type='button' value='Agregar nuevo formulario' onClick='addInput('dynamicInput');'>
            </form>"<br>;
          document.getElementById(dynamicInput).appendChild(newdiv);
          counter++;
     }
}