<?php

$tabs=$this->getTabs();
//print_r($tabs);
foreach ($tabs as $key => $value):?>

<button type="button" class="btn bg-danger btn-sm text-white"><a  class="text-white" onclick="mage.setUrl('<?php echo $this->getUrl(NULL,NULL,['tab'=>$key],false);?>').load();"><?php echo $value['label']; ?></a></button><br><br>


<?php endforeach;?>



