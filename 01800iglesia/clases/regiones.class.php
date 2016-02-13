<?php
//defined ( '_01800' );// or die(header("Location: ../"));
class regiones {
	private $bd;
	private $r;
	private $p;
	private $d;
	private $c;
	private $l;
	private $resultados;
	private $tresultados;
	private $total_iglesias;
	private $pag;
	
	function __construct($r=NULL, $p=NULL, $d=NULL, $c=NULL, $pag = 1) {
		$this->pag = $pag;
		$this->bd = new BDManejo();
		if(!empty($r)) {
			$this->r = $r;
			if(!empty($p)) {
				$this->p = $p;
				if(!empty($d)) {
					$this->d = $d;
					if(!empty($c)) $this->c = $c;
				}
			}
		}
		if($_SESSION['lang'] == "es") $this->l = 7;
		elseif($_SESSION['lang'] == "en") $this->l = 3;
	}
	
	function carga_paises() {
		$this->bd->tabla("iglesias");
		$this->bd->datos("DISTINCT( paises.`id`) AS pais_id, iglesias.`city_id`, paises.nombre, paises.bandera");
		$this->bd->opciones("INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='".$this->l."' ".
							"INNER JOIN paises ON localidades.id_pais=paises.id AND paises.id_idioma='".$this->l."' ".
							"AND paises.`id_continente`='".$this->r."'  ORDER BY paises.nombre");
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		$this->resultados = $this->bd->array_asociativo();
		if(!empty($this->resultados)) {
			foreach($this->resultados as $value) $tmp[] = $value['pais_id'];
			$tmp = array_unique($tmp);
			$tmp2 = $claves = array();
			$x = 0;
			foreach($tmp as $valor) {
				foreach($this->resultados as $value) {
					if($value['pais_id'] == $valor and !in_array($valor, $claves, true)) {
						$claves[] = $valor;
						$tmp2[$x]['pais_id'] = $value['pais_id'];
						$tmp2[$x]['nombre'] = $value['nombre'];
						$tmp2[$x]['bandera'] = $value['bandera'];
						$x++;
					}
				}
			}
			$this->resultados = $tmp2;
		}
		else $this->resultados = NULL;
		//echo "<pre>";print_r($this->resultados);echo "</pre>";exit();
		return $this->resultados;
	}
	
	function carga_deptos() {
		$this->bd->tabla("iglesias");
		$this->bd->datos("regiones.`id` AS region_id, iglesias.`city_id`, regiones.nombre");
		$this->bd->opciones("INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='".$this->l."' ".
							"INNER JOIN regiones ON localidades.id_region=regiones.id AND regiones.id_idioma='".$this->l."' ".
							"AND regiones.`id_continente`='".$this->r."' AND regiones.`id_pais`='".$this->p."' ORDER BY regiones.nombre");
		$this->bd->leer_datos();
		$this->tresultados = $this->bd->array_asociativo();
		$this->tresultados = count($this->tresultados);
		$this->bd->datos("DISTINCT( regiones.`id`) AS region_id, iglesias.`city_id`, regiones.nombre");
		$this->bd->opciones("INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='".$this->l."' ".
							"INNER JOIN regiones ON localidades.id_region=regiones.id AND regiones.id_idioma='".$this->l."' ".
							"AND regiones.`id_continente`='".$this->r."' AND regiones.`id_pais`='".$this->p."' ORDER BY regiones.nombre");
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		$this->resultados = $this->bd->array_asociativo();
		$tr = count($this->resultados);
		for($i=0; $i<$tr; ++$i) $tmp[] = $this->resultados[$i]['region_id'];
		$tmp = array_unique($tmp);
		$tmp3 = array(0 => $this->resultados[0]);
		$esta = 0;
		foreach($tmp as $valor) {
			for($i=0; $i<count($tmp3); ++$i) {
				if(!in_array($valor, $tmp3[$i])) {
					$esta = 0;
					for($i=0; $i<$tr; ++$i) {
						if($this->resultados[$i]['region_id'] == $valor and $esta != 1) {
							$tmp2['region_id'] = $this->resultados[$i]['region_id'];
							$tmp2['nombre'] = $this->resultados[$i]['nombre'];
							array_push($tmp3, $tmp2);
							$esta = 1;
						}
					}
				}
			}
		}
		$this->resultados = $tmp3;
		return $this->resultados;
	}
	
	function carga_ciudades() {
		$this->bd->tabla("iglesias");
		$this->bd->datos("localidades.`id` AS ciudad_id, localidades.nombre");
		$this->bd->opciones("INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='".$this->l."' AND ".
							" localidades.id_region='".$this->d."' ORDER BY localidades.nombre");
		$this->bd->leer_datos();
		$this->tresultados = $this->bd->array_asociativo();
		$this->tresultados = count($this->tresultados);
		$this->bd->datos("DISTINCT( localidades.`id`) AS ciudad_id, localidades.nombre");
		$this->bd->opciones("INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='".$this->l."' AND ".
							" localidades.id_region='".$this->d."' ORDER BY localidades.nombre");
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		$this->resultados = $this->bd->array_asociativo();
		return $this->resultados;
	}
	
	function carga_iglesias($pag = 1) {
		$this->bd->tabla("iglesias");
		$this->bd->datos("COUNT(*)");
		$this->bd->opciones("WHERE city_id='".$this->c."'");
		$this->bd->leer_datos();
		$this->total_iglesias = $this->bd->dato_unico();
		$this->total_paginas = ceil($this->total_iglesias/3);
		//$this->bd->mostrar_sql();
		$this->bd->datos("igl_id, igl_nombre, igl_pastor_ppal, igl_telefono, igl_celular, igl_pbx, igl_logo");
		$this->bd->limite($pag, 3);
		$this->bd->leer_datos();
		return $this->resultados = $this->bd->array_asociativo();
	}
	
	function mostrar_deptos_ciudades($tipo, $r, $p, $d = NULL, $c = NULL, $TEXTO) {
		$divs = ceil(count($this->resultados)/3);
		
		echo $TEXTO['total']." ".$this->tresultados.$TEXTO['iglesias_en'].' '.count($this->resultados).' ';
		if($tipo == 1) echo $TEXTO['deptos'];
		elseif($tipo == 2) echo $TEXTO['ciudades'];
		echo "<br /><br />";
		
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr>';
		echo '<td valign="top">';
		$i = 1;
		for($x=0; $x<count($this->resultados); ++$x) {
			echo "<a onclick=\"javascript:recargar('pasos','r=".$r."&p=".$p;
			if($tipo == 1) {
				echo "&d=".$this->resultados[$x]['region_id']."');\" href=\"#\">";
				echo $this->resultados[$x]['nombre'];
			}
			elseif($tipo == 2) {
				echo "&d=".$d."&c=".$this->resultados[$x]['ciudad_id']."');\" href=\"#\">";
				echo $this->resultados[$x]['nombre'];
			}
			echo "</a><br />\n";
			$i++;
			if($i > $divs) { echo '</td><td valign="top">'; $i = 1; }
		}
		echo '</td>';
		echo '</tr>';
		echo '</table>';
	}
	
	function mostrar_iglesias($r, $p, $d, $c, $pag = 1, $TEXTO) {
		for($x=0; $x<count($this->resultados); ++$x) {
			if($x > 0) echo "<br />";
			echo '<div id="iglesia">';
			echo '<table width="100%" border="0" cellspacing="1" cellpadding="0">';
			echo '<tr>';
			echo '<td valign="top" style="font-size: xx-small">';
			echo '<span id="titulos">'.htmlentities(ucwords(strtoupper($this->resultados[$x]['igl_nombre'])), ENT_QUOTES, "UTF-8")."</span>";
			echo '<p>';
			echo $TEXTO['pastor_principal'].' '.ucwords($this->resultados[$x]['igl_pastor_ppal']);
			echo '<br />'.$TEXTO['telefono'].' ';
			if(!empty($this->resultados[$x]['igl_telefono'])) echo $this->resultados[$x]['igl_telefono'];
			elseif(!empty($this->resultados[$x]['igl_celular'])) echo $this->resultados[$x]['igl_celular'];
			elseif(!empty($this->resultados[$x]['igl_pbx'])) echo $this->resultados[$x]['igl_pbx'];
			$url = "r=".$r."&p=".$p."&d=".$d."&c=".$c."&amp;";
			echo "<br /><a onclick=\"javascript:recargar('iglesia','r=$r&p=$p&d=".$d."&c=".$c."&i=".$this->resultados[$x]['igl_id']."&pag=".$pag."');\" href=\"#!/r=".$r."&p=".$p."&d=".$d."&c=".$c."&i=".$this->resultados[$x]['igl_id']."&pag=".$pag."\">".$TEXTO['ver_mas']."</a></p>";
			echo '</td>';
			echo '<td width="100" valign="middel" align="center">';
			if($this->resultados[$x]['igl_logo'] == NULL) {
				$logo = "logowho.png";
				$width = 100;
				$height = 100;
			}
			else {
				$logo = $this->resultados[$x]['igl_logo'];
				if(file_exists('archivos_iglesias/logos/'.$logo)) {
					$tmp = getimagesize('archivos_iglesias/logos/'.$this->resultados[$x]['igl_logo']);
					if($tmp[0] > 100 || $tmp[1] > 100) {
						if($tmp[0] > $tmp[1]) {
							$width = 100;
							$height = (100 * $tmp[1])/$tmp[0];
						}
						elseif($tmp[0] < $tmp[1]) {
							$width = (100 * $tmp[0])/$tmp[1];
							$height = 100;
						}
						elseif($tmp[0] == $tmp[1]) {
							$width = 100;
							$height = 100;
						}
					}
					else {
						$width = $tmp[0];
						$height = $tmp[1];
					}
				}
				else {
					$logo = "logowho.png";
					$width = 100;
					$height = 100;
				}
			}
			echo '<img src="archivos_iglesias/logos/'.$logo.'" width="'.$width.'" height="'.$height.'" />';
			echo '</td>';
			echo '</tr>';
			echo '</table>';
			echo '</div>';
		}
		echo '<div id="paginacion">';
		$this->paginacion(NULL, NULL, NULL, $url, $TEXTO);
		echo '</div>';
	}
	
	function buscar($pag = 1, $TEXTO, $lugar_busqueda, $texto_busqueda) {
		$this->pag = $pag;
		$this->bd->tabla("iglesias");
		//echo $texto_busqueda = htmlentities($texto_busqueda);
		$opciones = "INNER JOIN localidades ON iglesias.city_id=localidades.id AND localidades.id_idioma='".$this->l."' ";
		$opciones .= "INNER JOIN regiones ON localidades.id_region=regiones.id AND regiones.id_idioma='".$this->l."' ";
		$opciones .= "INNER JOIN paises ON localidades.id_pais=paises.id AND paises.id_idioma='".$this->l."' ";
		$opciones .= "INNER JOIN continentes ON localidades.id_continente=continentes.id AND continentes.id_idioma='".$this->l."' ";
		$this->bd->datos("COUNT(igl_id) AS total_resultados");
		$trozos = explode("-", $texto_busqueda);
		if(count($trozos) > 1) :
			$i = 0;
			foreach($trozos as $trozo) :
				$trozo = $this->remplazarletrashtml($trozo);
				$trozos[$i] = strip_tags($trozo);
				$i++;
			endforeach;
		else :
			$texto_busqueda = $this->remplazarletrashtml($texto_busqueda);
			$texto_busqueda = strip_tags($texto_busqueda);
		endif;
		if ($lugar_busqueda != 'todos' and count($trozos) == 1) :
			$opciones .= "WHERE $lugar_busqueda REGEXP LOWER('$texto_busqueda')";
		elseif($lugar_busqueda == "todos" and count($trozos) == 1) :
			$opciones .= "WHERE igl_nombre REGEXP LOWER('$texto_busqueda') OR igl_pastor_ppal REGEXP LOWER('$texto_busqueda') 
						  OR paises.nombre REGEXP LOWER('$texto_busqueda') OR localidades.nombre REGEXP LOWER('$texto_busqueda')";
		elseif(count($trozos) > 1 and ($lugar_busqueda == "igl_nombre" || $lugar_busqueda == "igl_pastor_ppal")) :
			$this->bd->datos("iglesias.igl_id, iglesias.igl_nombre, iglesias.igl_pastor_ppal, iglesias.igl_telefono, 
												iglesias.igl_celular, iglesias.igl_pbx, iglesias.igl_logo, iglesias.city_id, 
												localidades.id as loc_id, localidades.nombre as loc_nombre, regiones.id as reg_id, 
												regiones.nombre as reg_nombre, paises.id as pais_id, paises.nombre as pais_nombre, 
												continentes.id as con_id, continentes.nombre as con_nombre");
			$opciones .= "WHERE (igl_nombre REGEXP LOWER('".$trozos[0]."') OR igl_nombre REGEXP LOWER('".$trozos[1]."')) AND
										(igl_pastor_ppal REGEXP LOWER('".$trozos[0]."') OR igl_pastor_ppal REGEXP LOWER('".$trozos[1]."'))";
		elseif(count($trozos) > 1 and ($lugar_busqueda == "paises.nombre" || $lugar_busqueda == 'localidades.nombre')) :
			$this->bd->datos("iglesias.igl_id, iglesias.igl_nombre, iglesias.igl_pastor_ppal, iglesias.igl_telefono, 
												iglesias.igl_celular, iglesias.igl_pbx, iglesias.igl_logo, iglesias.city_id, 
												localidades.id as loc_id, localidades.nombre as loc_nombre, regiones.id as reg_id, 
												regiones.nombre as reg_nombre, paises.id as pais_id, paises.nombre as pais_nombre, 
												continentes.id as con_id, continentes.nombre as con_nombre");
			$opciones .= "WHERE (igl_nombre REGEXP LOWER('".$trozos[1]."')) AND ".
									 "(paises.nombre REGEXP LOWER('".$trozos[0]."') OR paises.nombre REGEXP LOWER('".$trozos[1]."') OR ".
									 "localidades.nombre REGEXP LOWER('".$trozos[0]."') OR localidades.nombre REGEXP LOWER('".$trozos[1]."'))";
		endif;
		$this->bd->opciones($opciones);
		$this->bd->datos("iglesias.igl_id, iglesias.igl_nombre, iglesias.igl_pastor_ppal, iglesias.igl_telefono, 
						  iglesias.igl_celular, iglesias.igl_pbx, iglesias.igl_logo, iglesias.city_id, localidades.id as loc_id, 
						  localidades.nombre as loc_nombre, regiones.id as reg_id, regiones.nombre as reg_nombre, 
						  paises.id as pais_id, paises.nombre as pais_nombre, continentes.id as con_id, 
						  continentes.nombre as con_nombre");
		if(empty($this->pag)) $this->pag = 1;
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();exit;
		$this->bd->ejecutar_query();
		$this->total_iglesias = $this->bd->total_resultados();
		$this->total_paginas = ceil($this->total_iglesias/3);
		$this->bd->limite($this->pag, 3);
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		$this->resultados = $this->bd->array_asociativo();
		//print_r($this->resultados);
		echo "Total iglesias encontradas: ".$this->total_iglesias."<br />";
		if(!empty($this->total_iglesias)) {
			for($x=0; $x<count($this->resultados); ++$x) {
				if($x > 0) echo "<br />";
				echo '<div id="iglesia">';
				echo '<table width="100%" border="0" cellspacing="1" cellpadding="0">';
				echo '<tr>';
				echo '<td valign="top" style="font-size: xx-small">';
				echo '<span id="titulos">'.$this->resultados[$x]['igl_nombre']."</span>";
				echo '<br /><span style="font-size:11px; color:gray">';
				echo $this->resultados[$x]['loc_nombre'].", ".$this->resultados[$x]['reg_nombre'].", ".$this->resultados[$x]['pais_nombre'].", ";
				echo $this->resultados[$x]['con_nombre']."</span>";
				echo '<p>';
				echo $TEXTO['pastor_principal'].' '.ucwords($this->resultados[$x]['igl_pastor_ppal']);
				echo '<br />'.$TEXTO['telefono'].' ';
				if(!empty($this->resultados[$x]['igl_telefono'])) echo $this->resultados[$x]['igl_telefono'];
				elseif(!empty($this->resultados[$x]['igl_celular'])) echo $this->resultados[$x]['igl_celular'];
				elseif(!empty($this->resultados[$x]['igl_pbx'])) echo $this->resultados[$x]['igl_pbx'];
				echo "<br /><a onclick=\"javascript:recargar('iglesia','r=".$this->resultados[$x]['con_id']."&p=".$this->resultados[$x]['pais_id'].
				"&d=".$this->resultados[$x]['reg_id']."&c=".$this->resultados[$x]['city_id']."&i=".$this->resultados[$x]['igl_id'].
				"&pag=".$this->pag."&lb=".$lugar_busqueda."&tb=".$texto_busqueda."&b=true');\" href=\"#\">Ver mas...</a></p>";
				echo '</td>';
				echo '<td width="100" valign="middel" align="center">';
				if($this->resultados[$x]['igl_logo'] == NULL) {
					$logo = "logowho.png";
					$width = 100;
					$height = 100;
				}
				else {
					$logo = $this->resultados[$x]['igl_logo'];
					$tmp = getimagesize('archivos_iglesias/logos/'.$this->resultados[$x]['igl_logo']);
					if($tmp[0] > 100 || $tmp[1] > 100) {
						if($tmp[0] > $tmp[1]) {
							$width = 100;
							$height = (100 * $tmp[1])/$tmp[0];
						}
						elseif($tmp[0] < $tmp[1]) {
							$width = (100 * $tmp[0])/$tmp[1];
							$height = 100;
						}
						elseif($tmp[0] == $tmp[1]) {
							$width = 100;
							$height = 100;
						}
					}
					else {
						$width = $tmp[0];
						$height = $tmp[1];
					}
				}
				echo '<img src="archivos_iglesias/logos/'.$logo.'" width="'.$width.'" height="'.$height.'" />';
				echo '</td>';
				echo '</tr>';
				echo '</table>';
				echo '</div>';
			}
			echo '<div id="paginacion">';
			$this->paginacion(1, $texto_busqueda, $lugar_busqueda, NULL, $TEXTO);
			echo '</div>';
		}
		//echo "<pre>";print_r($this->resultados);echo "</pre>";
	}
	
	function remplazaletras($tex) {
		$cadena_buscar['á'] = "a";
		$cadena_buscar['é'] = "e";
		$cadena_buscar['í'] = "i";
		$cadena_buscar['ó'] = "o";
		$cadena_buscar['ú'] = "u";
		$cadena_buscar['ñ'] = "n";
		$cadena_buscar['Á'] = "A";
		$cadena_buscar['É'] = "E";
		$cadena_buscar['Í'] = "I";
		$cadena_buscar['Ó'] = "O";
		$cadena_buscar['Ú'] = "U";
		$cadena_buscar['Ñ'] = "N";
		
		return $texto = strtr($tex, $cadena_buscar);
	}
	
	function paginacion($op = NULL, $texto_busqueda = NULL, $lugar_busqueda = NULL, $url = NULL, $TEXTO)
	{
		if(empty($this->pag)) $this->pag = 1;
		if(empty($op)) $op = "pasos";
		else $op = "busqueda";
		if(!empty($op)) $busqueda = "&tb=".$texto_busqueda."&lb=".$lugar_busqueda;
		else $busqueda = NULL;
		$anterior = $this->pag - 1;
		$siguiente = $this->pag + 1;
		$a = $this->pag - 3;
		$b = $this->pag + 3;
		if($a <= 1) {
			$a = 2;
			$b = 8;
		}
		if($b >= $this->total_paginas) {
			$b = $this->total_paginas - 1;
			$a = $this->total_paginas - 7;
			if ($a < 1) $a = 2;
		}

		if ($anterior <= 0) $ant = "<span id='pag_sel'>&laquo; ".$TEXTO['anterior']."</span>\n";
		else $ant = "<a href='#' onclick=\"recargar('".$op."','".$url."pag=$anterior".$busqueda."','#texto_pasos')\">&laquo; ".$TEXTO['anterior']."</a>\n"; 
		if ($siguiente > $this->total_paginas) $sig = "<span id='pag_sel'>".$TEXTO['siguiente']." &raquo;</span>\n";
		else $sig = "<a href='#' onclick=\"recargar('".$op."','".$url."pag=$siguiente".$busqueda."','#texto_pasos')\">".$TEXTO['siguiente']." &raquo;</a>\n";

		echo $ant."\n";
		if($this->pag == 1) {
			echo "<span id='pag_sel'>1</span>\n";
			if($this->total_paginas != 1) echo "&nbsp;...&nbsp;\n";
		}
		else {
			echo "<a href='#' onclick=\"recargar('".$op."','".$url."pag=1".$busqueda."','#texto_pasos')\">1</a>\n";
			if($this->total_paginas != 1) echo "&nbsp;...&nbsp;\n";
		}

		for ($i=$a; $i<=$b; $i++) {
			if ($i == $this->pag) echo "<span id='pag_sel'>$i</span>\n";
			else echo "<a href='#' onclick=\"recargar('".$op."','".$url."pag=$i".$busqueda."','#texto_pasos')\">$i</a>\n";
		}

		if($this->pag == $this->total_paginas) {
			if($this->total_paginas != 1) {
				echo "&nbsp;...&nbsp;\n";
				echo "<span id='pag_sel'>$this->total_paginas</span>\n";
			}
		}
		else {
			echo "&nbsp;...&nbsp;\n";
			echo "<a href='#' onclick=\"recargar('".$op."','".$url."pag=$this->total_paginas".$busqueda."','#texto_pasos')\" border='0px'>$this->total_paginas</a>\n";
		}
		echo $sig."\n";
	}
	
	function cargar_abecedario() {
		$this->bd->tabla("glosario");
		$this->bd->datos("DISTINCT(LOWER(LEFT(palabra,1))) AS letra");
		$this->bd->opciones("WHERE id_idioma='".$this->l."' ORDER BY letra ASC");
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		return $this->resultados = $this->bd->array_asociativo();		
	}
	
	function cargar_glosario($letra = NULL) {
		$this->bd->tabla("glosario");
		$this->bd->datos("LOWER(palabra) as palabra, descripcion");
		$opciones = "WHERE id_idioma='".$this->l."'";
		if(!empty($letra)) $opciones .= " AND palabra LIKE LOWER('".$letra."%')";
		$this->bd->opciones($opciones);
		$this->bd->leer_datos();
		//$this->bd->mostrar_sql();
		return $this->resultados = $this->bd->array_asociativo();
	}
	
	public function tooltip($id = NULL) {
		if(!is_null($id)) :
			$this->bd->tabla("estadisticas_regionales");
			$this->bd->datos("datos");
			$this->bd->opciones("WHERE id_campo='".$id."'");
			return $this->bd->dato_unico();
		else : return NULL;
		endif;
	}
	
	public function total_iglesias_pais($id = NULL, $TEXTO) {
		if(!is_null($id)) :
			$this->bd->tabla("iglesias");
			$this->bd->datos("iglesias.igl_id");
			$this->bd->opciones("INNER JOIN localidades ON localidades.id=iglesias.city_id AND localidades.id_pais='".$id."' 
													 GROUP BY iglesias.igl_id");
			$this->bd->leer_datos();
			//$this->bd->mostrar_sql();
			$this->resultados = $this->bd->array_asociativo();
			$this->tresultados = count($this->resultados);
			echo $TEXTO['total_iglesias_pais']." ".number_format($this->tresultados, 0, ",", ".").'<br>';
		endif;
	}
	
	function remplazarletrashtml($tex) {
		$cadena_buscar['á'] = "&aacute;";
		$cadena_buscar['é'] = "&eacute;e";
		$cadena_buscar['í'] = "&iacute;";
		$cadena_buscar['ó'] = "&oacute;";
		$cadena_buscar['ú'] = "&uacute;";
		$cadena_buscar['ñ'] = "&ntilde;";
		$cadena_buscar['Á'] = "&Aacute;";
		$cadena_buscar['É'] = "&Eacute;";
		$cadena_buscar['Í'] = "&Iacute;";
		$cadena_buscar['Ó'] = "&Oacute;";
		$cadena_buscar['Ú'] = "&Uacute;";
		$cadena_buscar['Ñ'] = "&Ntilde;";
		
		return $texto = strtr($tex, $cadena_buscar);
	}
}
?>