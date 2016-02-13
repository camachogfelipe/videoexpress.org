<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Galeria de imagenes</title>
		<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
		<script src="scripts/mootools-1.2.1-core-yc.js" type="text/javascript"></script>
		<script src="scripts/mootools-1.2-more.js" type="text/javascript"></script>
		<script src="scripts/jd.gallery.js" type="text/javascript"></script>
		<script src="scripts/jd.gallery.set.js" type="text/javascript"></script>
	</head>
	<body>
		<script type="text/javascript">
			window.addEvent('domready', function() {
				document.myGallerySet = new gallerySet($('myGallerySet'), {
					timed: false
				});
			});
		</script>
		<div class="content">
			<div id="myGallerySet">
				<div id="galeria2" class="galleryElement">
					<h2>Inauguración</h2>
					<?php
					 for ($i=1 ; $i<=10; $i++) echo "<div class=\"imageElement\">
						<h3>inauguracion ($i)</h3>
						<p>Item $i Description</p>
						<a href=\"#\" title=\"Abrir Imagen\" class=\"open\"></a>
						<img src=\"fotos/inauguracion/inauguracion ($i).jpg\" class=\"full\" />
						<img src=\"fotos/inauguracion/inauguracion ($i).jpg\" class=\"thumbnail\" />
					    </div>";
					?>
				</div>
				<div id="galeria3" class="galleryElement">
					<h2>Otros</h2>
					<?php
					 for ($i=1 ; $i<=30; $i++) echo "<div class=\"imageElement\">
						<h3>Otras ($i)</h3>
						<p>Item $i Description</p>
						<a href=\"#\" title=\"Abrir Imagen\" class=\"open\"></a>
						<img src=\"fotos/otros/otros ($i).JPG\" class=\"full\" />
						<img src=\"fotos/otros/otros ($i).JPG\" class=\"thumbnail\" />
					    </div>";
					?>
					</div>
				<div id="galeria1" class="galleryElement">
					<h2>Taller mentor padres</h2>
					<?php
					 for ($i=1 ; $i<=1; $i++) echo "<div class=\"imageElement\">
						<h3>Taller mentor padres ($i)</h3>
						<p>Item $i Description</p>
						<a href=\"#\" title=\"Abrir Imagen\" class=\"open\"></a>
						<img src=\"fotos/Taller mentor padres/Tallermentorpadres ($i).jpg\" class=\"full\" />
						<img src=\"fotos/Taller mentor padres/Tallermentorpadres ($i).jpg\" class=\"thumbnail\" />
					    </div>";
					?>
					</div>
				<div id="galeria4" class="galleryElement">
                    			<h2>Chocolat factory</h2>
                    			<?php
			                 for ($i=1 ; $i<=18; $i++) echo "<div class=\"imageElement\">
                        			<h3>chocolat_factory ($i)</h3>
                        			<p>Item $i Description</p>
                        			<a href=\"#\" title=\"Abrir Imagen\" class=\"open\"></a>
                        			<img src=\"fotos/chocolat_factory/chocolat_factory ($i).jpg\" class=\"full\" />
                        			<img src=\"fotos/chocolat_factory/chocolat_factory ($i).jpg\" class=\"thumbnail\" />
                        		     </div>";
                    			?>
                    			</div>
				<div id="galeria5" class="galleryElement">
                    			<h2>Saint Johns Festival</h2>
                    			<?php
			                 for ($i=1 ; $i<=21; $i++) echo "<div class=\"imageElement\">
                        			<h3>Saint_Johns_Festival $i</h3>
                        			<p>Item $i Description</p>
                        			<a href=\"#\" title=\"Abrir Imagen\" class=\"open\"></a>
                        			<img src=\"fotos/Saint_Johns_Festival/Saint_Johns_Festival $i.jpg\" class=\"full\" />
                        			<img src=\"fotos/Saint_Johns_Festival/Saint_Johns_Festival $i.jpg\" class=\"thumbnail\" />
                        		     </div>";
                    			?>
                    			</div>
				<div id="galeria6" class="galleryElement">
                    			<h2>Vida en el liceo</h2>
                    			<?php
			                 for ($i=1 ; $i<=33; $i++) echo "<div class=\"imageElement\">
                        			<h3>Anglo Agosto 2010_$i</h3>
                        			<p>Item $i Description</p>
                        			<a href=\"#\" title=\"Abrir Imagen\" class=\"open\"></a>
                        			<img src=\"fotos/vida_en_el_liceo/Anglo Agosto 2010_$i.jpg\" class=\"full\" />
                        			<img src=\"fotos/vida_en_el_liceo/Anglo Agosto 2010_$i.jpg\" class=\"thumbnail\" />
                        		     </div>";
                    			?>
                    			</div>
                    	</div>
                </div>
	</body>
</html>