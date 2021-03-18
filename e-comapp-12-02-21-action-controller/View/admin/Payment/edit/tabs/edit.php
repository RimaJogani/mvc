<?php

$payment=$this->getPayment();


?>
 <div class="bg-light p-5 rounded mx-auto">
              <button type="button" class="btn bg-dark btn-md d-flex justify-content-right"><a onclick="mage.setUrl('<?php echo $this->getUrl('payment','gridHtml');?>').resetParams().load();" href="javascript:void(0)" class="text-white"> View Payment</a> </button>
           <?php if($this->getRequest()->getGet('id')):?>
            <h3 class="d-flex justify-content-center">Update Payment</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Add Payment</h3>
            <?php endif;?>
    <div class="row g-3">
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="payment[paymentName]" placeholder="Name" value="<?php echo $payment->paymentName?>" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
        
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="payment[paymentCode]" placeholder="Code" value="<?php echo $payment->paymentCode?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
        
                    
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="payment[paymentAmount]" placeholder="Amount" value="<?php echo $payment->paymentAmount?>" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
        
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="payment[description]" placeholder="Description" value="<?php echo $payment->description?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                    
                   
                   
                    <div class="form-check form-switch col-sm-4 mt-5">
                        
                    <div class="switch">
                            <select name="payment[status]" class="form-control" >
                            <?php foreach($payment->getStatusOptions() as $key => $value):?>
                        <option value="<?php echo $key?>" <?php if($payment->status == $key):?> selected <?php endif;?>><?php echo $value?></option>
                    <?php endforeach;?>
                            </select>
                           
                        </div>
                    </div>
                 
        
                  <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#paymentForm').load();" name="save">Save
                   
                     </button></a>&nbsp;&nbsp;
                    
                  </p>
              </div>