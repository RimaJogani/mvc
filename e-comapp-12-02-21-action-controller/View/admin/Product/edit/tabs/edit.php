<?php
$product=$this->getTableRow();

print_r($product);
?>
 <form method="post" id="productForm" action="<?php echo $this->getUrl('product','save'); ?>">
<div class="bg-light p-5 rounded mx-auto">
             
              <?php if($this->getRequest()->getGet('id')):?>
            <h3 class="d-flex justify-content-center">Update Product</h3>
            <?php else :?>
            <h3 class="d-flex justify-content-center">Add Product</h3>
            <?php endif;?>
          <div class="row g-3">
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control" id="sku" name="product[SKU]" placeholder="SKU" value="<?php echo $product->SKU?>" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
        
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control" id="name" name="product[productName]" placeholder="Name" value="<?php echo $product->productName?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
        
                    
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control" id="price" name="product[productPrice]" value="<?php echo $product->productPrice?>" placeholder="Price" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
        
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control" id="discount" name="product[productDiscount]" value="<?php echo $product->productDiscount?>" placeholder="Discount" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                    
                    <div class="col-sm-12">
                     
                      <input type="text" class="form-control" id="description" name="product[description]" placeholder="Description" value="<?php echo $product->description?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                    <div class="col-sm-6">
                
                    <input id="quantity"  type="number" min="1" max="50" name="product[productQty]" class="validate"  value="<?php echo $product->productQty?>"placeholder="Quantity" >
                            
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                      
                    </div>
                    <div class="form-check form-switch col-sm-4 mt-5">
                        
                    <div class="switch">
                            
                    <select class="form-control" name='product[status]' id="status">
                        <?php foreach($product->getStatusOptions() as $key => $value):?>
                        <option value="<?php echo $key?>" <?php if($product->status == $key):?> selected <?php endif;?>><?php echo $value?></option>
                    <?php endforeach;?>
                            </select>
                        </div>
                   
                 
                 </div>
                  <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#productForm').load();" name="save">Save
                   
                     </button></a>&nbsp;&nbsp;
                   
                  </p>
               
              </div>
            </div>
          </form>