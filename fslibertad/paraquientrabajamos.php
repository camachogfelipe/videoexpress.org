<div id="menu">
  <?php include("menu_sup_contenido.php") ?>
</div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="pqt" class="titulo_menu_contenido"><span>Para quien trabajamos</span></div>
    <div id="menu_contenido" class="menu_pqt">
    	<li><a href="?op=2&s=1" class="<?php if($_GET['s']==1) echo "active" ?>">Servicios</a></li>
    </div>
    <div id="contenido_contenido">
      <p>
        <?php
	switch($_GET['s'])
	{
		case 1	:	cargar_informacion_gral($_GET['op'], "servicios");
					break;
		default	:	cargar_informacion_gral($_GET['op'], "pqtgral");
					break;
	}
	?>
    </div>
</div>
<div id="div_der_contenido">
  <?php include("banner_vertical.php") ?>
</div>
</div>