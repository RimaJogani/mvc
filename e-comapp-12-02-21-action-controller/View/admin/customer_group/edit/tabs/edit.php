<?php
$customerGroup=$this->getCustomerGroup();
?>
<div class="bg-light p-5 rounded mx-auto">
              <button type="button" class="btn bg-dark btn-md d-flex justify-content-right"><a onclick="mage.setUrl('<?php echo $this->getUrl('Customer_CustomerGroup','gridHtml');?>').resetParams().load();" href="javascript:void(0)" class="text-white "> View CustomerGroup</a> </button>
              <?php if($this->getRequest()->getGet('id')):?>
            <h3 class="d-flex justify-content-center">Update CustomerGroup</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Add CustomerGroup</h3>
            <?php endif;?>
          <div class="row g-3">
               
                    <div class="col-sm-6">
                      <input type="text" class="form-control"  name="customerGroup[customerGroupName]" placeholder="Name"  value="<?php echo $customerGroup->customerGroupName?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                      
                    </div>
                    
                    <div class="form-check form-switch col-sm-4 mt-5">
                        
                    <div class="switch">
                            <select name="customerGroup[status]" class="form-control" >
                            <?php foreach($customerGroup->getStatusOptions() as $key => $value):?>
                        <option value="<?php echo $key?>" <?php if($customerGroup->status == $key):?> selected <?php endif;?>><?php echo $value?></option>
                    <?php endforeach;?>
                            </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                      
                      
                     
                 
        
                      <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#customerGroupForm').load();" name="save">Save
                   
                     </button></a>&nbsp;&nbsp;
                   
                  </p>
              </div>