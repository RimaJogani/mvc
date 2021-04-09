<div id="ContentTabHtml">
<?php
$children = $this->getChildren();
//print_r($this);
foreach ($children as $child):
    echo $child->toHtml();   
endforeach;
?>
</div>