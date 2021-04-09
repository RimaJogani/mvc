       <div class="container d-flex pt-4 mx-auto">
       	<?php if($this->getRequest()->getGet('id')):?>
       		<div class="leftBar">

                  <?php echo $this->getTabHtml();?>
            </div>
        <?php endif; ?>
            <div class="col-md-7 mx-auto">
                  <?php echo $this->getTabContent();?>
              </div>
       </div>

   