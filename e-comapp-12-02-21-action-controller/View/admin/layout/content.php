<div id="ContentGrid">
<?php

$children = $this->getChildren();
foreach ($children as $child):
   //echo $key;
   echo $child->toHtml();
endforeach;

?>
</div>

<script type="text/javascript">
	
var mage=new Base();
//alert(mage);

</script>