<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" id="btnPrepend" value="Get Position.left" />
<span id="blockPrepend"> World</span>
<?php
echo
YsJQuery::one()
  ->eventType(YsJQueryConstant::CLICK_EVENT)
  ->in('#btnPrepend')
  ->handler(
    YsJQuery::prepend()->content('Hello')->in('#blockPrepend')
  )
  ->execute()
?>
</div>