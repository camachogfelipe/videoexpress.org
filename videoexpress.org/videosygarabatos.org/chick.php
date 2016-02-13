<?php
$pro = $_GET['pro'];
switch($pro)
{
	case 1:		$file = "tract_6_sp";
				break;
	case 2:		$file = "tract_4_sp";
				break;
	case 3:		$file = "tract_5_sp";
				break;
	case 4:		$file = "tract_1_sp";
				break;
	case 5:		$file = "tract_2_sp";
				break;
	case 6:		$file = "tract_3_sp";
				break;
	default:	$file = "preview_sp";
				break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body><object width="425" height="255"><param name="movie" value="http://media.chick.com/es/<?php echo $file ?>.swf"></param><param name="wmode" value="transparent"></param><embed src="http://media.chick.com/es/<?php echo $file ?>.swf" type="application/x-shockwave-flash" wmode="transparent" width="425" height="255"></embed></object></object>
</body>
</html>