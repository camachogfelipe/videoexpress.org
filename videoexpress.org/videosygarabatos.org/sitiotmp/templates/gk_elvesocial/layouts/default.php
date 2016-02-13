<?php

/*
#------------------------------------------------------------------------
# elvesocial - May 2010 UPDATE (for Joomla 1.5)
#
# Copyright (C) 2007-2010 Gavick.com. All Rights Reserved.
# License: Copyrighted Commercial Software
# Website: http://www.gavick.com
# Support: support@gavick.com   
#------------------------------------------------------------------------ 
# Based on T3 Framework
#------------------------------------------------------------------------
# Copyright (C) 2004-2009 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
# @license - GNU/GPL, http://www.gnu.org/copyleft/gpl.html
# Author: J.O.O.M Solutions Co., Ltd
# Websites: http://www.joomlart.com - http://www.joomlancers.com
#------------------------------------------------------------------------
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$this->_basewidth = 20;
$positions = array (
	'left1'					=>'left1',
	'left2'					=>'left2',
	'left-mass-top'			=>'left_top',
	'left-mass-bottom'		=>'left_bottom',
	'right1'				=>'right1',
	'right2'				=>'right2',
	'right-mass-top'		=>'right_top',
	'right-mass-bottom'		=>'right_bottom',
	'content-mass-top'		=>'top',
	'content-mass-bottom'	=>'bottom',
	'content-top'			=>'adv_top',
	'content-bottom'		=>'adv_bottom',
	'inset1'				=>'inset1',
	'inset2'				=>'inset2'
);
$this->customwidth('right1', $this->_tpl->params->get("right1_column"));
$this->customwidth('right2', $this->_tpl->params->get("right2_column"));
$this->customwidth('left1', $this->_tpl->params->get("left1_column"));
$this->customwidth('left2', $this->_tpl->params->get("left2_column"));
$this->customwidth('inset1', $this->_tpl->params->get("inset1_column"));
$this->customwidth('inset2', $this->_tpl->params->get("inset2_column"));

$this->definePosition ($positions);

$user =& JFactory::getUser();
// getting User ID
$userID = $user->get('id');

?>

<?php if ($this->isIE() && ($this->getParam('direction')=='rtl' || $this->direction == 'rtl')) { ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php } else { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php } ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
	<?php $this->loadBlock('head') ?>
</head>
<body id="bd" class="fs<?php echo $this->getParam(GK_TOOL_FONT);?> <?php echo $this->browser();?>">
	<?php if($this->isIE6() && $this->_tpl->params->get('ie6bar') == 1) : ?>
	<div id="infobar"><a href="http://browsehappy.com"><?php echo JText::_('IE6_BAR'); ?></a></div>
	<?php endif; ?>

<div id="gk-bg">
	<div id="gk-wrapper" class="main">
		<a name="Top" id="Top"></a>
 
 	
		<!-- HEADER -->
		<?php $this->loadBlock('header') ?> 
		<!-- //HEADER -->
		
		
		<?php if($this->checkComponent() || $this->checkMainbody()) : ?>
			
		<!-- MAIN CONTAINER -->
		<div id="gk-container">
			<div class="static clearfix">
			
				<?php $this->loadBlock('topsl') ?>
	
				<?php $this->loadBlock('breadcrumbs') ?> 
				<?php $this->loadBlock('breadcrumb') ?> 
					
				 <div id="gk-mainbody" style="width:<?php echo $this->getColumnWidth('mw') ?>%"> 
					
					<?php $this->loadBlock('main') ?>
					<?php $this->loadBlock('left') ?>
				 </div> 
	
				<?php $this->loadBlock('right') ?>
			</div>		
		</div>
		<!-- //MAIN CONTAINER -->
		
		<?php endif; ?>
		

	
		<?php $this->loadBlock('botsl') ?>
	
		<!-- FOOTER -->
		<?php $this->loadBlock('footer') ?>
		<!-- //FOOTER -->
	
	</div>
	
	<?php if($this->_tpl->params->get('t3_logo')) : ?>
	<a href="http://wiki.joomlart.com/wiki/JA_Template_Framework/Overview" target="_blank" id="t3_logo">Powered by T3 Framework</a>
	<?php endif; ?>
	<jdoc:include type="modules" name="debug" />
</div>
</body>
</html>
