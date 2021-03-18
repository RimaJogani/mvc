<form class="needs-validation" id="addressForm" action="<?php echo $this->getUrl('customer_customeraddress','saveAddress');?>" method="POST">
 <?php
 $billing=$this->getBilling(); 
 $shipping=$this->getShipping(); 
?>
  			
  		

 <?php if($billing->addressId):?>
 <input type="hidden" name="billing[addressId]" value="<?php echo $billing->addressId;?>">
<?php endif;?>

<div class="bg-light p-5 rounded mx-auto">
               <?php if($billing->addressId ):?>
            <h3 class="d-flex justify-content-center">Update Billing</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Billing</h3>
            <?php endif;?> 
              <div class="row g-3">
               
                <div class="row g-3">
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="billing[address]" placeholder="Address"  value="<?php echo $billing->address?>"  required="">
                      <div class="invalid-feedback">
                       <!--  Valid first name is required. -->
                      </div>
                    </div>
        
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control" name="billing[zipcode]" placeholder="Zipcode"     value="<?php echo $billing->zipcode?>" required="">
                      <div class="invalid-feedback">
                       <!--  Valid last name is required. -->
                      </div>
                    </div>
        
                    <div class="col-6">
                     
                     <div class="switch">
                            <input type="text" class="form-control" name="billing[city]" placeholder="City"     value="<?php echo $billing->city?>" required="">
                        </div>
                      
                    </div>
                    <div class="col-6">
                     
                     <div class="switch">
                            <input type="text" class="form-control" name="billing[state]" placeholder="state"     value="<?php echo $billing->state?>" required="">
                        </div>
                      
                    </div>
        
                   
        
        			<div class="col-6">
                     
                     <div class="switch">
                            <input type="text" class="form-control" name="billing[country]" placeholder="Country"     value="<?php echo $billing->country?>" required="">
                        </div>
                      
                    </div>
                    
                    
                  
                  
              </div>
          </div>
      </div>
 
              
              

        
      
<?php if($shipping->addressId):?>
 <input type="hidden" name="shipping[addressId]" value="<?php echo $shipping->addressId;?>">
<?php endif;?>
                     
<div class="bg-light p-5 rounded mx-auto">
             <?php if($shipping->addressId ):?>
            <h3 class="d-flex justify-content-center">Update Shipping</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Shipping</h3>
            <?php endif;?> 
<div class="row g-3">
               
                    <div class="row g-3">
                    <div class="col-sm-6">
                  
                        
     
          <input type="text" class="form-control" name="shipping[address]" placeholder="Address"  value="<?php echo $shipping->address?>" required="">
                      <div class="invalid-feedback">
                       <!--  Valid first name is required. -->
                      </div>
                    </div>
        
                   <div class="col-sm-6">
                     
                      <input type="text" class="form-control" name="shipping[zipcode]" placeholder="Zipcode"     value="<?php echo $shipping->zipcode?>" required="">
                      <div class="invalid-feedback">
                       <!--  Valid last name is required. -->
                      </div>
                    </div>
        
                    <div class="col-6">
                     
                     <div class="switch">
                            <input type="text" class="form-control" name="shipping[city]" placeholder="City"     value="<?php echo $shipping->city?>" required="">
                        </div>
                      
                    </div>
                    <div class="col-6">
                     
                     <div class="switch">
                            <input type="text" class="form-control" name="shipping[state]" placeholder="state"     value="<?php echo $shipping->state?>" required="">
                        </div>
                      
                    </div>
        
                   
        
              <div class="col-6">
                     
                     <div class="switch">
                            <input type="text" class="form-control" name="shipping[country]" placeholder="Country"     value="<?php echo $shipping->country?>" required="">
                        </div>
                      
                    </div>
                    
                    
                  
              
 
                  
                  <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#addressForm').load();" name="saveAddress">Save
                    
                     </button></a>&nbsp;&nbsp;
                  
                  </p>
              </div>
          </div>
      </div>
</form>

              
                