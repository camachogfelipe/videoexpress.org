<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
  Value:<p id="mapValue"></p>
  <input class="testMap" type="text" name="name" value="John"/>
  <input class="testMap" type="text" name="password" value="password"/>
  <input class="testMap" type="text" name="url" value="http://ejohn.org/"/>
<?php
echo
YsJQuery::newInstance()
  ->onKeyup()
  ->in('.testMap')
  ->execute(
    YsJQuery::emptyEvent()->in('#mapValue'),
    YsJQuery::append(
      new YsJQueryDynamic(
        YsJQuery::map('function(){return $(this).val();}')
          ->in('.testMap:input'),
        YsJQuery::get(),
        YsJQuery::join(', ')
      )
    )
  )
?>
</div>