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

function $(el){
	if (!el) return null;
	if (el.htmlElement) return Garbage.collect(el);
	if ([window, document].contains(el)) return el;
	var type = $type(el);
	if (type == 'string'){
		el = document.getElementById(el);
		type = (el) ? 'element' : false;
	}
	if (type != 'element') return null;
	if (el.htmlElement) return Garbage.collect(el);
	if (['object', 'embed'].contains(el.tagName.toLowerCase())) return el;
	$extend(el, Element.prototype);
	el.htmlElement = function(){};
	return Garbage.collect(el);
};

window.addEvent ('load', function() {
	if (!$('gk-subnav') || !$('gk-subnav').getElement('ul')) return;
	var sfEls = $('gk-subnav').getElement('ul').getChildren();
	sfEls.each (function(li){
		li.addEvent('mouseenter', function(e) {
			clearTimeout(this.timer);
			if(this.className.indexOf(" hover") == -1)
				this.className+=" hover";
		});
		li.addEvent('mouseleave', function(e) {
			//this.className=this.className.replace(new RegExp(" hover\\b"), "");
			this.timer = setTimeout(gksdl_sub_mouseOut.bind(this), 100);
		});
	});
});

function gksdl_sub_mouseOut () {
	this.className=this.className.replace(new RegExp(" hover\\b"), "");
}
