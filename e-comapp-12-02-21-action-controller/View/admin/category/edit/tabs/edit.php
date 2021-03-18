<?php
$categories=$this->getParentOptions();
$category=$this->getCategory();
?>
<form class="needs-validation" id="categoryForm" action="<?php echo $this->getUrl('category','save');?>" method="post">
<div class="bg-light p-5 rounded mx-auto">
              <button type="button" class="btn bg-dark btn-md d-flex justify-content-right"><a onclick="mage.setUrl('<?php echo $this->getUrl('category','gridHtml');?>').resetParams().load();" href="javascript:void(0)" href="" class="text-white "> View Category</a> </button>
              <?php if($this->getRequest()->getGet('id')):?>
            <h3 class="d-flex justify-content-center">Update Category</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Add Category</h3>
            <?php endif;?>
          <div class="row g-3">
               
                    <div class="col-sm-6">
                      <input type="text" class="form-control"  name="category[categoryName]" placeholder="Name"  value="<?php echo $category->categoryName?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                      
                    </div>
                    
                    <div class="form-check form-switch col-sm-4 mt-5">
                        
                    <div class="switch">
                            <select name="category[status]" class="form-control" >
                            <?php foreach($category->getStatusOptions() as $key => $value):?>
                        <option value="<?php echo $key?>" <?php if($category->status == $key):?> selected <?php endif;?>><?php echo $value?></option>
                    <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      
                      <input type="text" class="form-control" id="description" name="category[description]" placeholder="Description"  value="<?php echo $category->description?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                     </div>

                <div class="switch">
                            
                              <select name="category[parentId]" class="form-control" >
                            
                               <?php foreach($categories as $key => $categoryName):?>
                               <option value="<?php echo $key ?>"<?php if($key ==$category->parentId):?> selected <?php endif;?>><?php echo $categoryName;?></option>
                               <?php endforeach;?>
                                </select>
                            
                        </div>
                  </div>
                      <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#categoryForm').load();" name="save">Save
                   
                     </button></a>&nbsp;&nbsp;
                   
                  </p>
              </div>
            </div>
          </form>
          