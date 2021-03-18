<?php
$customerGroups=$this->getCustomerGroups();
?>
<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>customerGroups Details</h3>
              
              <a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('Customer_CustomerGroup','form');?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD CustomerGroup</a>
            
            
              <table class="table table-success table-striped mt-4">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">CreateDate</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!$customerGroups): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else: foreach($customerGroups->getData() as $key => $data):
                 
                  ?>
                  <tr id="data">
                  <td><?php echo $data->customerGroupName ?></td>
                <td><?php 
                        if($data->status):
                            echo 'Enabled';
                        else:
                            echo 'Disabled';
                        endif;
                    ?>
                </td>
                <td><?php echo $data->createDate ?></td>

                <?php
                
                        if($data->status == 1):
                          $label='Enable';
                        else :
                          $label='Desable';
                        endif;
                
                ?>
                <td>
                    <?php if($data->status == 1):?>
                     <button type="button" class="btn bg-danger text-white btn-sm"> <a onclick=" mage.setUrl('<?php echo $this->getUrl('Customer_customerGroup','status',['id'=>$data->customerGroupId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Desable</a></button>
                     <?php else:?>
                      <button type="button" class="btn bg-success text-white btn-sm"> <a onclick=" mage.setUrl('<?php echo $this->getUrl('Customer_customerGroup','status',['id'=>$data->customerGroupId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Enable</a></button>
                    <?php endif;?>
                     
               <button type="button" class="btn bg-success text-white btn-sm"><a  onclick=" mage.setUrl('<?php echo $this->getUrl('Customer_customerGroup','form',['id'=>$data->customerGroupId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">edit</a></button>
                <button type="button" class="btn bg-danger text-white   btn-sm"><a onclick=" mage.setUrl('<?php echo $this->getUrl('Customer_customerGroup','delete',['id'=>$data->customerGroupId]);?>').resetParams().load();" href="javascript:void(0)"  class="text-white">delete</button></a></td>
            
                  </tr>
                  <?php  endforeach;endif;?>
                </tbody>
              </table>
            </div>
       </div>
   </section>

   
   