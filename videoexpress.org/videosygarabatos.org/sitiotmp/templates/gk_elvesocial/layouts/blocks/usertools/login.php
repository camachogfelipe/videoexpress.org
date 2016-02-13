<?php
		
	// no direct access
	defined('_JEXEC') or die('Restricted access');
	
?>

<?php if($this->countModules('login')) : ?>
<div id="popup_login" class="gk_popup">
	<div class="gk_popup_wrap">
		<div class="gk_popup_close">Close</div>
		<div class="clear"></div>
		<div class="gk_popup_content">
			<?php if($this->countModules('user_menu')) : ?>
			<div class="popup_col">
				<jdoc:include type="modules" name="user_menu" style="none" />
			</div>
			<?php endif; ?>
			<div class="popup_col">
				<jdoc:include type="modules" name="login" style="none" />
			</div>
		</div>
  	</div>
</div>
<?php endif; ?>	