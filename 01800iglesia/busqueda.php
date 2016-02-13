<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
error_reporting(0);
if(!isset($_SESSION)) session_start();
if(isset($_REQUEST['pag'])) $pag = $_REQUEST['pag'];
else $pag = 1;
if(empty($_REQUEST['tb']) and empty($_REQUEST['lb'])) header("Location: index.php");
if(empty($_SESSION['lang'])) exit("Acceso restringido");
include("lang/".$_SESSION['lang']."/lang.php");
defined ( '_01800Index' ) or define ( '_01800Index', 1);
require("clases/index.php");
?>
<script type="text/javascript" src="Scripts/jquery-1.9.1.min.js?ver=1.9.1"></script>
<script type="text/javascript" src="Scripts/jquery.tools.min.js"></script>
<script type="text/javascript" language="javascript" src="Scripts/jquery.corner.js"></script>
<script>
jQuery(document).ready(function() {
  	jQuery('.pasos_region2').corner("right");
	jQuery('#paso').corner("tr", "cc:#FFF");
	jQuery('#paso').corner("br", "cc:#FFF");
	jQuery('#texto_pasos').corner("tr", "cc:#FFF");
	jQuery('#texto_pasos').corner("br", "cc:#FFF");
	jQuery('#publicidad').corner("top");
});
</script>
<script type="text/javascript" src="Scripts/publicidad.js"></script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<div id="pasos">
  <div id="mitad_izq" style="min-height:480px">
    <div id="pasos_region2">
      <?php
				$class1 = 4; 
				$id = "4b";
				$esquina = "azul";
				$titulo = $TEXTO['paso4'];
			?>
      <div class="pasos_region2">
        <table border="0" cellspacing="5" cellpadding="0" align="left">
          <tr align="left">
            <td width="5%"><img src="imagenes/numeros-gris01.png" width="24" height="24" /></td>
            <td width="14%"><p><img src="imagenes/okgris.png" width="25" height="25" /></p></td>
            <td width="5%"><img src="imagenes/numeros-gris02.png" width="24" height="24" /></td>
            <td width="14%"><p><img src="imagenes/okgris.png" width="25" height="25" /></p></td>
            <td width="5%"><img src="imagenes/numeros-gris03.png" width="24" height="24" /></td>
            <td width="14%"><p><img src="imagenes/okgris.png" width="25" height="25" /></p></td>
            <td width="5%"><img src="imagenes/numeros-gris04.png" width="24" height="24" /></td>
            <td width="14%"><p><img src="imagenes/okgris.png" width="25" height="25" /></p></td>
            <td width="5%"><img src="imagenes/numeros-05.png" width="24" height="24" /></td>
            <td width="14%"><p><?php echo $titulo ?></p></td>
            <td width="5%"><img src="imagenes/back.png" width="24" title="volver" height="24" border="0" /></td>
          </tr>
        </table>
      </div>
    </div>
    <div id="bandera"><img src="imagenes/esquinas/esquina_izq_gris.png" width="25" height="19" class="bandera2" /></div>
    <div id="paso" class="paso4"> <span id="titulos" class="titulo2-4"> <img src="imagenes/numeros-05.png" width="24" height="24" align="absmiddle" /> <?php echo $titulo; ?> </span>
      <div id="texto_pasos">
        <?php
					//echo "Total Iglesias: ".count($res)." en ".count($res)." Departamentos/Estados<br /><br />";
					$paises = new regiones($pag);
					$lugar_busqueda = mb_strtolower($_REQUEST['lb'], 'UTF-8');
					$texto_busqueda = mb_strtolower($_REQUEST['tb'], 'UTF-8');
					$paises->buscar($pag, $TEXTO, $lugar_busqueda, $texto_busqueda);
				?>
      </div>
    </div>
    <div id="bandera"><img src="imagenes/esquinas/esquina_izq_<?php echo $esquina ?>.png" width="25" height="19" class="bandera2" /></div>
  </div>
  <div id="mitad_der">
    <div id="publicidad">
      <?php
				$txs = 3;
				$minheight = $txs * 228;
				$publicidad->post['opub'] = "iglesia";
				require_once("publicidad.php");
			?>
    </div>
  </div>
</div>