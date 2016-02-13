<?php

$user =& JFactory::getUser();
// getting User ID
$userID = $user->get('id');

$register_bool = ( $this->countModules('register') && ($this->_tpl->params->get("register_button",1) ? $userID == 0 : true));
?>

<div id="top-nav" class="clearfix">
	<?php
		$siteName = $this->sitename();
		if ($this->getParam('logoType')=='image'): 
	?>
	
	<h1 class="logo">
		<a href="index.php" title="<?php echo $siteName; ?>"><span><?php echo $siteName; ?></span></a>
	</h1>
	
	<?php else : ?>
		
		<?php 
			$logoText = (trim($this->getParam('logoType-text-logoText'))=='') ? $config->sitename : $this->getParam('logoType-text-logoText');
			$sloganText = (trim($this->getParam('logoType-text-sloganText'))=='') ? JText::_('SITE SLOGAN') : $this->getParam('logoType-text-sloganText');
		?>
	
	<div class="logo-text">
		<h1><a href="index.php" title="<?php echo $siteName; ?>"><span><?php echo $logoText; ?></span></a></h1>
		<p class="site-slogan"><?php echo $sloganText;?></p>
	</div>
			
	<?php endif; ?>
	
	
	 
	
	
		<!-- POPUPS -->
		<?php $this->loadBlock('usertools/login'); ?>
		<?php $this->loadBlock('usertools/register'); ?>  
		<!-- //POPUPS -->

	
	<div id="gk-mainnav" class="clearfix">
	<?php if (($gkmenu = $this->loadMenu())) $gkmenu->genMenu ($this->getParam('startlevel',0), $this->getParam('endlevel',-1)); ?>
	</div>
	
	<?php if ($this->hasSubmenu() && ($gkmenu = $this->loadMenu())) : ?>
	<div id="gk-subnav" class="clearfix">
		<?php $gkmenu->genMenu (1); ?>
	</div>
	<?php endif;?>

	
	<?php if( $this->countModules('search') ): ?>
	<div id="search">
			<jdoc:include type="modules" name="search" style="none" />
	</div>
	<?php endif; ?>
</div>

<ul class="no-display">
    <li><a href="<?php echo $this->getCurrentURL();?>#gk-content" title="<?php echo JText::_("Skip to content");?>"><?php echo JText::_("Skip to content");?></a></li>
</ul>