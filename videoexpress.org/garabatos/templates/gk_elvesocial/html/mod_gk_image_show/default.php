<?php

/**
* Gavick Image Show - Style 1
* @package Joomla!
* @Copyright (C) 2009 Gavick.com
* @ All rights reserved
* @ Joomla! is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version $Revision: 1.0.0 $
**/

// access restriction
defined('_JEXEC') or die('Restricted access');

?>

<script type="text/javascript">
	try {$Gavick;}catch(e){$Gavick = {};};
	$Gavick["gk_is-<?php echo $this->module_id;?>"] = {
		"anim_speed": <?php echo $dataForJSEngine["animation_speed"];?>,
		"anim_interval": <?php echo $dataForJSEngine["animation_interval"];?>,
		"anim_type": "<?php echo $dataForJSEngine["animation_type"];?>",
		"preloading": <?php echo $dataForJSEngine["preloading"]; ?>,
		"slide_links": <?php echo $dataForJSEngine["slide_links"]; ?>,
		"actual_animation": false,
		"autoanimation":<?php echo $dataForJSEngine["autoanimation"]; ?>,
		"actual_slide": 0
	};
</script>

<?php if($this->useMoo == 1) : ?><script type="text/javascript" src="<?php echo $uri->root(); ?>modules/mod_gk_image_show/js/style1/mootools.js"></script><?php endif; ?>
<?php if($this->useScript == 1) : ?><script type="text/javascript" src="<?php echo $uri->root(); ?>templates/gk_memovie/js/gk_image_show.js"></script><?php endif; ?>