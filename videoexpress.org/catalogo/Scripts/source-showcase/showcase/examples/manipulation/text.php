<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="text" id="txtToText" value="" />
<div type="text" id="log4Text"></div>
<?php
echo
YsJQuery::newInstance()
  ->onKeyup()
  ->in('#txtToText')
  ->execute(
    YsJQuery::text()
      ->in('#log4Text')
      ->value(YsJQuery::val()->in('this'))
  )
?>
</div>