<div id="menu"><?php include("menu_sup_contenido.php") ?></div>
<div id="cont">
<div id="div_izq_contenido">
	<div id="qh" class="titulo_menu_contenido"><span>&iquest;Qu&eacute; hacemos?</span></div>
    <div id="menu_contenido" class="menu_qh">
    	<li><a href="?op=3&s=6" class="<?php if($_GET['s']==6) echo "active" ?>">Arte y Entretenimiento</a></li>
                    <hr size="3" />
    	<li><a href="?op=3&s=4" class="<?php if($_GET['s']==4) echo "active" ?>">Econom&iacute;a y negocios</a></li>
                    <hr size="3" />
        <li><a href="?op=3&s=2" class="<?php if($_GET['s']==2) echo "active" ?>">Educaci&oacute;n</a></li>
                    <hr size="3" />
        <li><a href="?op=3&s=5" class="<?php if($_GET['s']==5) echo "active" ?>">Familia</a></li>
                    <hr size="3" />
        <li><a href="?op=3&s=3" class="<?php if($_GET['s']==3) echo "active" ?>">Gobierno civil y Estado</a></li>
                    <hr size="3" />
    	<li><a href="?op=3&s=1" class="<?php if($_GET['s']==1) echo "active" ?>">Iglesia</a></li>
                    <hr size="3" />
        <li><a href="?op=3&s=7" class="<?php if($_GET['s']==7) echo "active" ?>">Medios de comunicaci&oacute;n</a></li>
    </div>
    <div id="contenido_contenido">
      <div id="div_izq_contenido2">
        <div id="contenido_contenido2">
          <?php
	switch($_GET['s'])
	{
		case 1: ?>
          <span id="titulo_contenido" class="color3">Iglesia:</span>
          <p>Coordinador: Fernando Mendoza</p>
          <p>Dios  nunca dio al hombre una religi&oacute;n, le dio la oportunidad de tener un relaci&oacute;n  intima con su creador. Debemos mostrar en nuestras vidas Su presencia y poder.</p>
          <p>Sue&ntilde;o:</p>
          <p>El Reino de Dios establecido en la tierra&#13;</p>
          <p>&bull;Apoyar a la Iglesia en  el desarrollo de su tarea.</p>
          <p>&bull;Ser aporte en fortalecer  la unidad de la iglesia y las relaciones del cuerpo de liderazgo.</p>
          <p>&bull;Aportar elementos que  ayuden a fortalecer la intimidad del hombre con Dios desde su lugar de trabajo  y expansi&oacute;n del Reino de Dios.</p>
          <p>&nbsp;</p>
          <p>
            <?php break;
		case 2: ?>
            <span id="titulo_contenido" class="color3">Educaci&oacute;n:</span></p>
          <p>Coordinador: Roberto Prada&#13;</p>
          <p>La educaci&oacute;n debe reflejar la verdad acerca de Dios y el  hombre que nos hace libres.&rdquo;El temor del Se&ntilde;or es el principio de la sabidur&iacute;a&rdquo;  y la sabidur&iacute;a es la meta de la educaci&oacute;n.&#13;</p>
          <p>Sue&ntilde;o:</p>
          <p>Crear un centro de pensamiento cristiano&#13;</p>
          <p>&bull;Reuniones semanales para  construir pensamiento cristiano en todas las &aacute;reas.</p>
          <p>&bull;Dar conferencias  edificadoras, donde se ense&ntilde;a la sabidur&iacute;a de Dios en todas las ciencias.&#13;</p>
          <p>&bull;Ense&ntilde;ar los principios  del Reino de Dios.</p>
          <p>&bull;Transmitir la  importancia de la Responsabilidad Social Corporativa.</p>
          <p>
            <?php break;
		case 3: ?>
            <span id="titulo_contenido" class="color3">Gobierno civil y Estado:</span> </p>
          <p>Coordinador: Gilberto Castilla.</p>
          <p>Dios le dio al hombre gobiernos para establecer libertades  y l&iacute;mites. Debemos reflejar su amor y gentileza y su justicia recta en nuestro  gobierno.&#13;</p>
          <p>Sue&ntilde;o:</p>
          <p>Tener un Presidente que gobierne con el temor del  Se&ntilde;or&#13;</p>
          <p>&bull;Capacitar desde la ni&ntilde;ez  en hacer la pol&iacute;tica a la manera de Dios.</p>
          <p>&bull;Construir las bases de  un liderazgo pol&iacute;tico lleno del Esp&iacute;ritu Santo.</p>
          <p>&bull;Ser consejeros de los  l&iacute;deres actuales en la pol&iacute;tica.</p>
          <p>&bull; Ser voz de esperanza.&#13;</p>
          <p>
            <?php break;
		case 4: ?>
            <span id="titulo_contenido" class="color3">Econom&iacute;a y negocios:</span> </p>
          <p>Coordinador: Gilberto Castilla &#13;</p>
          <p>Los negocios est&aacute;n concebidos como lugar de Adoraci&oacute;n a  Dios, de acuerdo a el &aacute;rea del llamado que cada persona ha recibido. All&iacute;  podremos mostrar la integridad, el servicio y disponer de los dones que Dios  nos ha dado para extender Su reino.&#13;</p>
          <p>Sue&ntilde;o:</p>
          <p>Establecer una red de empresarios integros</p>
          <p>&bull;Compartir a nivel  empresarial la importancia de hacer negocios en integridad, como &uacute;nica forma de  acabar con la ruina del pa&iacute;s.</p>
          <p>&bull;Hacer capacitaci&oacute;n  transformadora en las empresas, para vivir libres financieramente.</p>
          <p>&bull;Apoyar todas las otras  esferas de acci&oacute;n. Haciendo negocios.</p>
          <p>&nbsp;</p>
          <p>
            <?php break;
		case 5: ?>
            <span id="titulo_contenido" class="color3">Familia:</span> </p>
          <p>Coordinador: Sara Carolina Jim&eacute;nez&#13;</p>
          <p>Dios form&oacute; al hombre y la mujer en orden para establecer la  familia que refleje Su Gloria.&nbsp; Mostrar  al mundo al Cristo restaurador de las familias.&#13;</p>
          <p>Sue&ntilde;o:</p>
          <p>Crear una Universidad de la Familia&#13;</p>
          <p>&bull;Apoyar a las familias  que tienen miembros en condici&oacute;n de discapacidad.</p>
          <p>&bull;Brindar consejer&iacute;as y  acompa&ntilde;amientos para que las familias sigan construyendo riqueza en todas las  &aacute;reas.</p>
          <p>&bull;Dar conferencias en las  &aacute;reas espiritual, financiera, relacional, liderazgo, emprendimiento y salud. </p>
          <p>
            <?php break;
		case 6: ?>
            <span id="titulo_contenido" class="color3">Arte y entretenimiento</span><span class="color2">:</span></p>
          <p>Coordinador: Esteban Prada</p>
          <p>El Arte y el Entretenimiento debe reflejar la gloria y la  majestad de nuestro creador. Podemos ser instrumentos para celebrar su  creatividad en las artes, m&uacute;sica, deportes, moda, entretenimiento y otras  formas de celebrar.&#13;</p>
          <p>Sue&ntilde;o:</p>
          <p>Crear un instituto art&iacute;sitco de alto impacto.</p>
          <p>&bull;Ense&ntilde;ar  a personas en condici&oacute;n de discapacidad.</p>
          <p>&bull;Formar ni&ntilde;os de bajos  recursos y crear diferentes grupos de expresi&oacute;n art&iacute;stica.</p>
          <p>&bull;Emplear  las artes como contribuci&oacute;n a la soluci&oacute;n de conflictos.</p>
          <p>&bull;Hacer consultor&iacute;as y  coaching empleando las artes.</p>
          <p>
            <?php break;
		case 7: ?>
            <span id="titulo_contenido" class="color3">Medios de comunicaci&oacute;n:</span></p>
          <p>Coordinadora: Cindy  Pereira&#13;</p>
          <p>Dios dio al hombre libertades para comunicar sus  bendiciones, mostrando su misericordia, gentileza, amor, justicia y forma de  Gobierno. Esto es importante hacerlo en los medios masivos de comunicaci&oacute;n,  Radio, TV, Prensa, Internet, Revistas, etc.&#13;</p>
          <p>Sue&ntilde;o:</p>
          <p>Construir un cluster de impacto en comunicaciones&#13;</p>
          <p>&bull;Desde la p&aacute;gina Web  influenciar al mundo para actuar de manera que se muestre el amor de Dios.</p>
          <p>&bull;Publicar libros,  revistas, etc.</p>
          <p>&bull;Ser voz prof&eacute;tica y de  esperanza divina.</p>
          <p>&bull;Trascender los medios  para impactar la juventud y las futuras generaciones creativamente</p>
          <p>
            <?php break;
		default: ?>
            <span id="titulo_contenido" class="color3">Las siete monta&ntilde;as de influencia:</span></p>
          <?php
	   			 break;
	}
	?>
        </div>
      </div>
      <div id="div_der_contenido2"></div>
  </div></div><div id="div_der_contenido"><?php include("banner_vertical.php") ?></div>
</div>