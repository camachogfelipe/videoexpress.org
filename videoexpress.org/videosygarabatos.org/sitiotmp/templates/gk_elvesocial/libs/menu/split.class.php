<?php

/*
#------------------------------------------------------------------------
# memovie - February 2010 (for Joomla 1.5)
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

defined( '_VALID_MOS' ) or defined('_JEXEC') or die('Restricted access');
if (!defined ('_GK_SPLIT_MENU_CLASS')) {
	define ('_GK_SPLIT_MENU_CLASS', 1);
	require_once (dirname(__FILE__).DS."base.class.php");

	class GKMenuSplit extends GKMenuBase{

		function __construct (&$params) {
			parent::__construct($params);

			//To show sub menu on a separated place
			$this->showSeparatedSub = true;
		}

		function beginMenu($startlevel=0, $endlevel = 10){
			if ($startlevel == 0) {
				echo "<div id=\"gk-splitmenu\" class=\"gk_menu mainlevel clearfix\">\n";
			} else {
				echo "<div class=\"sublevel\">\n";
			}
		}
		function endMenu($startlevel=0, $endlevel = 10){
			echo "\n</div>";
		}
		function beginMenuItems($pid=0, $level=0){
			if ($level == 1)
				echo "<ul class=\"active\">";
			else
				echo "<ul>";
		}
		function genMenu($startlevel=0, $endlevel = 10){
			if ($startlevel == 0) parent::genMenu(0,0);
			else parent::genMenu($startlevel, $endlevel);
		}

		function beginMenuItem($mitem=null, $level = 0, $pos = ''){
			$active = $this->genClass ($mitem, $level, $pos);
			echo "<li ".$active.">";
		}

	}
}
?>
