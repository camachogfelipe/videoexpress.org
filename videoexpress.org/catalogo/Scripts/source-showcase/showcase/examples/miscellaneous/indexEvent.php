<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<ul id="lstIndex">
  <li style="padding:0px; color:blue">Item 1</li>
  <li style="padding:0px; color:blue">Item 2</li>
  <li style="padding:0px; color:blue">Item 3</li>
</ul>
<?php
echo 
YsJQuery::newInstance()
  ->onClick()
  ->in('#lstIndex li')
  ->execute(
    sprintf('alert(%s)',YsJQuery::index()->in('#lstIndex li')
                                         ->object('this'))
  )
?>
</div>