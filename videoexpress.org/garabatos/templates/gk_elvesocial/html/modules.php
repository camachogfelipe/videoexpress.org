<?php

/*
#------------------------------------------------------------------------
#  - February 2010 (for Joomla 1.5)
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

defined('_JEXEC') or die('Restricted access');

/**

	Version without interface
	
	Attributes:
 	- headerLevel
 	
**/

function modChrome_gavickpro($module, &$params, &$attribs)
{ $badge = preg_match ('/badge/', $params->get('moduleclass_sfx'))?"<span class=\"badge\">&nbsp;</span>\n":"";
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	
	if (!empty ($module->content)) : ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
			<?php if ($module->showtitle) : ?>
				<?php
					
					$part_one = explode(' ', $module->title);
					$part_one = $part_one[0];
					if(count(explode(' ', $module->title)) > 1)
					{
						$part_two = substr($module->title, strpos($module->title,' '));
					}
					else
					{
						$part_two = '';
					}
					
				?>
			
				<h<?php echo $headerLevel; ?>><span><span class="first-word"><?php echo $part_one; ?></span><?php echo $part_two; ?></span><?php echo $badge; ?></h<?php echo $headerLevel; ?>>
			<?php endif; ?>
   			<div class="moduletable_content">
				<?php echo $module->content; ?>
			</div>
		</div>
	<?php endif;
}

function modChrome_gkround($module, &$params, &$attribs)
{
	$badge = preg_match ('/badge/', $params->get('moduleclass_sfx'))?"<span class=\"badge\">&nbsp;</span>\n":"";
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	
	if (!empty ($module->content)) : ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?>">
			<div class="gk_round_t">
				<div></div>
			</div>
			
			<div class="gk_round_m">
				<?php if ($module->showtitle) : ?>
					<?php
						
						$part_one = explode(' ', $module->title);
						$part_one = $part_one[0];
						if(count(explode(' ', $module->title)) > 1)
						{
							$part_two = substr($module->title, strpos($module->title,' '));
						}
						else
						{
							$part_two = '';
						}
						
					?>
				
					<h<?php echo $headerLevel; ?>><span><span class="first-word"><?php echo $part_one; ?></span><?php echo $part_two; ?></span><?php echo $badge; ?></h<?php echo $headerLevel; ?>>
				<?php endif; ?>
				
				<div class="moduletable_content clearfix">
					<?php echo $module->content; ?>
				</div>
			</div>
			
			<div class="gk_round_b">
				<div></div>
			</div>
		</div>
	<?php endif;
}


?>