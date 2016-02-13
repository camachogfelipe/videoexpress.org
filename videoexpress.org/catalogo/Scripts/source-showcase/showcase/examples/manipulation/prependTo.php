<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<div style="display:none">
  <span id="templatePrependTo">Hello </span>
</div>
<p id="blockPrependTo">World   :Click Me</p>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#blockPrependTo')
  ->execute(
    YsJQuery::prependTo('#blockPrependTo')->in('#templatePrependTo')
  )
?>
</div>