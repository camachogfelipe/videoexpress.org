<?php

$user =& JFactory::getUser();
// getting User ID
$userID = $user->get('id');

$register_bool = ($this->countModules('register') && ($this->_tpl->params->get("register_button",1) ? $userID == 0 : true));

?>

	<!-- MAIN NAVIGATION -->
	<?php $this->loadBlock('mainnav') ?>   
	<!-- //MAIN NAVIGATION -->
	

	<?php if( $this->countModules('banner1') ): ?>
	<div id="banner1">
			<jdoc:include type="modules" name="banner1" style="none" />
	</div>
	<?php endif; ?>
	
<div id="gk-header">

	<jdoc:include type="message" />
	
	<?php if($this->countModules('header1 or header2')) : ?>
	<div class="static clearfix">				
		<?php
			$h_class = '';
			
			if($this->countModules('header1 and header2'))
			{
				$h1_width = (float) $this->_tpl->params->get("header1");
				$h2_width = (($this->isIE()) ? 100.0 : 100.0) - $h1_width;
				$h_class = ' both';
			}
			else
			{
				$h1_width = $h2_width = 100;
			}
		?>
		
		<div id="header" class="head clearfix">
			<?php if($this->countModules('header1')) : ?>
			<div id="header1" class="header<?php echo $h_class; ?>" style="width:<?php echo $h1_width; ?>%;">
				<jdoc:include type="modules" name="header1" style="gavickpro" />
			</div>
			<?php endif; ?>
			
			<?php if($this->countModules('header2')) : ?>
			<div id="header2" class="header<?php echo $h_class; ?>" style="width:<?php echo $h2_width; ?>%;">
				<div class="header2-margin">
				<jdoc:include type="modules" name="header2" style="gavickpro" />
				</div>
			</div>
			
			<?php endif; ?>
		</div>	
	</div>
	<?php endif; ?>
</div>


	<?php if( $this->countModules('banner2') ): ?>
	<div id="banner2">
			<jdoc:include type="modules" name="banner2" style="none" />
	</div>
	<?php endif; ?>

