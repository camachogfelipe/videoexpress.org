<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" value="Get Values" id="btnForEach" />
<ul id="lstItems">
  <li style="padding:0px">Item 1</li>
  <li style="padding:0px">Item 2</li>
  <li style="padding:0px">Item 3</li>
  <li style="padding:0px">Item 4</li>
</ul>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnForEach')
  ->execute(
    YsJQuery::each()
    ->in('#lstItems li')
    ->handler(
      new YsJsFunction(
          sprintf('alert(index + ": " + %s)', YsJQuery::text()->in('this'))
          ,'index'
      )
    )
  )
?>
</div>