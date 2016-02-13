<div id="gk-footer" class="wrap">
	<div class="main clearfix">
		<div class="inner">
			<div class="gk-footnav">
				<jdoc:include type="modules" name="footnav" />
			</div>
		
			<div class="gk-copyright">
				<?php

					if (($mobile = $this->mobile_device_detect())) : 
						$handheld_view = $this->getParam('ui');
						$switch_to = $handheld_view=='desktop'?'default':'desktop';
						$text = $handheld_view=='desktop'?'Mobile Version':'Desktop Version';
				?>

					<a class="gk-tool-switchlayout" href="<?php echo JURI::base()?>?ui=<?php echo $switch_to?>" title="<?php echo JText::_($text)?>"><span><?php echo JText::_($text)?></span></a>

				<?php endif ; ?>
				<?php echo $this->_tpl->params->get("footer_content"); ?>
			</div>
		</div>
	</div>
</div>