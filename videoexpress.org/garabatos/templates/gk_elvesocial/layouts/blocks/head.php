<?php if($this->_tpl->params->get("chrome_frame")) : ?>
<meta http-equiv="X-UA-Compatible" content="chrome=1"/>
<?php endif; ?>

<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>

<?php if (!$this->isIE6()) : ?>

<?php
	// Loading DomReady fix for IE browser
	$document =& JFactory::getDocument();
	$headData = $document->getHeadData();
	$scripts_array_keys = array_keys($headData['scripts']);
	$headData['scripts'] = array();
	foreach($scripts_array_keys as $key)
	{
		$headData['scripts'][$key] = 'text/javascript';
		
		if(preg_match('/mootools.js/',$key))
		{
			$headData['scripts'][$this->templateurl().'/js/domready_fix.js'] = 'text/javascript';
		}
	}
	$document->setHeadData($headData);
?>

<link rel="stylesheet" href="<?php echo $this->baseurl(); ?>templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl(); ?>templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->templateurl(); ?>/css/addons.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->templateurl(); ?>/css/layout.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->templateurl(); ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->templateurl(); ?>/css/joomla.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->templateurl(); ?>/css/gk_stuff.css" type="text/css" />

<!--[if lt IE 8.0]>
<link rel="stylesheet" href="<?php echo $this->templateurl(); ?>/css/ie.css" type="text/css" />
<![endif]-->

<!--[if IE 8.0]>
<link rel="stylesheet" href="<?php echo $this->templateurl(); ?>/css/ie8.css" type="text/css" />
<![endif]-->

<!--[if IE 7.0]>
<style>
.clearfix { display: inline-block; } /* IE7xhtml*/
</style>
<![endif]-->

<script type="text/javascript">
var siteurl='<?php echo $this->baseurl();?>';
var tmplurl='<?php echo $this->templateurl();?>';
</script>

<script language="javascript" type="text/javascript" src="<?php echo $this->templateurl(); ?>/js/gk.script.js"></script>

<?php if (($gkmenu = $this->loadMenu())) $gkmenu->genMenuHead (); ?>

<?php $this->loadBlock('cufon'); ?>

<!--Width of template -->
<style type="text/css">
.main {width: <?php echo $this->getParam('tmplWidth', 'auto', true); ?>;margin: 0 auto;}
</style>

<link rel="stylesheet" href="<?php echo $this->templateurl(); ?>/css/typo.css" type="text/css" />

<link href="<?php echo $this->templateurl(); ?>/css/style<?php if($this->_tpl->params->get("stylearea")){ echo (isset($_COOKIE['gk35_style']) ? $_COOKIE['gk35_style'] : $this->_tpl->params->get("template_color"));} else {echo $this->_tpl->params->get("template_color");} ?>.css" rel="stylesheet" media="all" type="text/css" />

<?php else : ?>
<link href="<?php echo $this->templateurl(); ?>/css/ie6.css" rel="stylesheet"/>
<?php endif; ?> 