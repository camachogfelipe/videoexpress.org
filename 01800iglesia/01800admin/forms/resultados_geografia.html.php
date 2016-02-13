<div id="resultado">
	<!-- Continentes -->
	<?php
		if(isset($this->resultados['continentes']) and !empty($this->resultados['continentes'])) :
	?>
  <h3 id="titulos">Continentes <?= count($this->resultados['continentes']) ?> resultado(s)</h3>
  <ul>
  <?php
		foreach($this->resultados['continentes'] as $continentes) :
	?>
  	<li><div id="id"><?= $continentes['id'] ?></div><div id="nombre"><?= $continentes['nombre'] ?></div></li>
  <?php
		endforeach;
	?>
  </ul>
  <?php
		endif;
  ?>
  <!-- Paises -->
  <?php
		if(isset($this->resultados['paises']) and !empty($this->resultados['paises'])) :
	?>
  <h3 id="titulos">Paises <?= count($this->resultados['paises']) ?> resultado(s)</h3>
  <ul>
  <?php
		foreach($this->resultados['paises'] as $paises) :
	?>
  	<li><div id="id"><?= $paises['id'] ?></div><div id="nombre"><?= $paises['nombre']." - ".$paises['continente_nombre'] ?></div></li>
  <?php
		endforeach;
	?>
  </ul>
  <?php
		endif;
  ?>
  <!-- Departamentos -->
  <?php
		if(isset($this->resultados['deptos']) and !empty($this->resultados['deptos'])) :
	?>
  <h3 id="titulos">Departamentos y/o regiones <?= count($this->resultados['deptos']) ?> resultado(s)</h3>
  <ul>
  <?php
		foreach($this->resultados['deptos'] as $deptos) :
	?>
  	<li><div id="id"><?= $deptos['id'] ?></div><div id="nombre"><?=
			$deptos['nombre']." - ".$deptos['pais_nombre']." - ".$deptos['continente_nombre'] ?></div></li>
  <?php
		endforeach;
	?>
  </ul>
  <?php
		endif;
  ?>
  <!-- Ciudades -->
  <?php
		if(isset($this->resultados['ciudades']) and !empty($this->resultados['ciudades'])) :
	?>
  <h3 id="titulos">Ciudades y/o municipios <?= count($this->resultados['ciudades']) ?> resultado(s)</h3>
  <ul>
  <?php
		foreach($this->resultados['ciudades'] as $ciudades) :
	?>
  	<li><div id="id"><?= $ciudades['id'] ?></div><div id="nombre"><?= 
			utf8_encode($ciudades['nombre'])." - ".utf8_encode($ciudades['region_nombre'])." - ".$ciudades['pais_nombre']." - ".$ciudades['continente_nombre'] ?></div></li>
  <?php
		endforeach;
	?>
  </ul>
  <?php
		endif;
  ?>
</div>