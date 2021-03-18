<?php
$customerGroups=$this->getCustomerGroup();


?>
<form method="Post" id="groupPriceForm" action="<?php echo $this->getUrl('product\groupPrice','save')?>">
<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Group Price Details</h3>
            
              <button class="btn waves-effect waves-dark bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#groupPriceForm').load();">update</button>
             
            
              <table class="table table-success table-striped mt-4">
              
                <thead>

                  <tr>
                    <th scope="col">Group Id</th>
                    <th scope="col">Group Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Group Price</th>
                  </tr>
                </thead>
                <tbody>
               <?php if(!$customerGroups): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else:  foreach($customerGroups->getData() as $key => $data):  ?>
                      <?php $rowStatus = ($data->entityId) ? 'exit' : 'new' ?>
                  <tr id="data">
                        <td><?php echo $data->customerGroupId; ?></td>
                        <td><?php echo $data->customerGroupName; ?></td>
                        <td><?php echo $data->productPrice ?></td>
                        <td><input type="text" value="<?php echo $data->price ?>" name="groupPrice[<?php echo $rowStatus ?>][<?php echo $data->customerGroupId?>]"></td>
                        
                        
                  </tr>
                  <?php endforeach;endif;?> 
                </tbody>
              </table>
            </div>
       </div>
   </section>

   
   
</form>