<?php

$shipping=$this->getshipping();


?>
 <div class="bg-light p-5 rounded mx-auto">
              <button type="button" class="btn bg-dark btn-md d-flex justify-content-right"><a onclick="mage.setUrl('<?php echo $this->getUrl('shipping','gridHtml');?>').resetParams().load();" href="javascript:void();" class="text-white"> View Payment</a> </button>
           <?php if($this->getRequest()->getGet('id')):?>
            <h3 class="d-flex justify-content-center">Update Shipping</h3>
            <?php else :?>
            <h3 class="d-flex justify-content-center">Add Shipping</h3>
            <?php endif;?>
 <div class="row g-3">
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="shipping[shippingName]" placeholder="Name" value="<?php echo $shipping->shippingName?>" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
        
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="shipping[shippingCode]" placeholder="Code" value="<?php echo $shipping->shippingCode?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
        
                    
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="shipping[shippingAmount]" placeholder="Amount"value="<?php echo $shipping->shippingAmount?>" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
        
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="shipping[description]" placeholder="Description" value="<?php echo $shipping->description?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                    
                   
                   
                    <div class="form-check form-switch col-sm-4 mt-5">
                        
                    <div class="switch">
                            <select name="shipping[status]" class="form-control" >
                            <?php foreach($shipping->getStatusOptions() as $key => $value):?>
                        <option value="<?php echo $key?>" <?php if($shipping->status == $key):?> selected <?php endif;?>><?php echo $value?></option>
                    <?php endforeach;?>
                            </select>
                           
                        </div>
                    </div>
                 
        
                  <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#shippingForm').load();" name="save">Save
                   
                     </button></a>&nbsp;&nbsp;
                    
                  </p>
              </div>