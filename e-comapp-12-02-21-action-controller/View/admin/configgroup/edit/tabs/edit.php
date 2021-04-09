  <?php

$configGroup=$this->getTableRow();
//print_r($configGroup);
//die();

?>
<form class="needs-validation" id="configGroupForm" action="<?php echo $this->getUrl('ConfigGroup','save');?>" method="post">
<div class="bg-light p-5 rounded mx-auto">
              <button type="button" class="btn bg-dark btn-md d-flex justify-content-right"><a onclick="mage.setUrl('<?php echo $this->getUrl('configGroup','gridHtml');?>').resetParams().load();" href="javascript:void(0)" class="text-white "> View configGroup</a> </button>
              <?php if($configGroup->groupId):?>
            <h3 class="d-flex justify-content-center">Update configGroup</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Add configGroup</h3>
            <?php endif;?>
          <div class="row g-3">
               
                    <div class="col-sm-6"><label>Name</label>
                        <input type="text" class="form-control"  name="configGroup[name]"   value="<?php echo $configGroup->name?>" required="">
                    </div>
                    
                    

                  </div>
                      <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#configGroupForm').load();" name="save">Save
                   
                     </button></a>&nbsp;&nbsp;
                   
                  </p>
              </div>
            </div>
          </form>
          