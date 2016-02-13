<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" id="btnAddBlock" value="Add A Block" />
Size: <span id="logForSize"></span>
<div id="blockToSize">
  <div>Hello world </div>
</div>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnAddBlock')
  ->execute(
    YsJQuery::append()->content('<div>Hello world </div>')->in('#blockToSize'),
    YsJQuery::text()
      ->value(YsJQuery::size()->in('#blockToSize div'))
      ->in('#logForSize')
  );
?>
</div>