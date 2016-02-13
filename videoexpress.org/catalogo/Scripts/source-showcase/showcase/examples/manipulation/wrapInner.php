<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<button id="btnWrapInner">wrap</button>
<div id="blockToWrapInner">
  <div>
  <p>Hello</p>
  <p>cruel</p>
  <p>World</p>
  </div>
</div>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnWrapInner')
  ->execute(
    YsJQuery::wrapInner('<div></div>')->in('#blockToWrapInner  p')
  )
?>
</div>