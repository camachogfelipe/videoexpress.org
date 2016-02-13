<?php
require("funciones_globales.php");

//funcione que muestra los distintos proyectos de un monte dado
function mostrar_proyectos($monte)
{
	$consulta = consulta_bd("proyectos", "id_proyecto, nombre, logo_proyecto", "1;;;monte='$monte';");
	$num_rows = mysql_num_rows($consulta);
	
	if($num_rows == 0)
	{
		echo '<span style="margin: 5px">No se han publicado Proyectos del monte ';
		switch($monte)
		{
			case 'iglesia' : echo "Iglesia";
							  break;
			case 'educacion' : echo "Educaci&oacute;n";
							   break;
			case 'gcye' : echo 'Gobierno Civil y Estado';
							  break;
			case 'economia' : echo 'Econom&iacute;a y negocios';
							  break;
			case 'familia' : echo 'Familia';
							break;
			case 'aye' : echo 'Arte y Entretenimiento';
							break;
			case 'mdc' : echo 'Medios de comunicaci&oacute;n';
							break;
		}
		echo '</span>';
	}
	else
	{
		echo '<table cellpadding="0" cellspacing="10" border="0" align="center">';
		echo '<tr>';
		$i = 1;
		while ($row = mysql_fetch_object($consulta))
		{
			echo '<td>';
			echo $row->nombre.'<br />';
			echo '<a href="detalle_proyecto.php?id='.$row->id_proyecto.'&height=600&width=800" title="'.$row->nombre.'" class="thickbox">';
			if($row->logo_proyecto == NULL) $logo = "Defaultproyectos.png";
			else $logo = $row->logo_proyecto;
			echo '<img src="proyectos/logos/'.$logo.'" width="150" height="150" border="0" alt="'.$row->nombre.'" />';
			echo '</a>';
			echo '</td>';
			if($i==3) { echo '</tr><tr>'; $i=1; }
			else $i++;
		}
		echo '</tr>';
		echo '</table>';
	}
	mysql_free_result($consulta);
}

//Funcion que muestra el informe anual
function informe_anual()
{
	echo "No se ha creado el informe anual del presente a&ntilde;o";
}

//funcion que carga la informacion general de la pagina
function cargar_informacion_gral($op, $s)
{
	switch($op)
	{
		case 1 : $color = 1;
				 break;
		case 2 : $color = 2;
				 break;
		case 3 : $color = 3;
				 break;
		case 4 : $color = 4;
				 break;
		case 5 : $color = 5;
				 break;
		case 6 : $color = 6;
				 break;
		default : $color = 1;
				  break;
	}
	$consulta = consulta_bd("informacion_gral", "*", "1;;;ID_seccion='$op' and Subseccion='$s'");
	while($filas = mysql_fetch_object($consulta))
	{
		echo '<span id="titulo_contenido" class="color'.$color.'">'.$filas->Titulo.':</span>';
		echo $filas->Texto;
	}
	mysql_free_result($consulta);
}

function cargar_informacion_fundadores()
{
	echo '<span id="titulo_contenido" class="color1">Biograf&iacute;a Fundadores:</span>';
	$consulta = consulta_bd("fundadores", "Nombre", "-1;;;;");
	echo '<A name="top">&nbsp;</A><br />'."\n";
	echo '<span id="titulo_contenido" class="color1">'."\n";
	while($filas = mysql_fetch_object($consulta))
	{
		echo '<a href="#'.str_replace(" ", "_", $filas->Nombre).'">'.$filas->Nombre.'</a><br />'."\n";
	}
	echo '</span>'."\n";
	mysql_free_result($consulta);
	$consulta = consulta_bd("fundadores", "*", "-1;;;;");
	while($filas = mysql_fetch_object($consulta))
	{
		echo '<span id="'.str_replace(" ", "_", $filas->Nombre).'" class="color2">'.$filas->Nombre.'</span> <a href="#top">Ir arriba</a><br /><br />'."\n";
		echo '<span>Perfil profesional</span>'."\n";
		echo $filas->Perfil."\n";
		echo '<span>Experiencia Laboral</span>'."\n";
		echo $filas->Experiencia;
	}
	mysql_free_result($consulta);
}

function cargar_informacion_junta()
{
	echo '<span id="titulo_contenido" class="color1">Junta directiva:</span>';
	$consulta = consulta_bd("junta", "Nombre", "-1;;;;");
	echo '<A name="top">&nbsp;</A>'."\n";
	echo '<span id="titulo_contenido" class="color1">'."\n";
	while($filas = mysql_fetch_object($consulta))
		echo '<a href="#'.str_replace(" ", "_", $filas->Nombre).'">'.$filas->Nombre.'</a><br />'."\n";
	echo '</span>'."\n";
	mysql_free_result($consulta);
	$consulta = consulta_bd("junta", "*", "-1;;;;");
	while($filas = mysql_fetch_object($consulta))
	{
		echo '<span id="'.str_replace(" ", "_", $filas->Nombre).'" class="color2">'.$filas->Nombre.'</span> <a href="#top">Ir arriba</a><br /><br />'."\n";
		echo '<span>Perfil profesional</span>'."\n";
		echo $filas->Perfil."\n";
	}
	mysql_free_result($consulta);
}

function quehacemos($mon)
{
	$consulta = consulta_bd("que_hacemos", "*", "1;;;ID_seccion='$mon';");
	while($filas = mysql_fetch_object($consulta))
	{
		echo '<span id="titulo_contenido" class="color3">'.$filas->Titulo.':</span>';
		echo '<p>Coordinador: '.$filas->Coordinador;
                echo '<br />Email: <a href="mailto: '.$filas->Email.'">'.$filas->Email.'</a>';
                echo '</p>'."\n";
		echo $filas->Descripcion."\n";
		echo '<span id="titulo_contenido" class="color3">Sue&ntilde;o:</span>'."\n";
		echo $filas->Dream;
	}
	mysql_free_result($consulta);
}

function ver_editorial()
{
	$consulta = consulta_bd("editoriales", "ID_editorial, Titulo", "2;ID_editorial;DESC;;");
	if(mysql_num_rows($consulta) > 0)
	{
		echo '<div id="submenu2">';
		echo '<table cellpadding="2" cellspacing="0" border="0" align="left" width="200">';
		while($fila = mysql_fetch_object($consulta))
		{
			echo '<tr>'."\n";
			echo '<td id="menu_izq_editorial">';
			echo $fila->Titulo;
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Ver el editorial" onclick="';
			echo "recargar('index3','op=7&s=vereditorial&id=$fila->ID_editorial','#submenuder')\">";
			echo '<img src="../imagenes/icono_lupa.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Editar este editorial" onclick="';
			echo "recargar('formulario_editorial','op=7&s=vereditorial&id=$fila->ID_editorial','#submenuder')\">";
			echo '<img src="../imagenes/icono_lapiz.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '</tr>'."\n";
		}
		echo '</table>'."\n";
		echo "</div>";
		echo '<div id="submenuder"></div>';
	}
	else echo "No existen editoriales";
}

function verEditorialIndex($id)
{
	if($id == NULL) $consulta = consulta_bd("editoriales", "*", "6;ID_editorial;DESC;;3");
	else $consulta = consulta_bd("editoriales", "*", "5;ID_editorial;DESC;ID_editorial<='$id';3");
	
	$rows = mysql_num_rows($consulta);
	if($rows > 0)
	{
		while($fila = mysql_fetch_object($consulta))
		{
			$idEdt = $fila->ID_editorial;
			echo '<p>Editorial No. '.$fila->ID_editorial.'</p>';
			echo '<p id="verde_index" class="titulo">'.$fila->Titulo.'</p>';
                        echo $texto = substr($fila->Texto,0,300);
			echo '... <br /><a href="?op=4&s='.$fila->Tema.'&ed='.$idEdt.'" title="'.$fila->Titulo.'">Ver m&aacute;s</a>';
		}
		$idEdt--;
		return $idEdt;
	}
}

function paginacionEditorial($idEdt)
{
	if($idEdt >= 1)
	{
		echo '<a href="index.php?e='.$idEdt.'" title="Anterior">';
		echo "<< Anteriores&nbsp;&nbsp;&nbsp;";
		echo '</a>';
	}
	$max = dato_columna("editoriales", "MAX(ID_editorial)", "-1;;;;");
	$siguiente = $idEdt + 4;
	if($siguiente <= $max)
	{
		echo '<a href="index.php?e='.$siguiente.'">';
		echo ' Siguiente >>';
		echo '</a>';
	}
}

function encabezado_nya($ed, $s)
{
	if($ed == NULL)
	{
		$ed = dato_columna("editoriales", "ID_editorial", "5;ID_editorial;DESC;Tema='$s';1");
		echo '<p id="encabezado_nya">';
		echo '<a class="link" href="?op=4&s='.$s.'&ed='.$ed.'" title="Ver art&iacute;culos">Art&iacute;culos</a>';
		echo '&nbsp;&nbsp;/&nbsp;&nbsp;';
		echo 'Proyectos';
		echo '</p>';
	}
	else
	{
		echo '<p id="encabezado_nya">';
		echo 'Art&iacute;culos';
		echo '&nbsp;&nbsp;/&nbsp;&nbsp;';
		echo '<a class="link" href="?op=4&s='.$s.'" title="Ver proyectos">Proyectos</a>';
		echo '</p>';
	}
}

function vereditorial($id)
{
	if($id == NULL) $consulta = consulta_bd("editoriales", "*", "6;ID_editorial;DESC;;1");
	else $consulta = consulta_bd("editoriales", "*", "1;;;ID_editorial='$id';");
	while($fila = mysql_fetch_object($consulta))
	{
		$ide = $fila->ID_editorial;
		echo '<span id="verde_index" class="titulo">';
		echo $fila->Titulo;
		echo '</span><span id="texto_der">';
		if($id == NULL)
		{
			$items = explode(" ", $fila->Ultima_actualizacion);
			echo $items[0];
		}
		else echo $fila->Ultima_actualizacion;
		echo '</span><br />';
		echo $fila->Texto;
	}
	return $ide;
}

function ver_semillas()
{
	$consulta = consulta_bd("semillas", "ID_semilla, Ultima_actualizacion", "2;ID_semilla;DESC;;");
	if(mysql_num_rows($consulta) > 0)
	{
		echo '<div id="submenu2">';
		echo '<table cellpadding="2" cellspacing="0" border="0" align="left" width="200">';
		while($fila = mysql_fetch_object($consulta))
		{
			echo '<tr>'."\n";
			echo '<td id="menu_izq_editorial">Semilla No. ';
			echo $fila->ID_semilla;
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Ver la semilla" onclick="';
			echo "recargar('index3','op=7&s=versemilla&id=$fila->ID_semilla','#submenuder')\">";
			echo '<img src="../imagenes/icono_lupa.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Editar esta semilla" onclick="';
			echo "recargar('formulario_semillas','op=7&s=versemilla&id=".$fila->ID_semilla."','#submenuder')\">";
			echo '<img src="../imagenes/icono_lapiz.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '</tr>'."\n";
		}
		echo '</table>'."\n";
		echo "</div>";
		echo '<div id="submenuder"></div>';
	}
	else echo "No existen Semillas de libertad";
}

function versemilla($id)
{
	if($id == NULL) $consulta = consulta_bd("semillas", "*", "6;ID_semilla;DESC;;1");
	else $consulta = consulta_bd("semillas", "*", "1;;;ID_semilla='$id';");
	while($fila = mysql_fetch_object($consulta))
	{
		echo '<span id="verde_index" class="titulo">Semilla No.';
		echo $fila->ID_semilla;
		echo '</span> ';
		echo $fila->Ultima_actualizacion;
		echo '<br />';
		echo $fila->Texto;
	}
}

function ver_semillas2()
{
	$consulta = consulta_bd("semillas2", "ID_semilla2, Ultima_actualizacion", "2;ID_semilla2;DESC;;");
	if(mysql_num_rows($consulta) > 0)
	{
		echo '<div id="submenu2">';
		echo '<table cellpadding="2" cellspacing="0" border="0" align="left" width="200">';
		while($fila = mysql_fetch_object($consulta))
		{
			echo '<tr>'."\n";
			echo '<td id="menu_izq_editorial">Peque&ntilde;a ense&ntilde;anza No. ';
			echo $fila->ID_semilla2;
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Ver la semilla" onclick="';
			echo "recargar('index3','op=7&s=versemilla2&id=".$fila->ID_semilla2."','#submenuder')\">";
			echo '<img src="../imagenes/icono_lupa.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Editar esta semilla" onclick="';
			echo "recargar('formulario_semillas_2','op=7&s=versemilla&id=".$fila->ID_semilla2."','#submenuder')\">";
			echo '<img src="../imagenes/icono_lapiz.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '</tr>'."\n";
		}
		echo '</table>'."\n";
		echo "</div>";
		echo '<div id="submenuder"></div>';
	}
	else echo "No existen Peque&ntilde;as ense&ntilde;anzas";
}

function versemilla2($id)
{
	if($id == NULL) $consulta = consulta_bd("semillas2", "*", "6;ID_semilla2;DESC;;1");
	else $consulta = consulta_bd("semillas2", "*", "1;;;ID_semilla2='$id';");
	while($fila = mysql_fetch_object($consulta))
	{
		echo '<span id="rojo_index" class="titulo">Peque&ntilde;a ense&ntilde;anza No.';
		echo $fila->id_semilla2;
		echo '</span> ';
		echo $fila->Ultima_actualizacion;
		echo '<br />';
		echo $fila->texto;
	}
}

function ver_ayudas($tipo)
{
	if($tipo == "SA") $consulta = consulta_bd("ayudas", "ID_Ayuda", "3;Fecha_solicitud;ASC;Estado='NP' and Tipo_solicitud='SA';");
	elseif($tipo == "PA") $consulta = consulta_bd("ayudas", "ID_Ayuda", "3;Fecha_solicitud;ASC;Estado='NP' and Tipo_solicitud='OA';");
	if(mysql_num_rows($consulta) > 0)
	{
		if($tipo == "SA")
		{
			$texto = "solicitud";
		}
		elseif($tipo == "PA") $texto = "propuesta";
		echo '<div id="submenu2">';
		echo '<table cellpadding="2" cellspacing="0" border="0" align="left" width="200">';
		$i = 1;
		while($fila = mysql_fetch_object($consulta))
		{
			echo '<tr>'."\n";
			echo '<td id="menu_izq_editorial">'.$texto.' No. ';
			echo $i; $i++;
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Ver la '.$texto.'" onclick="';
			echo "recargar('index3','op=5&s=ver".$texto."&id=$fila->ID_Ayuda','#submenuder')\">";
			echo '<img src="../imagenes/icono_lupa.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Esta '.$texto.' ya est&aacute; procesada" onclick="';
			echo "recargar('index3','op=5&s=procesar_ayuda&id=$fila->ID_Ayuda','#contenido_contenido')\">";
			echo '<img src="../imagenes/icono_lapiz.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '</tr>'."\n";
		}
		echo '</table>'."\n";
		echo "</div>";
		echo '<div id="submenuder"></div>';
	}
	else
	{
		if($tipo == "SA") $texto = "solicitudes";
		else $texto = "propuestas";
		echo "No existen $texto de ayuda a&uacute;n";
	}
}

function verpropuesta($id)
{
	$consulta = consulta_bd("ayudas", "*", "1;;;ID_ayuda='$id' and Tipo_solicitud='OA' and Estado='NP';");
	echo '<table cellpadding="2" cellspacing="2" border="0" align="left">'."\n";
	echo "<tbody>\n";
	$propiedades = array("Nombre completo", "Correo", "Tipo de ayuda", "Tel&eacute;fono", "Tel&eacute;fono Movil", "Ciudad", "Pa&iacute;s", "Fecha de registro", "Descripci&oacute;n de la ayuda");
	while($fila = mysql_fetch_object($consulta))
	{
		$valores[0] = $fila->Nombres;
		$valores[1] = $fila->Correo;
		$valores[2] = $fila->Tipo_ayuda;
		$valores[3] = $fila->Telefono;
		$valores[4] = $fila->Celular;
		$valores[5] = $fila->Ciudad;
		$valores[6] = $fila->Pais;
		$valores[7] = $fila->Fecha_solicitud;
		$valores[8] = $fila->Asunto;
	}
	for($i=0; $i<=8; $i++)
	{
		echo "<tr>\n";
		echo '<td width="50%" valign="top">';
		echo $propiedades[$i];
		echo ":</td>\n";
		echo "<td>";
		if($propiedades[$i] == "Tipo de ayuda")
		{
			if($valores[$i] == "D") echo "En dinero";
			elseif($valores[$i] == "V") echo "Voluntariado";
			elseif($valores[$i] == "B") echo "Bienes o &aacute;rticulos";
			elseif($valores[$i] == "O") echo "Otro";
		}
		else echo $valores[$i];
		echo "</td>\n";
		echo "<tr>\n";
	}
	echo "</tbody>\n";
	echo "</table>\n";
}

function versolicitud($id)
{
	$consulta = consulta_bd("ayudas", "*", "1;;;ID_ayuda='$id' and Tipo_solicitud='SA' and Estado='NP';");
	echo '<table cellpadding="2" cellspacing="2" border="0" align="left">'."\n";
	echo "<tbody>\n";
	$propiedades = array("Nombre completo", "Correo", "Tel&eacute;fono", "Tel&eacute;fono Movil", "Ciudad", "Pa&iacute;s", "Fecha de registro", "Descripci&oacute;n de la ayuda");
	while($fila = mysql_fetch_object($consulta))
	{
		$valores[0] = $fila->Nombres;
		$valores[1] = $fila->Correo;
		$valores[2] = $fila->Telefono;
		$valores[3] = $fila->Celular;
		$valores[4] = $fila->Ciudad;
		$valores[5] = $fila->Pais;
		$valores[6] = $fila->Fecha_solicitud;
		$valores[7] = $fila->Asunto;
	}
	for($i=0; $i<8; $i++)
	{
		echo "<tr>\n";
		echo '<td width="50%" valign="top">';
		echo $propiedades[$i];
		echo ":</td>\n";
		echo "<td>";
		if($propiedades[$i] == "Tipo de ayuda")
		{
			if($valores[$i] == "D") echo "En dinero";
			elseif($valores[$i] == "V") echo "Voluntariado";
			elseif($valores[$i] == "B") echo "Bienes o &aacute;rticulos";
			elseif($valores[$i] == "O") echo "Otro";
		}
		else echo $valores[$i];
		echo "</td>\n";
		echo "<tr>\n";
	}
	echo "</tbody>\n";
	echo "</table>\n";
}

function procesar_ayuda($id)
{
	act_datos_tabla("ayudas", "Estado='P'", "ID_ayuda='$id'", 1);
	echo "Se ha registrado la ayuda como procesada, no se volvera a mostrar en el panel correspondiente";
}

function semillas()
{
	$No_semillas = dato_columna("semillas", "COUNT(*)", "-1;;;;");
	if($No_semillas > 0 and $No_semillas < 6) $consulta = consulta_bd("semillas", "Texto", "-1;;;;");
	if($No_semillas > 5) $consulta = consulta_bd("semillas", "Texto", "6;RAND();;;5");
	while($semilla = mysql_fetch_object($consulta))
	{
		echo "<li>";
		echo $semilla->Texto;
		echo "</li>";
	}
}

function semillas2()
{
	echo $consulta = dato_columna("semillas2", "texto", "6;id_semilla2;DESC;;1");
}

function verproyectos()
{
	$consulta = consulta_bd("proyectos", "id_proyecto, nombre", "2;id_proyecto;ASC;;");
	if(mysql_num_rows($consulta) > 0)
	{
		echo '<div id="submenu2">';
		echo '<table cellpadding="2" cellspacing="0" border="0" align="left" width="200">';
		$i = 1;
		while($fila = mysql_fetch_object($consulta))
		{
			echo '<tr>'."\n";
			echo '<td id="menu_izq_editorial">';
			echo $fila->nombre;
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Ver el proyecto" onclick="';
			echo "recargar('index3','op=5&s=verproyecto&id=$fila->id_proyecto','#submenuder')\">";
			echo '<img src="../imagenes/icono_lupa.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '<td id="menu_der_editorial">';
			echo '<a href="#" title="Esta '.$texto.' ya est&aacute; procesada" onclick="';
			echo "recargar('crear_proyecto','op=5&s=editar&id=$fila->id_proyecto','#contenido_contenido')\">";
			echo '<img src="../imagenes/icono_lapiz.png" width="24" height="24" />';
			echo '</a>'."\n";
			echo '</td>'."\n";
			echo '</tr>'."\n";
		}
		echo '</table>'."\n";
		echo "</div>";
		echo '<div id="submenuder"></div>';
	}
	else
	{
		if($tipo == "SA") $texto = "solicitudes";
		else $texto = "propuestas";
		echo "No existen proyectos a&uacute;n";
	}
}

function verproyecto($id)
{
	?>
    <script type="text/javascript" src="../scripts/jquery-1.5.1.js"></script>
	<script type="text/javascript" src="../scripts/thickbox.js"></script>
	<link href="../scripts/thickbox.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../scripts/fslibertad.js"></script>
	<script type="text/javascript" src="../scripts/flowplayer-3.2.4.min.js"></script>
    <?php
	$consulta = consulta_bd("proyectos", "*", "1;;;id_proyecto='$id';");
	echo '<table cellpadding="2" cellspacing="2" border="0" align="left">'."\n";
	echo "<tbody>\n";
	$propiedades = array("Monte", "Fecha inicio", "Fecha final", "&Uacute;ltima actividad", "Lugar de trabajo", "Participantes", "No de personas impactadas", "Fotos", "Logo del proyecto", "Descripci&oacute;n", "Video", "Inversion");
	while($fila = mysql_fetch_object($consulta))
	{
		$valores[0] = $fila->monte;
		$valores[1] = $fila->fecha_inicio;
		$valores[2] = $fila->fecha_final;
		$valores[3] = $fila->ultima_actividad;
		$valores[4] = $fila->donde;
		$valores[5] = $fila->quienes;
		$valores[6] = $fila->personas_impactadas;
		$valores[7] = $fila->fotos;
		$valores[8] = '<img src="../proyectos/logos/'.$fila->logo_proyecto.'" alt="'.$fila->logo_proyecto.'" border="0">';
		$valores[9] = $fila->descripcion;
		$valores[10] = $fila->video;
		$inversion1 = $fila->inversion_pesos;
		$inversion2 = $fila->inversion_dolares;
		$valores[11] = "CO$ ".number_format($inversion1)."<br />US$ ".number_format($inversion2, 2);
		$valores[12] = $fila->nombre;
	}
	for($i=0; $i<=11; $i++)
	{
		echo "<tr>\n";
		echo '<td width="50%" valign="top">';
		echo $propiedades[$i];
		echo ":</td>\n";
		echo '<td valign="top">';
		if($i==0)
		{
			if($valores[$i] == "aye") echo "Arte y Entretenimiento";
			elseif($valores[$i] == "eyn") echo "Econom&iacute;a y Negocios";
			elseif($valores[$i] == "educacion") echo "Educaci&oacute;n";
			elseif($valores[$i] == "familia") echo "Familia";
			elseif($valores[$i] == "gcye") echo "Gobierno Civil y Estado";
			elseif($valores[$i] == "iglesia") echo "Iglesia";
			elseif($valores[$i] == "mdc") echo "Medios de Comunicaci&oacute;n";
		}
		elseif($i==5)
		{
			if(!empty($valores[$i]))
			{
				$items = explode(",", $valores[$i]);
				echo "<ul>";
				foreach($items as $k)
					echo "<li>".$k."</li>";
				echo "</ul>";
			}
		}
		elseif($i==7)
		{
			if(!empty($valores[$i]))
			{
				$fotos = explode(",", $valores[7]);
				$a=0;
				foreach($fotos as $item)
				{
					echo '<a href="../proyectos/fotos/'.$item.'" class="thickbox" title="'.$item.'">';
					echo $item;
					echo '</a>';
					echo ' <a href="#" title="Eliminar" onclick="recargar(\'index3\', \'op=4&s=delfoto&id='.$id.'&t='.$a.'\', \'#submenuder\')">';
					echo '<img src="../imagenes/boton_borrar_off.png" width="24" height="24" align="absmiddle" />';
					echo '</a><br />';
					$a++;
				}
				
			}
		}
		elseif($i==10)
		{
			if(!empty($valores[$i]))
			{
				echo '<a href="../proyectos/videos/'.$valores[$i].'" ';
				echo 'style="display:block;width:350px;height:200px; margin-left:auto;margin-right:auto" id="player"></a>';
				?>
                   <!-- this will install flowplayer inside previous A- tag. -->
                   <script>
					flowplayer("player", "../scripts/flowplayer-3.2.5.swf",
					{
						clip: {
							autoPlay: false,
						}
					});
				</script>
			<?php
			}
		}
		else echo $valores[$i];
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo '<tr>';
	echo '<td>Subir archivos</td>';
	echo '<td>';
	echo '<a href="upload.php?id='.$id.'&KeepThis=true&TB_iframe=true&height=300&width=400" title="'.$valores[12].'" class="thickbox">';
	echo '<img src="../imagenes/boton_enviar_off.png" width="24" height="24" />';
	echo '</a>'."\n";
	echo '</td>';
	echo '</tr>';
	echo "</tbody>\n";
	echo "</table>\n";
}

function colaboradores()
{
	$consulta = consulta_bd("colaboradores", "Nombre", "-1;;;;");
	$items = mysql_num_rows($consulta);
	
	if($items>0)
	{
		echo '<span id="titulo_contenido" class="color1">Colaboradores:</span>';
		echo "<ul>";
		while($fila = mysql_fetch_object($consulta))
			echo "<li>".$fila->Nombre."</li>";
		echo "</ul>";
	}
	else echo "No existen colaboradores";
}

function eliminarcolaborador($id)
{
	del_datos_tabla("colaboradores", "id_colaborador='$id'");
	echo "Se ha eliminado el colaborador";
}

function cambioclave($id_usuario)
{
	?>
    <div id="formcc">
    <script type="text/javascript" language="javascript" src="../scripts/jquery-1.5.1.js"></script>
	<script type="text/javascript" src="../scripts/jquery.validate.js"></script>
	<script type="text/javascript" src="../scripts/jquery.validate.additional-methods.js"></script>
	<script>
	$(document).ready(function()  
	{	
	var v = $("#cambio_clave").validate(
	{
		success: function(label) { label.addClass("valid").text("") },
		rules: {
			clave_anterior: {
				required: true,
				minlength: 6,
				/*maxlength: 12*/
			},
			clave_nueva1: {
				required: true,
				minlength: 6,
				maxlength: 12
			},
			clave_nueva2: {
				required: true,
				minlength: 6,
				maxlength: 12,
				equalTo: "#clave_nueva1"
			}
		},
		messages: {
			clave_anterior: {
				required: jQuery.format(" <span id='msj_error_texto'>Escriba su clave anterior</span>"),
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				/*maxlength: jQuery.format(" <span id='msj_error_texto'>Máximo {0} caracteres!</span>")*/
			},
			clave_nueva1: {
				required: " <span id='msj_error_texto'>Ingrese una clave nueva</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Máximo {0} caracteres!</span>")
			},
			clave_nueva2: {
				required: " <span id='msj_error_texto'>Repita la clave nueva</span>",
				minlength: jQuery.format(" <span id='msj_error_texto'>Mínimo {0} caracteres necesarios!</span>"),
				maxlength: jQuery.format(" <span id='msj_error_texto'>Máximo {0} caracteres!</span>"),
				equalTo: " <span id='msj_error_texto'>La clave no coincide con la anterior</span>"
			}
		},
		submitHandler: function()
		{
			$().ajaxStart(function()
			{
			});
			$('#cambio_clave').submit(function()
			{
				$.ajax(
				{
					type: 'POST',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(data)
					{
						var result = $('#resultados_cambio').html(data);
						$(result).fadeIn('slow');
					}
				})
				return false;
			});
		}
	});
	});
	</script>
    <form action="cambio.php" method="post" name="cambio_clave" id="cambio_clave">
    	<input type="hidden" id="usuario" name="usuario" value="<?php echo $id_usuario ?>" />
		<label for="clave_anterior">Clave anterior</label> <input type="password" id="clave_anterior" name="clave_anterior" /><br />
   	    <label for="clave_nueva1">Clave nueva</label> <input type="password" id="clave_nueva1" name="clave_nueva1" /><br />
        <label for="clave_nueva2">Repita la clave anterior</label> <input type="password" id="clave_nueva2" name="clave_nueva2" /><br />
       	<button type="submit" id="submit" name="submit" title="Buscar"><img src="../imagenes/boton_enviar_off.png" width="24" height="24" align="absmiddle" /> Cambiar la clave</button>
	</form>
    </div>
    <div id="resultados_cambio"></div>
<?php  
}

function delfoto($idproyecto, $idfoto)
{
	$fotos = dato_columna("proyectos", "fotos", "1;;;id_proyecto='$idproyecto';");
	$tmp = explode(",", $fotos);
	$archivo = $tmp[$idfoto];
	unset ( $tmp[$idfoto] );
	$fotos = implode(",", $tmp);
	act_datos_tabla("proyectos", "fotos='$fotos'", "id_proyecto='$idproyecto'", 1);
	unlink("../proyectos/fotos/".$archivo);
	verproyecto($idproyecto);
}
?>