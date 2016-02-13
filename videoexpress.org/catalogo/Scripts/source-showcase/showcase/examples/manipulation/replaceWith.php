<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" id="btnReplaceWith" value="Replace">
<div id="blockReplaceWith">
  <p>Hello</p>
  <p>cruel</p>
  <p>World</p>
</div>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnReplaceWith')
  ->execute(
    YsJQuery::replaceWith('<b>Paragraph. </b>')->in('#blockReplaceWith>p')
  )
?>
</div>