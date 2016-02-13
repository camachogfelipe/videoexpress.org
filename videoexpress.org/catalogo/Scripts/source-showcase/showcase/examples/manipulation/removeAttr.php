<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" id="btnRemoveAttr" value="Enable">
<input id="txtToRemoveAttr" type="text" value="Test" readonly="true">
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnRemoveAttr')
  ->execute(
    YsJQuery::removeAttr('readonly')->in('#txtToRemoveAttr')
  )
?>
</div>