<?php if (($l = $this->getColumnWidth('l'))): ?>
<!-- LEFT COLUMN--> 
<div id="gk-left" class="column sidebar" style="width:<?php echo $l ?>%">
	<div class="inner ctop cleft">

	<?php 
	$pos = $this->getPositionName ('left-mass-top');
	if ($this->countModules($pos)): ?>
	<div class="gk-mass gk-mass-top clearfix">
		<div class="inner ctop cleft cright">
			<jdoc:include type="modules" name="<?php echo $pos;?>" style="gavickpro" />
		</div>
	</div>
	<?php endif; ?>
	
	<?php
		$left1 = $this->getPositionName ('left1');
		$left2 = $this->getPositionName ('left2');
		$cls_left1 = $cls_left2 = "";
		if ($this->countModules("$left1 && $left2")) {
			$cls_left1 = "gk-left1";
			$cls_left2 = "gk-left2";
		}
		if ($this->countModules("$left1 + $left2")):
	?>
	<div class="gk-colswrap clearfix <?php echo $this->getColumnWidth('cls_l'); ?>">
	<?php if ($this->countModules($left1)): ?>
		<div class="gk-col <?php echo $cls_left1;?> column" style="width:<?php echo $this->getColumnWidth('l1')?>%">
			<div class="inner ctop cleft <?php if ($this->countModules($left2)) echo ''; else echo 'cright'?>">
				<jdoc:include type="modules" name="<?php echo $left1;?>" style="gavickpro" />
			</div>	
		</div>
	<?php endif; ?>
	<?php if ($this->countModules($left2)): ?>
		<div class="gk-col <?php echo $cls_left2;?> column" style="width:<?php echo $this->getColumnWidth('l2')?>%">
			<div class="inner ctop cleft cright">
				<jdoc:include type="modules" name="<?php echo $left2;?>" style="gavickpro" />
			</div>
		</div>
	<?php endif; ?>
	</div>
	<?php endif; ?>
	
	<?php 
		$pos = $this->getPositionName ('left-mass-bottom');
		if ($this->countModules($pos)): 
	?>
	<div class="gk-mass gk-mass-bottom clearfix">
		<jdoc:include type="modules" name="<?php echo $pos;?>" style="gavickpro" />
	</div>
	<?php endif; ?>

	</div>
</div>
<!-- //LEFT COLUMN--> 
<?php endif; ?>