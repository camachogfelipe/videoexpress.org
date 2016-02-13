<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="text" value="" id="txtCopy" />
<input type="text" value="" id="txtPaste" />
<?php
echo
YsJQuery::newInstance()
  ->onKeyup()
  ->in('#txtCopy')
  ->execute(
    YsJQuery::val( YsJQuery::val()->in('this') )
    ->in('#txtPaste')
  )
?>
</div>