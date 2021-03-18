<?php
$admin=$this->getAdmin();
?>
 <form class="needs-validation"  action="<?php echo $this->getUrl('admin','save');?>" id="adminForm" method="post">
 <div class="bg-light p-5 rounded mx-auto">
              <?php if($this->getRequest()->getGet('id')):?>
            <h3 class="d-flex justify-content-center">Update Admin</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Add Admin</h3>
            <?php endif;?>
                <div class="row g-3">
                               
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="admin[adminName]" placeholder="Name"  value="<?php echo $admin->adminName?>" required="">
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                    
                  </div>
                  
                  <div class="form-check form-switch col-sm-4 mt-5">
                      
                  <div class="switch">
                          <select name="admin[status]" class="form-control" >
                          <?php foreach($admin->getStatusOptions() as $key => $value):?>
                      <option value="<?php echo $key?>" <?php if($admin->status == $key):?> selected <?php endif;?>><?php echo $value?></option>
                  <?php endforeach;?>
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-12">
                    
                    <input type="text" class="form-control" id="description" name="admin[adminPassword]" placeholder="Password"  value="<?php //echo $admin->adminPassword?>" required="">
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>


                    <p class="d-flex justify-content-center">
                <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#adminForm').load();" name="save">Save
                 
                   </button></a>&nbsp;&nbsp;
              </p>
            </div>
          </div>
      </div>
</form>