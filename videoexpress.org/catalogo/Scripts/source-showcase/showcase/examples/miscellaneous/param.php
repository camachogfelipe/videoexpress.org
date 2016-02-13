<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" value="Show" id="btnShowParams" />
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnShowParams')
  ->execute(
    sprintf('alert(%s)',
            YsJQuery::param(array('width' =>1680, 'height' => 1050)))
  )
?>
</div>