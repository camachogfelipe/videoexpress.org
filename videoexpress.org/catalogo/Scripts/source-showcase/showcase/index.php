<?php error_reporting(E_ALL) ?>
<?php ini_set('display_errors', 1) ?>
<?php $isExampleDir = array('examples', 'examples-ui') ?>
<?php
if(isset($_GET['module']) && isset($_GET['method'])){
  $module = $_GET['module'];
  $section = $_GET['section'];
  $method = $_GET['method'];
}else{
  $module = 'jQuery4PHP';
  $method = 'introduction';
  $section = 'about';
}

$isSource = (in_array($section, $isExampleDir));

include_once dirname(__FILE__) . '/../lib/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php';
YsJQueryAutoloader::register();

?>

<?php include_once('api-info.inc.php') ?>


<!DOCTYPE HTML>
<html class="js" lang="en"><head>
	<title>jQuery4PHP | <?php echo ucfirst($module) . ' | ' . ucfirst(str_replace('_', ' ', $method)) ?></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="pingback" href="http://api.jquery.com/xmlrpc.php" />
	<link rel="stylesheet" href="styles/reset.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
  <link rel="stylesheet" type="text/css" href="styles/examples.css" />

  <!-- highlight  -->
  <link rel="stylesheet" type="text/css" href="styles/highlight/sh_ide-eclipse.min.css">
  <script type="text/javascript" src="js/highlight/sh_main.min.js"></script>
  <script type="text/javascript" src="js/highlight/sh_php.js"></script>
  <!-- highlight  -->
  
  <!-- jQuery - jQueryUI  -->
  <link rel="stylesheet" type="text/css" href="styles/yepsua/jquery-ui-1.8.6.custom.css" />
  <link rel="stylesheet" type="text/css" href="styles/jquery-ui-utilities.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.6.custom.min.js"></script>
  <!-- jQuery - jQueryUI  -->

  <!-- jLayout -->
  <script type="text/javascript" src="js/plugins/jLayout/jlayout.border.js"></script>
  <script type="text/javascript" src="js/plugins/jLayout/jlayout.flexgrid"></script>
  <script type="text/javascript" src="js/plugins/jLayout/jlayout.flow.js"></script>
  <script type="text/javascript" src="js/plugins/jLayout/jlayout.grid.js"></script>
  <script type="text/javascript" src="js/plugins/jLayout/jquery.jlayout.js"></script>
  <script type="text/javascript" src="js/plugins/jquery.sizes.js"></script>
  <script type="text/javascript" src="js/plugins/jquery.metadata.js"></script>
  <!-- jLayout -->

  <!-- pmotify -->
  <script type="text/javascript" src="js/plugins/pnotify/jquery.pnotify.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles/pnotify/jquery.pnotify.default.css" />
  <!-- pmotify -->

  <!-- jqgrid -->
  <script type="text/javascript" src="js/plugins/jqgrid/i18n/grid.locale-en.js"></script>
  <script type="text/javascript" src="js/plugins/jqgrid/jquery.jqGrid.min.js"></script>
  <script type="text/javascript" src="js/plugins/jquery.tablednd.js"></script>

  <link rel="stylesheet" type="text/css" href="styles/jqgrid/ui.jqgrid.css" />
  <!-- jqgrid -->


	<link rel="shortcut icon" href="http://jquery4php.sourceforge.net/favicon.ico" type="image/x-icon" />
</head>
<body id="jq-interior" class="api-jquery-com jq-enhanced" onload="sh_highlightDocument();">
	<div id="jq-siteContain">
		<?php include('header.php') ?>
  <div id="jq-content" class="jq-clearfix">
	<div style="min-height: 210em;" id="jq-primaryContent" class="jq-box round">
  <h1 class="page-title"><?php echo (strtolower(trim($module)) == 'jquery4php') ? $module : ucfirst($module)  ?></h1>
		<div id="content">
    <a href="#" onclick="return false;" id="toggleNav" style="cursor:pointer">Hide navigator</a>
    <a href="#" onclick="return false;" id="toggleSources" style="cursor:pointer">Hide source code</a>
    <div style="float:right">
    </div>
  <?php
    echo
    YsJQuery::newInstance()->execute(
      new YsJQueryDynamic(
        YsJQuery::removeClass()->in('pre'),
        YsJQuery::addClass('sh_php'),
        YsJQuery::html('Remove highlight')->in('this'),
        'sh_highlightDocument();'
      )
    )
  ?>
  <?php
    echo
    YsJQuery::newInstance()
      ->execute(
        YsJQuery::toggle()
          ->in('#toggleNav')
          ->handler(
           new YsJQueryDynamic(
              YsJQuery::hide()->in('#jq-interiorNavigation'),
              YsJQuery::css('width', '95%')->in('#jq-primaryContent'),
              YsJQuery::html('Show navigator')->in('this')
            )
          )
          ->handler(
           new YsJQueryDynamic(
              YsJQuery::show()->in('#jq-interiorNavigation'),
              YsJQuery::css('width', '580px')->in('#jq-primaryContent'),
              YsJQuery::html('Hide navigator')->in('this')
            )
          )
      )
    ?>
    <?php
    echo
    YsJQuery::newInstance()
      ->execute(
        YsJQuery::toggle()
          ->in('#toggleSources')
          ->handler(
           new YsJQueryDynamic(
              YsJQuery::hide()->in('pre'),
              YsJQuery::html('Show sources')->in('this')
            )
          )
          ->handler(
           new YsJQueryDynamic(
              YsJQuery::show()->in('pre'),
              YsJQuery::html('Hide sources')->in('this')
            )
          )
      )
    ?>
    <br/>
    <?php if(isset($api_info[$module]['desc'])):?>
      <div class="archive-meta">
      <p>
        <?php echo $api_info[$module]['desc'] ?>
      </p>
      </div>
    <?php endif;?>
    <ul id="method-list">
            <li id="post-270" class="keynav hentry p1 post publish category-miscellaneous-traversal category-1.0 category-1.4 untagged y2009 m11 d14 h13 withoutfocus">
            <h2 class="entry-title">
              <?php if($isSource):?>
                <a class="title-link" href="http://api.jquery.com/<?php echo $method ?>/" title="Permalink to .<?php echo $method ?>()" rel="bookmark">.<?php echo $method ?>()</a></h2>
              <?php else:?>
                <a class="title-link" ><?php echo ucfirst(str_replace('_', ' ', $method)) ?></a></h2>
              <?php endif;?>
                  <?php if(isset($api_info[$module][$method]['desc'])):?>
                    <?php echo $api_info[$module][$method]['desc'] ?>
                  <?php endif;?>
              <?php include(sprintf('%s/%s/%s.php',$section,$module,$method))?>
              </li><!-- .post -->
    </ul>
		</div><!-- #content -->
	</div>
	<!-- #jq-primaryContent -->
  <?php include('menu.php')?>  <!-- #jq-interiorNavigation -->
  </div><!-- /#secondaryNavigation -->
  <?php include('footer.php')?>
</div>
</body></html>
