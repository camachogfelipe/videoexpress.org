<?php if (($r = $this->getColumnWidth('r'))): ?>
<!-- RIGHT COLUMN--> 
<div id="gk-right" class="column sidebar" style="width:<?php echo $r ?>%">
	<div class="inner ctop cright">

	<?php 
	$pos = $this->getPositionName ('right-mass-top');
	if ($this->countModules($pos)): ?>
	<div class="gk-mass gk-mass-top clearfix">
		<div class="inner cleft ctop cright">
			<jdoc:include type="modules" name="<?php echo $pos;?>" style="gavickpro" />
		</div>
	</div>
	<?php endif; ?>

	<?php
	$right1 = $this->getPositionName ('right1');
	$right2 = $this->getPositionName ('right2');
	$cls_right1 = $cls_right2 = "";
	if ($this->countModules("$right1 && $right2")) {
		$cls_right1 = "gk-right1";
		$cls_right2 = "gk-right2";
	}
	if ($this->countModules("$right1 + $right2")):
	?>
	<div class="gk-colswrap clearfix <?php echo $this->getColumnWidth('cls_r'); ?>">

	<?php if ($this->countModules($right1)): ?>
		<div class="gk-col <?php echo $cls_right1;?> column" style="width:<?php echo $this->getColumnWidth('r1')?>%">
			<div class="inner ctop cright cleft">
				<jdoc:include type="modules" name="<?php echo $right1;?>" style="gavickpro" />
			</div>
		</div>
	<?php endif; ?>

	<?php if ($this->countModules($right2)): ?>
		<div class="gk-col <?php echo $cls_right2;?> column" style="width:<?php echo $this->getColumnWidth('r2')?>%">
			<div class="inner cright ctop  <?php if ($this->countModules($right1)) echo ''; else echo ' cleft';?> ">
				<jdoc:include type="modules" name="<?php echo $right2;?>" style="gavickpro" />
			</div>
		</div>
	<?php endif; ?>

	</div>
	<?php endif; ?>

	<?php 
	$pos = $this->getPositionName ('right-mass-bottom');
	if ($this->countModules($pos)): ?>
	<div class="gk-mass gk-mass-bottom clearfix">
		<jdoc:include type="modules" name="<?php echo $pos;?>" style="gavickpro" />
	</div>
	<?php endif; ?>
	
	</div>
</div>
<!-- RIGHT COLUMN--> 
<?php endif; ?>