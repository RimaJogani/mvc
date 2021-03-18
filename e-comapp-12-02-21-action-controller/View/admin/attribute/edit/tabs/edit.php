<?php

$attribute=$this->getAttribute();

?>
<form class="needs-validation" id="attributeForm" action="<?php echo $this->getUrl('attribute','save');?>" method="post">
<div class="bg-light p-5 rounded mx-auto">
              <button type="button" class="btn bg-dark btn-md d-flex justify-content-right"><a onclick="mage.setUrl('<?php echo $this->getUrl('Attribute','gridHtml');?>').resetParams().load();" href="javascript:void(0)" class="text-white "> View Attribute</a> </button>
              <?php if($this->getRequest()->getGet('id')):?>
            <h3 class="d-flex justify-content-center">Update Attribute</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Add Attribute</h3>
            <?php endif;?>
          <div class="row g-3">
               
                    <div class="col-sm-6"><label>Name</label>
                        <input type="text" class="form-control"  name="attribute[name]"   value="<?php echo $attribute->name?>" required="">
                    </div>
                    
                    <div class="col-sm-6"><label>Code</label>
                        <input type="text" class="form-control"  name="attribute[code]"  value="<?php echo $attribute->code?>" required="">
                    </div>

                    <div class="col-sm-6"><label>EntityType</label>
                      
                     <div class="switch">
                            <select name="attribute[entityTypeId]" class="form-control" >
                              <?php foreach($attribute->getEntityTypeOptions() as $key => $value):?>
                              <option value="<?php echo $key?>" <?php if($attribute->entityTypeId == $key):?> selected <?php endif;?>><?php echo $value?></option>
                              <?php endforeach;?>
                            </select>
                        </div>
                     </div>

                   <div class="col-sm-6"><label>BackendType</label>
                      
                       <div class="switch">
                            <select name="attribute[backendType]" class="form-control" >
                                <?php foreach($attribute->getBackendTypeOptions() as $key => $value):?>
                                <option value="<?php echo $key?>" <?php if($attribute->backendType == $key):?> selected <?php endif;?> ><?php echo $value?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12"><label>InputType</label>
                      
                       <div class="switch">
                            <select name="attribute[inputType]" class="form-control" >
                                <?php foreach($attribute->getInputTypeOptions() as $key => $value):?>
                                <option value="<?php echo $key?>" <?php if($attribute->inputType == $key):?> selected <?php endif;?> ><?php echo $value?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6"><label>Sort Order</label>
                      <input type="text" class="form-control"  name="attribute[sortOrder]"  value="<?php echo $attribute->sortOrder?>" required="">
                    </div>
                    
                    <div class="col-sm-6"><label>Backend Model</label>
                        <input type="text" class="form-control"  name="attribute[backendModel]"  value="<?php echo $attribute->backendModel?>" required="">
                    </div>



                  </div>
                      <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#attributeForm').load();" name="save">Save
                   
                     </button></a>&nbsp;&nbsp;
                   
                  </p>
              </div>
            </div>
          </form>
          