<pre>
<?php echo htmlentities(file_get_contents(__FILE__,true,null,92)) ?>
</pre>
<br/>
<div>
<input type="button" id="btnScrollLeft" value="Scroll Left [300]" />
<input type="button" id="btnScrollLeftVal" value="Scroll Left Value" />
<div id="blockScrollLeft" style="  background:#CCCCCC none repeat scroll 0 0;
                                   border:3px solid #666666;
                                   margin:5px;
                                   padding:5px;
                                   position:relative;
                                   width:200px;
                                   height:100px;
                                   overflow:auto;">
<p style="margin-top:300px;
          padding:5px;
          border:2px solid #666;
          width:1000px;
          height:1000px;">Hello</p>
</div>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnScrollLeft')
  ->execute(
    YsJQuery::scrollLeft(300)->in('#blockScrollLeft')
  )
?>
<?php
echo
YsJQuery::newInstance()
  ->onClick()
  ->in('#btnScrollLeftVal')
  ->execute(
    sprintf('alert(%s)',YsJQuery::scrollLeft()->in('#blockScrollLeft'))
  )
?>
</div>