<?php

/**
* Utils class
* @package News Show Pro GK4
* @Copyright (C) 2009-2010 Gavick.com
* @ All rights reserved
* @ Joomla! is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version $Revision: 4.0.0 $
**/

// no direct access
defined('_JEXEC') or die('Restricted access');

class NSP_GK4_Utils
{
	// Method to cut text with specified limit value and type (characters/words)
	function cutText($text, $limit_value, $limit_type, $at_end)
	{
		if($limit_type == 'words' && $limit_value > 0){
			$temp = explode(' ',$text);
			if(count($temp) > $limit_value){
				for($i=0; $i<$limit_value; $i++) $cutted[$i] = $temp[$i];
				$cutted = implode(' ', $cutted);
				$text = $cutted.$at_end;
			}
		}elseif($limit_type == 'words' && $limit_value == 0){
			return '';
		}else{
			if(JString::strlen($text) > $limit_value){
				$text = JString::substr($text, 0, $limit_value) . $at_end;
			}
		}
		
		return $text;
	}
 	// Method to parse plugin in article content.
	function parsePlugins($text)
	{
		// getting global mainframe
		global $mainframe;
		// getting com_content params
        $params =& $mainframe->getParams('com_content');
        // getting JDispatcher instance
		$dispatcher =& JDispatcher::getInstance();
        // importing plugins
		JPluginHelper::importPlugin('content');
        // creating class
		$data = new stdClass();
		// fill class with content
        $data->text = $text;
        // parsing content
        $dispatcher->trigger('onPrepareContent', array(&$data, & $params, 0 ));
	    // returning parsed content (now with parsed plugin content)
		return $data->text;
	}
	// Method to get Gravatar avatar
	function avatarURL($email, $size){
		return 'http://www.gravatar.com/avatar/'.md5($email).'?s='.$size.'&amp;default='.urlencode(JURI::root().'modules/mod_news_pro_gk4/interface/images/avatar.png');
	}
}

?>