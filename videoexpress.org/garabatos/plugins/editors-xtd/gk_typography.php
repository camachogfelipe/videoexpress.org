<?php



// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );



class plgButtonGK_Typography extends JPlugin
{

	var $template_name = 'gk_elvesocial';

	

	var $styles = array(

		array(

			'Warnings',

			array('info1','<p class="gk_info1">Your info message goes here!</p>', '&lt;p class="gk_info1"&gt;Your info message goes here!&lt;/p&gt;'),

			array('tips1','<p class="gk_tips1">Your tips goes here!</p>','&lt;p class="gk_tips1"&gt;Your tips goes here!&lt;/p&gt;'),

			array('warning1','<p class="gk_warning1">Your warning message goes here!</p>','&lt;p class="gk_warning1"&gt;Your warning message goes here!&lt;/p&gt;'),

			array('info2','<p class="gk_info2">Your info message goes here!</p>','&lt;p class="gk_info2"&gt;Your info message goes here!&lt;/p&gt;'),

			array('tips2','<p class="gk_tips2">Your tips goes here!</p>','&lt;p class="gk_tips2"&gt;Your tips goes here!&lt;/p&gt;'),

			array('warning2','<p class="gk_warning2">Your warning message goes here!</p>','&lt;p class="gk_warning2"&gt;Your warning message goes here!&lt;/p&gt;'),

			array('info3','<p class="gk_info3">Your info message goes here!</p>','&lt;p class="gk_info3"&gt;Your info message goes here!&lt;/p&gt;'),

			array('tips3','<p class="gk_tips3">Your tips goes here!</p>','&lt;p class="gk_tips3"&gt;Your tips goes here!&lt;/p&gt;'),

			array('warning3','<p class="gk_warning3">Your warning message goes here!</p>','&lt;p class="gk_warning3"&gt;Your warning message goes here!&lt;/p&gt;'),

			array('info4','<p class="gk_info4">Your info message goes here!</p>','&lt;p class="gk_info4"&gt;Your info message goes here!&lt;/p&gt;'),

			array('tips4','<p class="gk_tips4">Your tips goes here!</p>','&lt;p class="gk_tips4"&gt;Your tips goes here!&lt;/p&gt;'),

			array('warning4','<p class="gk_warning4">Your warning message goes here!</p>','&lt;p class="gk_warning4"&gt;Your warning message goes here!&lt;/p&gt;')

		),

		array(

			'Headers',

			array('H1', '<h1>Heading 1</h1>', '&lt;h1&gt;Heading 1&lt;/h1&gt;'),

			array('H2', '<h2>Heading 2</h2>', '&lt;h2&gt;Heading 2&lt;/h2&gt;'),

			array('H3', '<h3>Heading 3</h3>', '&lt;h3&gt;Heading 3&lt;/h3&gt;'),

			array('H4', '<h4>Heading 4</h4>', '&lt;h4&gt;Heading 4&lt;/h4&gt;')

		),

		array(

			'Icons',

			array('audio', '<p class="gk_audio">Your audio message goes here!</p>', '&lt;p class="gk_audio"&gt;Your audio message goes here!&lt;/p&gt;'),

			array('webcam', '<p class="gk_webcam">Your webcam message goes here!</p>', '&lt;p class="gk_webcam"&gt;Your webcam message goes here!&lt;/p&gt;'),

			array('email', '<p class="gk_email">Your email message goes here!</p>', '&lt;p class="gk_email"&gt;Your email message goes here!&lt;/p&gt;'),

			array('creditcard', '<p class="gk_creditcard">Your creditcard message goes here!</p>', '&lt;p class="gk_creditcard"&gt;Your creditcard message goes here!&lt;/p&gt;'),

			array('feed','<p class="gk_feed">Your feed message goes here!</p>','&lt;p class="gk_feed"&gt;Your feed message goes here!&lt;/p&gt;'),

			array('help','<p class="gk_help">Your help message goes here!</p>','&lt;p class="gk_help"&gt;Your help message goes here!&lt;/p&gt;'),

			array('images','<p class="gk_images">Your images message goes here!</p>','&lt;p class="gk_images"&gt;Your images message goes here!&lt;/p&gt;'),

			array('lock','<p class="gk_lock">Your lock message goes here!</p>','&lt;p class="gk_lock"&gt;Your lock message goes here!&lt;/p&gt;'),

			array('printer','<p class="gk_printer">Your printer message goes here!</p>','&lt;p class="gk_printer"&gt;Your printer message goes here!&lt;/p&gt;'),

			array('report','<p class="gk_report">Your report message goes here!</p>','&lt;p class="gk_report"&gt;Your report message goes here!&lt;/p&gt;'),

			array('script','<p class="gk_script">Your script message goes here!</p>','&lt;p class="gk_script"&gt;Your script message goes here!&lt;/p&gt;'),

			array('time','<p class="gk_time">Your time message goes here!</p>','&lt;p class="gk_time"&gt;Your time message goes here!&lt;/p&gt;'),

			array('user','<p class="gk_user">Your user message goes here!</p>','&lt;p class="gk_user"&gt;Your user message goes here!&lt;/p&gt;'),

			array('world','<p class="gk_world">Your world message goes here!</p>','&lt;p class="gk_world"&gt;Your world message goes here!&lt;/p&gt;'),

			array('cart','<p class="gk_cart">Your cart message goes here!</p>','&lt;p class="gk_cart"&gt;Your cart message goes here!&lt;/p&gt;'),

			array('cd','<p class="gk_cd">Your cd message goes here!</p>','&lt;p class="gk_cd"&gt;Your cd message goes here!&lt;/p&gt;'),

			array('chart_bar','<p class="gk_chart_bar">Your chart_bar message goes here!</p>','&lt;p class="gk_chart_bar"&gt;Your chart_bar message goes here!&lt;/p&gt;'),

			array('chart_line','<p class="gk_chart_line">Your chart_line message goes here!</p>','&lt;p class="gk_chart_line"&gt;Your chart_line message goes here!&lt;/p&gt;'),

			array('chart_pie','<p class="gk_chart_pie">Your chart_pie message goes here!</p>','&lt;p class="gk_chart_pie"&gt;Your chart_pie message goes here!&lt;/p&gt;'),

			array('clock','<p class="gk_clock">Your clock message goes here!</p>','&lt;p class="gk_clock"&gt;Your clock message goes here!&lt;/p&gt;'),

			array('cog','<p class="gk_cog">Your cog message goes here!</p>','&lt;p class="gk_cog"&gt;Your cog message goes here!&lt;/p&gt;'),

			array('coins','<p class="gk_coins">Your coins message goes here!</p>','&lt;p class="gk_coins"&gt;Your coins message goes here!&lt;/p&gt;'),

			array('compress','<p class="gk_compress">Your compress message goes here!</p>','&lt;p class="gk_compress"&gt;Your compress message goes here!&lt;/p&gt;'),

			array('computer','<p class="gk_computer">Your computer message goes here!</p>','&lt;p class="gk_computer"&gt;Your computer message goes here!&lt;/p&gt;'),

			array('cross','<p class="gk_cross">Your cross message goes here!</p>','&lt;p class="gk_cross"&gt;Your cross message goes here!&lt;/p&gt;'),

			array('disk','<p class="gk_disk">Your disk message goes here!</p>','&lt;p class="gk_disk"&gt;Your disk message goes here!&lt;/p&gt;'),

			array('error','<p class="gk_error">Your error message goes here!</p>','&lt;p class="gk_error"&gt;Your error message goes here!&lt;/p&gt;'),

			array('exclamation','<p class="gk_exclamation">Your exclamation message goes here!</p>','&lt;p class="gk_exclamation"&gt;Your exclamation message goes here!&lt;/p&gt;'),

			array('film','<p class="gk_film">Your film message goes here!</p>','&lt;p class="gk_film"&gt;Your film message goes here!&lt;/p&gt;'),

			array('folder','<p class="gk_folder">Your folder message goes here!</p>','&lt;p class="gk_folder"&gt;Your folder message goes here!&lt;/p&gt;'),

			array('group','<p class="gk_group">Your group message goes here!</p>','&lt;p class="gk_group"&gt;Your group message goes here!&lt;/p&gt;'),

			array('heart','<p class="gk_heart">Your heart message goes here!</p>','&lt;p class="gk_heart"&gt;Your heart message goes here!&lt;/p&gt;'),

			array('house','<p class="gk_house">Your house message goes here!</p>','&lt;p class="gk_house"&gt;Your house message goes here!&lt;/p&gt;'),

			array('image','<p class="gk_image">Your image message goes here!</p>','&lt;p class="gk_image"&gt;Your image message goes here!&lt;/p&gt;'),

			array('information','<p class="gk_information">Your information message goes here!</p>','&lt;p class="gk_information"&gt;Your information message goes here!&lt;/p&gt;'),

			array('magnifier','<p class="gk_magnifier">Your magnifier message goes here!</p>','&lt;p class="gk_magnifier"&gt;Your magnifier message goes here!&lt;/p&gt;'),

			array('money','<p class="gk_money">Your money message goes here!</p>','&lt;p class="gk_money"&gt;Your money message goes here!&lt;/p&gt;'),

			array('new','<p class="gk_new">Your new message goes here!</p>','&lt;p class="gk_new"&gt;Your new message goes here!&lt;/p&gt;'),

			array('note','<p class="gk_note">Your note message goes here!</p>','&lt;p class="gk_note"&gt;Your note message goes here!&lt;/p&gt;'),

			array('page','<p class="gk_page">Your page message goes here!</p>','&lt;p class="gk_page"&gt;Your page message goes here!&lt;/p&gt;'),

			array('page_white','<p class="gk_page_white">Your page_white message goes here!</p>','&lt;p class="gk_page_white"&gt;Your page_white message goes here!&lt;/p&gt;'),

			array('plugin','<p class="gk_plugin">Your plugin message goes here!</p>','&lt;p class="gk_plugin"&gt;Your plugin message goes here!&lt;/p&gt;'),

			array('accept','<p class="gk_accept">Your accept message goes here!</p>','&lt;p class="gk_accept"&gt;Your accept message goes here!&lt;/p&gt;'),

			array('add','<p class="gk_add">Your add message goes here!</p>','&lt;p class="gk_add"&gt;Your add message goes here!&lt;/p&gt;'),

			array('camera','<p class="gk_camera">Your camera message goes here!</p>','&lt;p class="gk_camera"&gt;Your camera message goes here!&lt;/p&gt;'),

			array('brick','<p class="gk_brick">Your brick message goes here!</p>','&lt;p class="gk_brick"&gt;Your brick message goes here!&lt;/p&gt;'),

			array('box','<p class="gk_box">Your box message goes here!</p>','&lt;p class="gk_box"&gt;Your box message goes here!&lt;/p&gt;'),

			array('calendar','<p class="gk_calendar">Your calendar message goes here!</p>','&lt;p class="gk_calendar"&gt;Your calendar message goes here!&lt;/p&gt;')

		),

		array(

			'Highlights',

			array('highlight-1','<span class="gk_highlight-1">Your highlight phrase goes here!</span>','&lt;span class="gk_highlight-1"&gt;Your highlight phrase goes here!&lt;/span&gt;'),

			array('highlight-2','<span class="gk_highlight-2">Your highlight phrase goes here!</span>','&lt;span class="gk_highlight-2"&gt;Your highlight phrase goes here!&lt;/span&gt;'),

			array('highlight-3','<span class="gk_highlight-3">Your highlight phrase goes here!</span>','&lt;span class="gk_highlight-3"&gt;Your highlight phrase goes here!&lt;/span&gt;'),

			array('highlight-3','<span class="gk_highlight-4">Your highlight phrase goes here!</span>','&lt;span class="gk_highlight-4"&gt;Your highlight phrase goes here!&lt;/span&gt;')

		),

		array(

			'Code',

			array('pre', '<pre>code</pre>', '&lt;pre&gt;code&lt;/pre&gt;'),

			array('code1', '<div class="gk_code1">code</div>', '&lt;div class="gk_code1"&gt;code&lt;/div&gt;'),

			array('code2', '<div class="gk_code2">code</div>', '&lt;div class="gk_code2"&gt;code&lt;/div&gt;'),

			array('code3', '<div class="gk_code3"><h4>Name of your file</h4>code</div>', '&lt;div class="gk_code3"&gt;&lt;h4&gt;Name of your file&lt;/h4&gt;code&lt;/div&gt;')

		),

		array(

			'Unordered lists',

			array('bullet1', '<ul class="gk_bullet1"><li>Element</li></ul>', '&lt;ul class="gk_bullet1"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ul&gt;'),

			array('bullet2', '<ul class="gk_bullet2"><li>Element</li></ul>', '&lt;ul class="gk_bullet2"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ul&gt;'),

			array('bullet3', '<ul class="gk_bullet3"><li>Element</li></ul>', '&lt;ul class="gk_bullet3"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ul&gt;'),

			array('bullet4', '<ul class="gk_bullet4"><li>Element</li></ul>', '&lt;ul class="gk_bullet4"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ul&gt;'),

			array('circle1', '<ul class="gk_circle1"><li>Element</li></ul>', '&lt;ul class="gk_circle1"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ul&gt;'),

			array('circle2', '<ul class="gk_circle2"><li>Element</li></ul>', '&lt;ul class="gk_circle2"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ul&gt;'),

			array('square1', '<ul class="gk_square1"><li>Element</li></ul>', '&lt;ul class="gk_square1"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ul&gt;'),

			array('square2', '<ul class="gk_square2"><li>Element</li></ul>', '&lt;ul class="gk_square2"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ul&gt;'),

			array('square3', '<ul class="gk_square3"><li>Element</li></ul>', '&lt;ul class="gk_square3"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ul&gt;')

		),

		array(

			'Ordered lists',

			array('roman', '<ol class="gk_roman"><li>Element</li></ol>', '&lt;ol class="gk_roman"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ol&gt;'),

			array('dec', '<ol class="gk_dec"><li>Element</li></ol>', '&lt;ol class="gk_dec"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ol&gt;'),

			array('alpha', '<ol class="gk_alpha"><li>Element</li></ol>', '&lt;ol class="gk_alpha"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ol&gt;'),

			array('decimalLeadingZero', '<ol class="gk_decimalLeadingZero"><li>Element</li></ol>', '&lt;ol class="gk_decimalLeadingZero"&gt;&lt;li&gt;Element&lt;/li&gt;&lt;/ol&gt;'),

			array('number1', '<div class="gk_number1"><p><span>here goes a number</span>text of element</p>', '&lt;div class="gk_number1"&gt;&lt;p&gt;&lt;span&gt;here goes a number&lt;/span&gt;text of element&lt;/p&gt;'),

			array('number2', '<div class="gk_number1"><p><span>here goes a number</span>text of element</p>', '&lt;div class="gk_number1"&gt;&lt;p&gt;&lt;span&gt;here goes a number&lt;/span&gt;text of element&lt;/p&gt;')

		),

		array(

			'Abbrs and acronyms',

			array('abbr', '<abbr title="Here goes full word or phrase">here goes an abbreviation</abbr>', '&lt;abbr title="Here goes full word or phrase"&gt;here goes an abbreviation&lt;/abbr&gt;'),

			array('acronym', '<acronym title="Here goes full phrase">here goes an acronym</acronym>', '&lt;acronym title="Here goes full phrase"&gt;here goes an acronym&lt;/acronym&gt;')

		),

		array(

			'Definition lists',

			array('def1', '<dl class="gk_def1"><dt>Here goes the word you are about to define</dt><dd>Here goes definition</dd></dl>', '&lt;dl class="gk_def1"&gt;&lt;dt&gt;Here goes the word you are about to define&lt;/dt&gt;&lt;dd&gt;Here goes definition&lt;/dd&gt;&lt;/dl&gt;'),

			array('def2', '<dl class="gk_def2"><dt>Here goes the word you are about to define</dt><dd>Here goes definition</dd></dl>', '&lt;dl class="gk_def2"&gt;&lt;dt&gt;Here goes the word you are about to define&lt;/dt&gt;&lt;dd&gt;Here goes definition&lt;/dd&gt;&lt;/dl&gt;'),

			array('def3', '<dl class="gk_def3"><dt>Here goes the word you are about to define</dt><dd>Here goes definition</dd></dl>', '&lt;dl class="gk_def3"&gt;&lt;dt&gt;Here goes the word you are about to define&lt;/dt&gt;&lt;dd&gt;Here goes definition&lt;/dd&gt;&lt;/dl&gt;')

		),

		array(

			'Legends',

			array('legend1', '<div class="gk_legend1"> <h4> Title </h4> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p> </div>', '&lt;div class="gk_legend1"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;'),

			array('legend2', '<div class="gk_legend2"> <h4> Title </h4> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p> </div>', '&lt;div class="gk_legend2"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;'),

			array('legend3', '<div class="gk_legend3"> <h4> Title </h4> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p> </div>', '&lt;div class="gk_legend3"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;'),

			array('legend4', '<div class="gk_legend4"> <h4> Title </h4> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p> </div>', '&lt;div class="gk_legend4"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;'),

			array('legend5', '<div class="gk_legend5"> <h4> Title </h4> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p> </div>', '&lt;div class="gk_legend5"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;'),

			array('legend6', '<div class="gk_legend6"> <h4> Title </h4> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p> </div>', '&lt;div class="gk_legend6"&gt; &lt;h4&gt; Title &lt;/h4&gt; &lt;p&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer urna. Aenean tristique. Fusce a neque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.&lt;/p&gt; &lt;/div&gt;')

		),

		array(

			'Dropcaps',

			array('Dropcap1', '<p><span class="gk_Dropcap1">t</span> to make the first letter larger</p>', '&lt;p&gt;&lt;span class="gk_Dropcap1"&gt;t&lt;/span&gt; to make the first letter larger&lt;/p&gt;'),

			array('Dropcap2', '<p class="gk_Dropcap2"><span class="gk_Dropcap2">t</span> to make the first letter larger</p>', '&lt;p class="gk_Dropcap2"&gt;&lt;span class="gk_Dropcap2"&gt;t&lt;/span&gt; to make the first letter larger&lt;/p&gt;'),

			array('Dropcap3', '<p class="gk_Dropcap3"><span class="gk_Dropcap3">t</span> to make the first letter larger</p>', '&lt;p class="gk_Dropcap3"&gt;&lt;span class="gk_Dropcap3"&gt;t&lt;/span&gt; to make the first letter larger&lt;/p&gt;')

		),

		array(

			'Floated blocks',

			array('blockTextLeft', '<span class="gk_blockTextLeft">Block of text</span>', '&lt;span class="gk_blockTextLeft"&gt;Block of text&lt;/span&gt;'),

			array('blockTextRight', '<span class="gk_blockTextRight">Block of text</span>', '&lt;span class="gk_blockTextRight"&gt;Block of text&lt;/span&gt;'),

			array('blockTextCenter', '<span class="gk_blockTextCenter">Block of text</span>', '&lt;span class="gk_blockTextCenter"&gt;Block of text&lt;/span&gt;')

		),

		array(

			'Blockquotes',

			array('blockquote', '<blockquote>Your quoted text goes here!</blockquote>', '&lt;blockquote&gt;Your quoted text goes here!&lt;/blockquote&gt;'),

			array('blockquote1', '<blockquote><div class="gk_blockquote1"><div>Your quoted text goes here!</div></div></blockquote>', '&lt;blockquote&gt;&lt;div class="gk_blockquote1"&gt;&lt;div&gt;Your quoted text goes here!&lt;/div&gt;&lt;/div&gt;&lt;/blockquote&gt;'),

			array('blockquote2', '<blockquote><div class="gk_blockquote2"><div>Your quoted text goes here!</div></div></blockquote>', '&lt;blockquote&gt;&lt;div class="gk_blockquote2"&gt;&lt;div&gt;Your quoted text goes here!&lt;/div&gt;&lt;/div&gt;&lt;/blockquote&gt;'),

			array('blockquote3', '<blockquote><div class="gk_blockquote3"><div>Your quoted text goes here!</div></div></blockquote>', '&lt;blockquote&gt;&lt;div class="gk_blockquote3"&gt;&lt;div&gt;Your quoted text goes here!&lt;/div&gt;&lt;/div&gt;&lt;/blockquote&gt;'),

			array('blockquote4', '<blockquote><div class="gk_blockquote4"><div>Your quoted text goes here!</div></div></blockquote>', '&lt;blockquote&gt;&lt;div class="gk_blockquote4"&gt;&lt;div&gt;Your quoted text goes here!&lt;/div&gt;&lt;/div&gt;&lt;/blockquote&gt;')

		),

		array(

			'Other span styles',

			array('clear', '<span class="gk_clear">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_clear"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('clear-1', '<span class="gk_clear-1">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_clear-1"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('clear-2', '<span class="gk_clear-2">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_clear-2"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('color', '<span class="gk_color">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_color"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('color-1', '<span class="gk_color-1">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_color-1"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('color-2', '<span class="gk_color-2">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_color-2"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('color-3', '<span class="gk_color-3">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_color-3"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('color-4', '<span class="gk_color-4">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_color-4"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('color-5', '<span class="gk_color-5">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_color-5"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('color-6', '<span class="gk_color-6">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_color-6"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;'),

			array('color-7', '<span class="gk_color-7">Lorem ipsum dolor sit amet.</span>', '&lt;span class="gk_color-7"&gt;Lorem ipsum dolor sit amet.&lt;/span&gt;')

		),

	);

	

	function plgButtonGK_Typography(& $subject, $config)

	{

		parent::__construct($subject, $config);

	}



	function onDisplay($name)

	{

		global $mainframe;

		

		$button = new JObject();

		$doc = & JFactory::getDocument();

		

		$doc->addStyleSheet('../plugins/editors-xtd/gk_typography/css/gk_typography.css', 'text/css', null);

		$doc->addScript('../plugins/editors-xtd/gk_typography/js/gk_typography.js', "text/javascript");  

		$doc->addScriptDeclaration('$GKEditor = "'.$name.'";');

		$template = $mainframe->getTemplate();

		JHTML::_('behavior.modal');

		$button->set('modal', true);

		$button->set('link', '');

		$button->set('text', JText::_('GK Typography'));

		$button->set('name', 'gk_typography');

		$button->set('options', "{handler:'adopt',adopt:$('gk_typography_content'),size:{x:800,y:500}}");

		

		$generated_content = '<script type="text/javascript">';

		$generated_content .= '$GKTypo = [';

		

		for($i = 0; $i < count($this->styles); $i++){

			for($j = 0; $j < count($this->styles[$i]); $j++){

				if($j == 0){

					$generated_content .= '[';

				}else{

					$generated_content .= '\''.$this->styles[$i][$j][1] . '\',';

				}

			}

			

			$generated_content = substr($generated_content, 0, strlen($generated_content)-1);

			$generated_content .= '],';

		}

		

		$generated_content = substr($generated_content, 0, strlen($generated_content)-1);

		$generated_content .= '];';

		$generated_content .= '</script>';

		$generated_content .= '<table><tbody>';

		

		for($i = 0; $i < count($this->styles); $i++){

			

			$first = false;

			

			for($j = 0; $j < count($this->styles[$i]); $j++){

				if($j == 0){

					$generated_content .= '<tr class="section"><td colspan="2">'.$this->styles[$i][$j].'</td></tr>';

				}else{

					if($this->styles[$i][0] == 'Icons'){

						if($this->styles[$i][$j][0] == 'audio' || $this->styles[$i][$j][0] == 'creditcard' || $this->styles[$i][$j][0] == 'date' || $this->styles[$i][$j][0] == 'email' || 

							$this->styles[$i][$j][0] == 'feed' || $this->styles[$i][$j][0] == 'help' || $this->styles[$i][$j][0] == 'info' || $this->styles[$i][$j][0] == 'tips' ||

							$this->styles[$i][$j][0] == 'warning' || $this->styles[$i][$j][0] == 'webcam'){

							

							$generated_content .= '<tr '.(!$first ? 'class="first"' : '').'>

														<td><img src="../templates/'.$this->template_name.'/images/icons/'.(($this->styles[$i][$j][0] == 'creditcard') ? 'credit' : $this->styles[$i][$j][0]).'.gif" alt="" /><span onclick="click($GKTypo['.$i.']['.($j-1).'])">'.$this->styles[$i][$j][0].'</span></td>

														<td><code>'.$this->styles[$i][$j][2].'</code></td>

													</tr>';

							

						}else{

							$generated_content .= '<tr '.(!$first ? 'class="first"' : '').'>

														<td><img src="../templates/'.$this->template_name.'/images/icons/'.$this->styles[$i][$j][0].'.png" alt="" /><span onclick="click($GKTypo['.$i.']['.($j-1).'])">'.$this->styles[$i][$j][0].'</span></td>

														<td><code>'.$this->styles[$i][$j][2].'</code></td>

													</tr>';

						}

					}else{

						$generated_content .= '<tr '.(!$first ? 'class="first"' : '').'>

													<td><span onclick="click($GKTypo['.$i.']['.($j-1).'])">'.$this->styles[$i][$j][0].'</span></td>

													<td><code>'.$this->styles[$i][$j][2].'</code></td>

												</tr>';

					}

				}

				

				if($j == 1) $first = true;

			}

		}

		

		$generated_content .= '</tbody></table>';

		

		echo '<div style="display:none;"><div id="gk_typography_content" onclick="click();">'.$generated_content.'</div></div>';

		return $button;

	}

}