<?php
defined( '_01800' ) or die('Acceso no permitido');

//Clase de estadisticas
class estadisticas {
	private $total_estadisticas;
	private $admin;
	private $bd;
	private $mensajes;
	private $post;
	private $pag;
	
	function __construct() {
		$this->admin = new Administracion();
		$this->bd = new BDManejo($this->pag);
		$this->bd->tabla("estadisticas_regionales");
		$this->bd->datos("COUNT(*)");
		$this->bd->opciones("ORDER BY tabla_campo ASC");
		unset($this->bd->limite);
		$this->total_estadisticas = $this->bd->dato_unico();
		$this->pag = $pag;
		if($this->pag < 1) $this->pag = 1;
	}
	
	public function ver_lista() {
		if(empty($this->total_estadisticas)) :
			$this->mensaje = new mensajes_globales("No existen estadisticas en la base de datos", 1);
		else :
			$this->bd->datos("*");
			$this->bd->leer_datos();
			$this->resultados = $this->bd->array_asociativo();
		endif;
		require_once("forms/lista_estadisticas.php");
	}
	
	public function crear_estadistica() {
		$this->post = $this->admin->cargarRequest($_POST);
		if(!isset($this->post['saveEstadistica'])) :
			$op = 55; $titulo = "Crear";
			require_once("forms/estadistica.php");
		else :
			if(isset($this->post['region']) and isset($this->post['pais']) and isset($this->post['datos'])) :
				$this->bd->columnas("tabla_campo, id_campo, datos, fecha");
				$this->bd->datos("'paises', '".$this->post['pais']."', '".$this->post['datos']."', '".date("Y-m-d")."'");
				$this->bd->insert();
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->desconecta();
				if($this->resultados == 1) {
					$this->mensajes = new mensajes_globales("Los datos estadísticos se han creado con &eacute;xito.", 1);
					$this->mensajes->mostrar_mensaje();
				}
				else {
					$this->mensajes = new mensajes_globales("Los datos estadísticos no se pudieron crear.", 3);
					$this->mensajes->mostrar_mensaje();
				}
				unset($this->form);
			endif;
		endif;
	}
	
	public function editar_estadistica() {
		$this->post = $this->admin->cargarRequest($_REQUEST);
		if(!isset($this->post['saveEstadistica'])) :
			if(isset($this->post['id'])) :
				$op = 56;
				$titulo = "Editar";
				$this->bd->datos("*");
				$this->bd->opciones("WHERE id='".$this->post['id']."'");
				unset($this->post);
				$this->post = $this->bd->fila_unica();
				$this->bd->tabla("paises");
				$this->bd->datos("id_continente");
				$this->bd->opciones("WHERE id='".$this->post['id_campo']."'");
				$this->post['region'] = $this->bd->dato_unico();
			else :
				$op = 55;
				$titulo = "Crear";
			endif;
			require_once("forms/estadistica.php");
		else :
			if(isset($this->post['region']) and isset($this->post['pais']) and isset($this->post['datos'])) :
				$this->bd->datos("id_campo='".$this->post['pais']."',datos='".$this->post['datos']."',fecha='".date("Y-m-d")."'");
				$this->bd->opciones("WHERE id='".$this->post['id']."'");
				$this->bd->actualiza();
				$this->resultados = $this->bd->ejecutar_query();
				$this->bd->desconecta();
				if($this->resultados == 1) {
					$this->mensajes = new mensajes_globales("Los datos estadísticos se actualizado con &eacute;xito.", 1);
					$this->mensajes->mostrar_mensaje();
				}
				else {
					$this->mensajes = new mensajes_globales("Los datos estadísticos no se pudieron actualizar.", 3);
					$this->mensajes->mostrar_mensaje();
				}
				unset($this->form);
			endif;
		endif;
	}
	
	public function eliminar_estadistica() {
		$this->post = $this->admin->cargarRequest($_GET);
		if(isset($this->post['id'])) :
			$this->bd->opciones("WHERE id='".$this->post['id']."'");
			$this->bd->eliminar();
			$this->resultados = $this->bd->ejecutar_query();
			$this->bd->desconecta();
			if($this->resultados == 1) {
				$this->mensajes = new mensajes_globales("Los datos estadísticos se han borrado con &eacute;xito.", 1);
				$this->mensajes->mostrar_mensaje();
			}
			else {
				$this->mensajes = new mensajes_globales("Los datos estadísticos no se pudieron borrar.", 3);
				$this->mensajes->mostrar_mensaje();
			}
			unset($this->form);
			$this->admin = new Administracion();
			$this->bd = new BDManejo($this->pag);
			$this->bd->tabla("estadisticas_regionales");
			$this->bd->datos("COUNT(*)");
			$this->bd->opciones("ORDER BY tabla_campo ASC");
			unset($this->bd->limite);
			$this->total_estadisticas = $this->bd->dato_unico();
			$this->ver_lista();
		endif;
	}
}