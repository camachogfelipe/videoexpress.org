<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" id="btnReplaceAll" value="Replace">
<div id="blockReplaceAll">
  <p>Hello</p>
  <p>cruel</p>
  <p>World</p>
</div>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnReplaceAll')
  ->execute(
    YsJQuery::replaceAll('#blockReplaceAll>p')->in('<b>Paragraph. </b>')
  )
?>
</div>