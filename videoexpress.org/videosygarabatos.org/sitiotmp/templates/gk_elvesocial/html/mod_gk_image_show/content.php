<?php

/**
* Gavick Image Slide I
* @package Joomla!
* @Copyright (C) 2009 Gavick.com
* @ All rights reserved
* @ Joomla! is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version $Revision: 1.0.0 $
**/

// access restriction
defined('_JEXEC') or die('Restricted access');
// vars
$highest_layer = 0;
$URI = JURI::getInstance();
jimport('joomla.utilities.string');

?>

<div id="gk_is-<?php echo $this->ID;?>" class="gk_is_wrapper gk_is_wrapper-style1" style="width: <?php echo $total_block_width; ?>px;">

	<?php if($this->config["preloading"] == 'true') : ?>
	<div class="gk_is_preloader"></div>
	<?php endif; ?>
	
	<div class="gk_is_image" style="width: <?php echo $this->settings["image_x"]; ?>px;height: <?php echo $this->settings["image_y"]; ?>px; ?>">
		<?php for($i = 0; $i < count($this->slides); $i++) : ?>
			
			<?php 
			
				// cleaning variables
				unset($path, $title, $link);
				// creating slide path
				$path = $URI->root().'components/com_gk3_photoslide/thumbs_big/'.$this->slides[$i]["filename"];
				// creating slide title
				$title = htmlspecialchars(($this->slides[$i]["title"] == "") ? $this->slides[$i]["ctitle"] : $this->slides[$i]["title"]);
				$title = JString::substr($title, 0, $this->config['title_charcount']);
				// creating slide link
				$link = ($this->slides[$i]["link_type"] != 0) ? JRoute::_(ContentHelperRoute::getArticleRoute($this->slides[$i]["article"], $this->slides[$i]["cid"], $this->slides[$i]["sid"])) : $this->slides[$i]["link"];	
				
			?>
			
			<?php if($this->config["preloading"] == 'false') : ?>
				<img src="<?php echo $path; ?>" class="gk_is_slide" style="z-index: <?php echo $i+1; ?>;" alt="<?php echo $link; ?>" title="<?php echo $title; ?>" />
			<?php else: ?>
				<div class="gk_is_slide" style="z-index: <?php echo $i+1; ?>;" title="<?php echo $title; ?>"><?php echo $path; ?><a href="<?php echo $link; ?>">link</a></div>
			<?php endif; ?>
			
		<?php endfor; ?>
		
		<?php if($this->config['interface'] == 'true') : ?>
		<div class="gk_is_prev" style="left:<?php echo $this->config['interface_x']; ?>px;bottom:<?php echo $this->config['interface_y']; ?>px;">PREV</div> 
		<div class="gk_is_next" style="left:<?php echo $this->config['interface_x']; ?>px;bottom:<?php echo $this->config['interface_y']; ?>px;">NEXT</div>
		<?php endif; ?>
	</div>
</div>