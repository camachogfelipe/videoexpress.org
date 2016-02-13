<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<button id="btnWrapAll">wrap</button>
<div id="blockToWrapAll">
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
  ->in('#btnWrapAll')
  ->execute(
    YsJQuery::wrapAll('<div></div>')->in('#blockToWrapAll  p')
  )
?>
</div>