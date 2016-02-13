<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" id="btnRemove" value="Remove The Content">
<p id="blockContentToRemove">The Content</p>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnRemove')
  ->execute(
    YsJQuery::remove()->in('#blockContentToRemove')
  )
?>
</div>