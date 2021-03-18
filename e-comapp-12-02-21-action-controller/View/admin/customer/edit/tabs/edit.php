<?php
$customer=$this->getCustomer();
$customerGroup=$this->getCustomerGroup();
?> 
<form class="needs-validation" id="customerForm" action="<?php echo $this->getUrl('customer','save');?>" method="POST">
<div class="bg-light p-5 rounded mx-auto">
              <button type="button" class="btn bg-dark btn-md d-flex justify-content-right"><a onclick="mage.setUrl('<?php echo $this->getUrl('Customer','grid');?>').resetParams().load();" href="javascript:void(0)" class="text-white "> View Customer</a> </button>
              <?php if($this->getRequest()->getGet('id')):?>
            <h3 class="d-flex justify-content-center">Update Customer</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Add Customer</h3>
            <?php endif;?>
            <div class="row g-3">
               
                    <div class="row g-3">
                    <div class="col-sm-6">
                      
                      <input type="text" class="form-control" name="customer[firstName]" id="firstName" placeholder="First Name"  value="<?php echo $customer->firstName?>" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
        
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control" name="customer[lastName]" id="lastName" placeholder="Last Name"  value="<?php echo $customer->lastName?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
        
                    <div class="col-12">
                     
                      <div class="input-group has-validation">
                       
                        <input type="text" class="form-control" name="customer[email]" id="email" placeholder="Email"  value="<?php echo $customer->email?>" required="">
                      <div class="invalid-feedback">
                          Your username is required.
                        </div>
                      </div>
                    </div>
        
                   
        
        
                    <div class="col-6">
                     
                      <input type="text" class="form-control" name="customer[contactNo]" id="contactNo"  value="<?php echo $customer->contactNo?>" placeholder="Contact No ">
                    </div>
                    
                    <div class=" col-6 form-check form-switch" >
                        
                      
                    <div class="switch">
                            <select name="customer[status]" class="form-control" >
                            <?php foreach($customer->getStatusOptions() as $key => $value):?>
                        <option value="<?php echo $key?>" <?php if($customer->status == $key):?> selected <?php endif;?>><?php echo $value?></option>
                    <?php endforeach;?>
                            </select>
                           
                        </div>
                     </div>
                   <div class=" col-6 form-check form-switch" >
                  <div class="switch">
                            <select name="customer[customerGroupId]" class="form-control" >
                            <?php foreach($customerGroup->getData() as $key => $value):?>
                        <option value="<?php echo $value->customerGroupId?>" <?php if($customer->customerGroupId == $value->customerGroupId):?> selected <?php endif;?>><?php echo $value->customerGroupName?></option>
                    <?php endforeach;?>
                            </select>
                            
                        </div>
                    </div>  
                   </div>
                  <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#customerForm').load();" name="save">Save
                    
                     </button></a>&nbsp;&nbsp;
                  
                  </p>
              </div>
            </div>
          </form>