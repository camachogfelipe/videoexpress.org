<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<button id="toggleUnwrap">wrap/unwrap</button>
<div id="blockWrapUnwrap">
  <div>
  <p>Hello</p>
  <p>cruel</p>
  <p>World</p>
  </div>
</div>
<?php
echo
YsJQuery::newInstance()
  ->execute(
    YsJQuery::toggle()
    ->in('#toggleUnwrap')
    ->handler(
      YsJQuery::wrap('<div></div>')->in('#blockWrapUnwrap  p')
    )
    ->handler(
      YsJQuery::unwrap()->in('#blockWrapUnwrap p')
    )
  )
?>
</div>