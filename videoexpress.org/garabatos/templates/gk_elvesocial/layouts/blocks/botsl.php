<?php

	$spotlight1 = array ('bottom1','bottom2','bottom3','bottom4','bottom5','bottom6','bottom7','bottom8');
	$botsl1 = $this->calSpotlight ($spotlight1, 100);
	
	$spotlight2 = array ('bottom9','bottom10','bottom11','bottom12','bottom13','bottom14','bottom15','bottom16');
	$botsl2 = $this->calSpotlight ($spotlight2, 100);
	
	if( $botsl1 ) :

?>

<div id="gk-botsl1top" class="main clearfix"></div>

<div id="gk-botsl1" class="main clearfix">	
	<div class="inner ctop<?php if(!$botsl2) echo ' cbottom' ?> clearfix">
		<div class="clearfix">
			<?php if( $this->countModules('bottom1') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl1['bottom1']['class']; ?>" style="width: <?php echo $botsl1['bottom1']['width']; ?>;">
				<jdoc:include type="modules" name="bottom1" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom2') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl1['bottom2']['class']; ?>" style="width: <?php echo $botsl1['bottom2']['width']; ?>;">
				<jdoc:include type="modules" name="bottom2" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom3') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl1['bottom3']['class']; ?>" style="width: <?php echo $botsl1['bottom3']['width']; ?>;">
				<jdoc:include type="modules" name="bottom3" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom4') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl1['bottom4']['class']; ?>" style="width: <?php echo $botsl1['bottom4']['width']; ?>;">
				<jdoc:include type="modules" name="bottom4" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom5') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl1['bottom5']['class']; ?>" style="width: <?php echo $botsl1['bottom5']['width']; ?>;">
				<jdoc:include type="modules" name="bottom5" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom6') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl1['bottom6']['class']; ?>" style="width: <?php echo $botsl1['bottom6']['width']; ?>;">
				<jdoc:include type="modules" name="bottom6" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom7') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl1['bottom7']['class']; ?>" style="width: <?php echo $botsl1['bottom7']['width']; ?>;">
				<jdoc:include type="modules" name="bottom7" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom8') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl1['bottom8']['class']; ?>" style="width: <?php echo $botsl1['bottom8']['width']; ?>;">
				<jdoc:include type="modules" name="bottom8" style="gavickpro" />
			</div>
			<?php endif; ?>	
		</div>
	</div>		
</div>

<?php endif; ?>



<?php if( $botsl2 ) : ?>

<div id="gk-botsl2top" class="main clearfix"></div>

<div id="gk-botsl2" class="main clearfix">	
	<div class="inner ctop cbottom clearfix">	
		<div class="clearfix">
			<?php if( $this->countModules('bottom9') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl2['bottom9']['class']; ?>" style="width: <?php echo $botsl2['bottom9']['width']; ?>;">
				<jdoc:include type="modules" name="bottom9" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom10') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl2['bottom10']['class']; ?>" style="width: <?php echo $botsl2['bottom10']['width']; ?>;">
				<jdoc:include type="modules" name="bottom10" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom11') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl2['bottom11']['class']; ?>" style="width: <?php echo $botsl2['bottom11']['width']; ?>;">
				<jdoc:include type="modules" name="bottom11" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom12') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl2['bottom12']['class']; ?>" style="width: <?php echo $botsl2['bottom12']['width']; ?>;">
				<jdoc:include type="modules" name="bottom12" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom13') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl2['bottom13']['class']; ?>" style="width: <?php echo $botsl2['bottom13']['width']; ?>;">
				<jdoc:include type="modules" name="bottom13" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom14') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl2['bottom14']['class']; ?>" style="width: <?php echo $botsl2['bottom14']['width']; ?>;">
				<jdoc:include type="modules" name="bottom14" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom15') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl2['bottom15']['class']; ?>" style="width: <?php echo $botsl2['bottom15']['width']; ?>;">
				<jdoc:include type="modules" name="bottom15" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('bottom16') ): ?>
			<div class="gk-box column gk-box<?php echo $botsl2['bottom16']['class']; ?>" style="width: <?php echo $botsl2['bottom16']['width']; ?>;">
				<jdoc:include type="modules" name="bottom16" style="gavickpro" />
			</div>
			<?php endif; ?>	
		</div>	
	</div>		
</div>

<?php endif; ?>