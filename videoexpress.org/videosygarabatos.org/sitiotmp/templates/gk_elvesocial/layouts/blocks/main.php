<!-- CONTENT -->

<div id="gk-main" style="width:<?php echo $this->getColumnWidth('m') ?>%">

	<?php if( $this->countModules('breadcrumb') ): ?>
		<div class="gk-mass gk-mass-top clearfix inner ctop cleft cright">
			<jdoc:include type="modules" name="breadcrumb" style="none" />
		</div>
	<?php endif; ?>

	
	<div class="inner ctop cbottom cleft cright clearfix">
	
		<?php 
		$mass_top    = $this->getPositionName ('content-mass-top');
		$mass_bottom = $this->getPositionName ('content-mass-bottom');
		
		if($this->countModules($mass_top)) : ?>
		<div class="gk-mass gk-mass-top clearfix inner ctop cleft cright">
			<jdoc:include type="modules" name="<?php echo $mass_top;?>" style="gavickpro" />
		</div>
		<?php endif; ?>
	
		<div id="gk-contentwrap">
			<?php
			$inset1 = $this->getPositionName ('inset1');
			$inset2 = $this->getPositionName ('inset2');
			?>
			<div id="gk-content" class="column" style="width:<?php echo $this->getColumnWidth('cw') ?>%">
	
				<div id="gk-current-content" class="column" style="width:<?php echo $this->getColumnWidth('c') ?>%">
				
					<?php 
						$content_top = $this->getPositionName ('content-top');
						if($this->countModules($content_top)) : 
					?>
					<div class="gk-content-top clearfix">
						<div class="inner ctop cleft cright">
							<jdoc:include type="modules" name="<?php echo $content_top;?>" style="gavickpro" />
						</div>
					</div>
					<?php endif; ?>
	
					<?php 	
							
						if($this->checkComponent() || $this->checkMainbody()) : 
					?>
						<div id="component_wrap" class="clear">
						
							<div class="inner cleft cright ctop"> 
							
								<?php if($this->_tpl->params->get('mainbody_pos') == 0) : ?>
								<div id="component" class="clear">
									<jdoc:include type="component" />
								</div>
								<?php elseif($this->_tpl->params->get('mainbody_pos') == 1) : ?>
									<?php if($this->checkMainbody()) : ?>
										<div id="mainbody">
											<jdoc:include type="modules" name="mainbody" style="gavickpro" />
										</div>
									<?php elseif($this->checkComponent()) : ?>
									<div id="component" class="clear">
										<jdoc:include type="component" />
									</div>
									<?php endif; ?>
								<?php elseif($this->_tpl->params->get('mainbody_pos') == 2) : ?>
										<?php if($this->checkMainbody()) : ?>
										<div id="mainbody" class="clear">
											<jdoc:include type="modules" name="mainbody" style="gavickpro" />
										</div>
										<?php endif; ?>
									
										<?php if($this->checkComponent()) : ?>
										<div id="component" class="clear">
											<jdoc:include type="component" />
										</div>
										<?php endif; ?>
										
								<?php else : ?>
										<?php if($this->checkComponent()) : ?>
										<div id="component" class="clear">
											<jdoc:include type="component" />
										</div>
										<?php endif; ?>
										<?php if($this->checkMainbody()) : ?>
										<div id="mainbody" class="clear">
											<jdoc:include type="modules" name="mainbody" style="gavickpro" />
										</div>
										<?php endif; ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>	
	
					<?php 
						$content_bottom = $this->getPositionName ('content-bottom');
						if($this->countModules($content_bottom)) : 
					?>
					<div class="gk-content-bottom clearfix">
						<div class="inner ctop">
							<jdoc:include type="modules" name="<?php echo $content_bottom;?>" style="gavickpro" />
						</div>
					</div>
					<?php endif; ?>
				</div>
	
				<?php 
					if($this->countModules($inset1)) : 
				?>
				<div class="gk-col column gk-inset1" style="width:<?php echo $this->getColumnWidth('i1') ?>%">
					<div class="inner cleft ctop ">	
						<jdoc:include type="modules" name="<?php echo $inset1;?>" style="gavickpro" />
					</div>
				</div>
				<?php endif; ?>
	
			</div>
			
			<?php 
				if($this->countModules($inset2)) : 
			?>
			<div class="gk-col column gk-inset2" style="width:<?php echo $this->getColumnWidth('i2') ?>%">
				<div class="inner cright ctop">
					<jdoc:include type="modules" name="<?php echo $inset2;?>" style="gavickpro" />
				</div>
			</div>
			<?php endif; ?>
		</div>
	
		<?php 
		if($this->countModules($mass_bottom)) : ?>
		<div class="gk-mass gk-mass-bottom inner ctop cleft cright"> 
			<jdoc:include type="modules" name="<?php echo $mass_bottom;?>" style="gavickpro" />
		</div>
		<?php endif; ?>
	
	</div>
</div>
<!-- //CONTENT -->