<?php
$resultados = $publicidad->avisos_publicidad_index();
$tpub = count($resultados);
if($tpub > 0) {
?>
<style>
/* main vertical scroll */
#mycarousel {
	position:relative;
	overflow:hidden;
	height: <?php echo $minheight ?>px;
	padding: 0;
	margin-top: -20px;
}

/* root element for pages */
#pages2 {
	padding: 0;
	position:absolute;
	height:20000em;
}

/* single page */
.page2 {
	padding:0;
	height: <?php echo $minheight ?>px;
	width: 280px;
	float: left;
}

/* root element for horizontal scrollables */
.scrollable2 {
	overflow:hidden;
	width: 280px;
	height: <?php echo $minheight ?>px;
	float: left;
}

/* root element for scrollable items */
.scrollable2 .items2 {
	width:20000em;
	position:absolute;
}

/* single scrollable item */
.items2 .item2 {
	float:left;
	width:280px;
	margin-left: 3px;
	height: <?php echo $minheight ?>px;
}
</style>
<div class="mycarousel" id="mycarousel">
	<div id="pages2">
    	<div class="page2">
        	<div class="scrollable2" id="scrollable2">
				<div class="items2">
                <?php
				$y = 0;
				echo '<div class="item2">'."\n";
				for($x=0; $x<$tpub; $x++) {
					echo '<div id="caja_publicidad">'."\n";
					echo '	<img id="logo_caja_publicidad" src="logos_publicidad/'.$resultados[$x]['pub_logo'].'" width="90" height="90" />'."\n";
					echo '	<p id="texto_caja_publicidad">'."\n";
					echo '		<span id="titulos">'.$resultados[$x]['pub_empresa'].'</span>'."\n";
					echo '		<br /><br />'.$resultados[$x]['pub_texto']."\n";
					echo '		<br /><br />'."\n";
					echo '		<a href="'.$resultados[$x]['pub_web'].'">'.$resultados[$x]['pub_empresa'].'</a><br>'."\n";
					echo '		<span id="titulos" style="font-size: 14px">'.$resultados[$x]['pub_telefono'].'</span>'."\n";
					echo '	</p>'."\n";
					echo '</div>'."\n";
					$y++;
					if($y == $txs) {
						echo '</div>'."\n";
						$t = $x+1;
						if(!empty($resultados[$t])) echo '<div class="item2">'."\n";
						$y = 0;
					}
				}
				?>
				</div>
			</div>
	    </div>
	</div>
</div>
<?php
}
?>