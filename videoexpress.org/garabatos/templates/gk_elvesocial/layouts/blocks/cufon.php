<?php if($this->_tpl->params->get('font_method') == 0) : ?>

	<script type="text/javascript" src="<?php echo $this->templateurl(); ?>/js/cufon.js"></script>
	<?php if($this->_tpl->params->get('cufon_font') != -1 ) : ?>
	<script type="text/javascript" src="<?php echo $this->templateurl(); ?>/fonts/<?php echo $this->_tpl->params->get('cufon_font'); ?>"></script>
	<?php endif; ?>
	<?php if($this->_tpl->params->get('cufon_font1') != -1 ) : ?>
	<script type="text/javascript" src="<?php echo $this->templateurl(); ?>/fonts/<?php echo $this->_tpl->params->get('cufon_font1'); ?>"></script>
	<?php endif; ?>
	<?php if($this->_tpl->params->get('cufon_font2') != -1 ) : ?>
	<script type="text/javascript" src="<?php echo $this->templateurl(); ?>/fonts/<?php echo $this->_tpl->params->get('cufon_font2'); ?>"></script>
	<?php endif; ?>
	
	

	<script type="text/javascript">
	//<![CDATA[
		//if(!window.ie || (document.querySelectorAll && window.ie)){
		<?php if($this->_tpl->params->get('cufon_font','-1') != '-1' ) : ?>
		Cufon.replace('body', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_fontname',''); ?>' });
		<?php endif; ?>

		<?php if($this->_tpl->params->get('cufon_font1','-1') != '-1' ) : ?>		
		Cufon.replace('div.moduletable h3', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('div.moduletable_menu h3', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('div.moduletable_text h3', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('div.moduletable_color1 h3', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('div.moduletable_color2 h3', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('div.moduletable_color3 h3', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('legend', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('.contentheading', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('.componentheading', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('.bigfont1 h4', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('.bigfont2 h4', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('h4.gk_npro_header', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('.gk_is_text_block h4', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		Cufon.replace('h2.latestItemTitleList', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font1name',''); ?>' });
		<?php endif; ?>
		
		<?php if($this->_tpl->params->get('cufon_font2','-1') != '-1' ) : ?>
		Cufon.replace('div.itemHeader h2.itemTitle', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font2name',''); ?>' });
		Cufon.replace('div.itemListCategory h2', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font2name',''); ?>' });
		Cufon.replace('div.catItemHeader h3.catItemTitle', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font2name',''); ?>' });
		Cufon.replace('div.userItemHeader h3.userItemTitle', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font2name',''); ?>' });
		Cufon.replace('div.genericItemHeader h2.genericItemTitle', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font2name',''); ?>' });
		Cufon.replace('div.latestItemsCategory h2', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font2name',''); ?>' });
		Cufon.replace('div.latestItemHeader h3.latestItemTitle', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font2name',''); ?>' });
		Cufon.replace('div.latestItemHeader h2.latestItemTitle', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font2name',''); ?>' });
		Cufon.replace('div.k2ItemsBlock ul li a.moduleItemTitle', { fontFamily: '<?php echo $this->_tpl->params->get('cufon_font2name',''); ?>' });
		<?php endif; ?>		
		//}
	//]]>	
	</script>
<?php endif; ?>

<style type="text/css">	
	body {
		font-family: <?php echo $this->fontFamily($this->_tpl->params->get('font_family',1)); ?>;
	}

	div.moduletable h3, 
	div.moduletable_menu h3, 
	div.moduletable_text h3, 
	div.moduletable_color1 h3, 
	div.moduletable_color2 h3,
	div.moduletable_color3 h3, 
	legend,
	.contentheading,
	.componentheading,
	.bigfont1 h4,
	.bigfont2 h4,
	h4.gk_npro_header,
	.gk_is_text_block h4,
	h2.latestItemTitleList
	{
		font-family: <?php echo $this->fontFamily($this->_tpl->params->get('font_family1',1)); ?>;
	}
	
	div.itemHeader h2.itemTitle,
	div.itemListCategory h2,
	div.catItemHeader h3.catItemTitle,
	div.userItemHeader h3.userItemTitle,
	div.genericItemHeader h2.genericItemTitle,
	div.latestItemsCategory h2,
	div.latestItemHeader h3.latestItemTitle, 
	div.latestItemHeader h2.latestItemTitle,
	div.k2ItemsBlock ul li a.moduleItemTitle
	{
		font-family: <?php echo $this->fontFamily($this->_tpl->params->get('font_family2',1)); ?>;
	}
</style>