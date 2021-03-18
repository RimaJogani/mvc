<?php

$tabs=$this->getTabs();
foreach ($tabs as $key => $value):?>

<button type="button" class="btn bg-danger btn-sm text-white"><a  class="text-white" onclick="mage.resetParams().setUrl('<?php echo $this->getUrl(NULL,NULL,['tab'=>$key]);?>').load();" ><?php echo $value['label']; ?></a></button><br><br>


<?php endforeach; ?>
