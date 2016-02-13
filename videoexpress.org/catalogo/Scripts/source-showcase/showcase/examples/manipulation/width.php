<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" id="btnWindowWidth" value="Width in the window" />
<input type="button" id="btnDocumentWidth" value="Width in the document" />
<input type="button" id="btnBlocktWidth" value="Width in the div " />
<div id="blockToWidth" class="blue_block"></div>
<?php
echo
YsJQuery::newInstance()->onClick()->in('#btnWindowWidth')->execute(
  sprintf('alert("Width: " + %s)', YsJQuery::width()->in('window'))
);
echo
YsJQuery::newInstance()->onClick()->in('#btnDocumentWidth')->execute(
  sprintf('alert("Width: " + %s)', YsJQuery::width()->in('document'))
);
echo
YsJQuery::newInstance()->onClick()->in('#btnBlocktWidth')->execute(
  sprintf('alert("Width: " + %s)', YsJQuery::width()->in('#blockToWidth'))
);
?>
</div>