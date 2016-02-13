<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" value="Get Value[2]" id="btnForGet" />
<ul id="lstGetItems">
  <li style="padding:0px">Content 1</li>
  <li style="padding:0px">Content 2</li>
  <li style="padding:0px">Content 3</li>
</ul>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnForGet')
  ->execute(
    sprintf('alert("Index 2 => " + %s)', 
             YsJQuery::get()
              ->key(1)
              ->in('#lstGetItems li')
              ->setAccesors('.innerHTML'))
  )
?>
</div>