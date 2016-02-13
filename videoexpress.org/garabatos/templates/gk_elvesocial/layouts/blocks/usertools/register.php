<?php
		
	// no direct access
	defined('_JEXEC') or die('Restricted access');
	
	$url = JURI::getInstance();
	
	$user =& JFactory::getUser();
	// getting User ID
	$userID = $user->get('id');
	
?>

<?php if( $this->countModules('register') && ($this->_tpl->params->get("register_button",1) ? $userID == 0 : true)) : ?>	
<div id="popup_register" class="gk_popup">
	<div class="gk_popup_wrap">
		<div class="gk_popup_close">Close</div>
		<div class="clear"></div>
		<jdoc:include type="modules" name="register" style="none" />
  	</div>
</div>		
<?php endif; ?>		