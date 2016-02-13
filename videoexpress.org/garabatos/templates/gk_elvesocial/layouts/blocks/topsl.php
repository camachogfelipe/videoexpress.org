<?php

	$spotlight0 = array ('top1','top2','top3','top4','top5','top6','top7','top8');
	$topsl1 = $this->calSpotlight ($spotlight0, 100);
		
	if( $topsl1 ) :

?>

<div id="gk-content-top"></div>

<div id="gk-topsl1top" class="main clearfix"></div>

<div id="gk-topsl1" class="main clearfix">	
	<div class="inner ctop<?php if(!$topsl2) echo ' cuser' ?> clearfix">
		<div class="clearfix">
			<?php if( $this->countModules('top1') ): ?>
			<div class="gk-box column gk-box<?php echo $topsl1['top1']['class']; ?>" style="width: <?php echo $topsl1['top1']['width']; ?>;">
				<jdoc:include type="modules" name="top1" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('top2') ): ?>
			<div class="gk-box column gk-box<?php echo $topsl1['top2']['class']; ?>" style="width: <?php echo $topsl1['top2']['width']; ?>;">
				<jdoc:include type="modules" name="top2" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('top3') ): ?>
			<div class="gk-box column gk-box<?php echo $topsl1['top3']['class']; ?>" style="width: <?php echo $topsl1['top3']['width']; ?>;">
				<jdoc:include type="modules" name="top3" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('top4') ): ?>
			<div class="gk-box column gk-box<?php echo $topsl1['top4']['class']; ?>" style="width: <?php echo $topsl1['top4']['width']; ?>;">
				<jdoc:include type="modules" name="top4" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('top5') ): ?>
			<div class="gk-box column gk-box<?php echo $topsl1['top5']['class']; ?>" style="width: <?php echo $topsl1['top5']['width']; ?>;">
				<jdoc:include type="modules" name="top5" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('top6') ): ?>
			<div class="gk-box column gk-box<?php echo $topsl1['top6']['class']; ?>" style="width: <?php echo $topsl1['top6']['width']; ?>;">
				<jdoc:include type="modules" name="top6" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('top7') ): ?>
			<div class="gk-box column gk-box<?php echo $topsl1['top7']['class']; ?>" style="width: <?php echo $topsl1['top7']['width']; ?>;">
				<jdoc:include type="modules" name="top7" style="gavickpro" />
			</div>
			<?php endif; ?>
		
			<?php if( $this->countModules('top8') ): ?>
			<div class="gk-box column gk-box<?php echo $topsl1['top8']['class']; ?>" style="width: <?php echo $topsl1['top8']['width']; ?>;">
				<jdoc:include type="modules" name="top8" style="gavickpro" />
			</div>
			<?php endif; ?>	
		</div>
	</div>		
</div>

<?php endif; ?>


