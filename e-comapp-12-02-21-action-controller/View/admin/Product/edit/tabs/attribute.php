<?php

$attribute=$this->getAttribute();

?>

 <form method="post" id="attributeForm" action="<?php echo $this->getUrl('product','save'); ?>">
<div class="bg-light p-5 rounded mx-auto">
              
          <div class="row g-3">
               
                  <?php if($attribute) : ?>
                  	<?php foreach($attribute->getData() as $attribute):?>

                  		<?php if($attribute->inputType == 'select'):?>
                  		<div class="col-sm-6"><label><?php echo $attribute->name?></label>
	                    	<div class="switch">
	                            <select name="product[<?php echo  $attribute->name?>]" class="form-control" >
	                              <?php foreach($option=$this->getOption($attribute->attributeId)->getData() as $option):?>
	                              <option value="<?php echo $option->name?>"><?php echo $option->name?></option>
	                              <?php endforeach;?>
	                            </select>
	                        </div>
	                	</div>  
                    	<?php endif;?>

                    	<?php if($attribute->inputType == 'text'):?>
                	 	<div class="col-sm-6"><label><?php echo $attribute->name?></label>
                        	<input type="<?php echo $attribute->inputType?>" class="form-control"  name="product[<?php echo $attribute->name?>]"  required="">
                		</div>
                    	<?php endif;?>

                    	<?php if($attribute->inputType == 'textarea'):?>
                	 	<div class="col-sm-6"><label><?php echo $attribute->name?></label>
                        	<textarea  class="form-control"  name="product[<?php echo $attribute->name?>]" required=""></textarea>
                		</div>
                    	<?php endif;?>

                    	<?php if($attribute->inputType == 'checkbox'):?>
                	 	<div class="col-sm-6"><label><?php echo $attribute->name?></label>
                	 		<?php foreach($option=$this->getOption($attribute->attributeId)->getData() as $option):?>
	                          
                                    <input type="<?php echo $attribute->inputType?>" name=""   /><?php echo $option->name?>
                                    <span></span>
                             	
	                        <?php endforeach;?>
                        	 
                		</div>
                    	<?php endif;?>

                    	<?php endforeach;?>
                    	<?php endif;?>
                    
                    <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#attributeForm').load();" name="save">Save
                   
                     </button></a>&nbsp;&nbsp;
                   
                  </p>
              </div>
            </div>
   </form>     
