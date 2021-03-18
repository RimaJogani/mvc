<?php
$customers=$this->customerData();
?>
<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Customer Details</h3>
              
              <a class="btn btn-md  text-white bg-dark" onclick="mage.setUrl('<?php echo $this->getUrl('customer','form');?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD CUSTOMER</a>
              
            
              <table class="table table-success table-striped mt-4">
                <thead>
                  <tr>
                    <th scope="col">Customer Group</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">Zipcode</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php if(!$customers): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else:  foreach($customers->getData() as $key => $data):
                   echo $data->customergroupName; ?>
                <tr>
                <td><?php echo $data->customerGroupName ?></td>
                <td><?php echo $data->firstName ?></td>
                <td><?php echo $data->lastName ?></td>
                <td><?php echo $data->email ?></td>
                <td><?php echo $data->contactNo ?></td>
                 <td><?php echo $data->zipcode ?></td>
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
                
                else:
                  $label='Desable';
                endif;
        
        ?>
                    <td>
                    <?php if($data->status == 1):?>
                     <button type="button" class="btn bg-danger text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('customer','status',['id'=>$data->customerId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Desable</a></button>
                     <?php else:?>
                      <button type="button" class="btn bg-success text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('customer','status',['id'=>$data->customerId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Enable</a></button>
                    <?php endif;?>
                     
                <button type="button" class="btn bg-success btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('customer','form',['id'=>$data->customerId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">edit</a></button>
               <button type="button" class="btn bg-danger text-white btn-sm"  ><a onclick="mage.setUrl('<?php echo $this->getUrl('customer','delete',['id'=>$data->customerId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">delete</a></button></td>
            
            </tr>
           <?php endforeach;endif;?>   
          
                </tbody>
              </table>
            </div>
       </div>
   </section>

   