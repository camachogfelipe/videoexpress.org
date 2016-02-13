<?php
if(isset($_REQUEST['op'])) $op = $_REQUEST['op'];
else $op = 1;
?>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="upload_files/LoadVars.js"><!--// http://www.devpro.it/javascript_id_92.html //--></script>
<script type="text/javascript" src="upload_files/BytesUploaded.js"><!--// http://www.devpro.it/javascript_id_96.html //--></script>
<script type="text/javascript">
	var bUploaded = new BytesUploaded('upload_files/whileuploading.php');
</script>
<form action="uploadfile.php?op=<?php echo $op ?>" method="post" enctype="multipart/form-data" name="uploadfile">
	<?php
    	if($op == 2) echo '<label for="ban_texto">Texto imagen</label><input name="ban_texto" type="text" id="ban_texto" maxlength="10" />';
	?>
	<label for="logo"></label><input name="logo" id="logo" type="file" onchange="javascript:submit()" />
</form>
<div id="fileprogress"></div>
<pre><?php include("upload_files/test2.php"); ?></pre>