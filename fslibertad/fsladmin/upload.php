<link href="../admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="upload_files/LoadVars.js"><!--// http://www.devpro.it/javascript_id_92.html //--></script>
<script type="text/javascript" src="upload_files/BytesUploaded.js"><!--// http://www.devpro.it/javascript_id_96.html //--></script>
<script type="text/javascript">
	var bUploaded = new BytesUploaded('upload_files/whileuploading.php');
</script>
<form action="uploadfile.php" method="post" enctype="multipart/form-data" name="uploadfile">
	<select name="tipo">
	  <option value="logo">Logo</option>
	  <option value="video">Video</option>
	  <option value="foto">Foto</option>
    </select>
  <label for="logo"></label><input name="file" id="file" type="file" onchange="javascript:submit()" />
  <input type="hidden" id="idproyecto" name="idproyecto" value="<?php echo $_REQUEST['id'] ?>" />
</form>
<div id="fileprogress"></div>
<pre><?php include("upload_files/test2.php"); ?></pre>