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
if (!defined ('_GK_IPHONE_MENU_CLASS')) {
	define ('_GK_IPHONE_MENU_CLASS', 1);
	require_once (dirname(__FILE__).DS."base.class.php");

	class GKMenuiphone extends GKMenuBase{

		function __construct (&$params) {
			parent::__construct($params);

			//To show sub menu on a separated place
			$this->showSeparatedSub = true;
		}
		function beginMenu($startlevel=0, $endlevel = 10){
		}
		function endMenu($startlevel=0, $endlevel = 10){
		}
		
		function beginMenuItems($pid=0, $level=0){
			$title = $pid?$this->items[$pid]->name:'Home';
			if (!$pid) {
				echo "<ul id=\"gk-iphonemenu\" title=\"Menu\" class=\"toolbox\">";
			} else {
				echo "<ul id=\"nav$pid\" title=\"{$this->items[$pid]->name}\" class=\"toolbox\">";
			}
		}

		function genMenuItem($item, $level = 0, $pos = '', $ret = 0)
		{			
			$data = parent::genMenuItem($item, $level, $pos, true);
			if (@$this->children [$item->id]) {
				$tmp = $item;				
				$data .= "<a class=\"gk-folder\" href=\"#nav{$tmp->id}\" title=\"{$tmp->name}\"></a>"; 				
			}
			if ($ret) return $data; else echo $data;
		}

		function genMenuItems($pid, $level) {
			if (@$this->children[$pid]) {
				$this->beginMenuItems($pid, $level);
				$i = 0;
				foreach ($this->children[$pid] as $row) {
					$pos = ($i == 0 ) ? 'first' : (($i == count($this->children[$pid])-1) ? 'last' :'');

					$this->beginMenuItem($row, $level, $pos);
					$this->genMenuItem( $row, $level, $pos);

					// show menu with menu expanded - submenus visible
					$i++;

					$this->endMenuItem($row, $level, $pos);
				}
				$this->endMenuItems($pid, $level);
				
				foreach ($this->children[$pid] as $row) {
					if ($level < $this->getParam('endlevel')) $this->genMenuItems( $row->id, $level+1 );
				}
			}
			
		}
		
	}
}
?>
