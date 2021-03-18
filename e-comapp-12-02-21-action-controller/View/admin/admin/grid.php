<?php
$admins=$this->getAdmins();
?>
<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Admins Details</h3>
             <!--  onclick="mage.setUrl('<?php //echo $this->getUrl('admin','form');?>').load();" href="javascript:void(0)" -->
              <a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('admin','form')?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD ADMIN</a>
            
            
              <table class="table table-success table-striped mt-4">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                   
                    <th scope="col">CreatedDate</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!$admins): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else: foreach($admins->getData() as $key => $data): ?>
                  <tr id="data">
                  <td><?php echo $data->adminName ?></td>
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
                     <button type="button" class="btn bg-danger text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('admin','status',['id'=>$data->adminId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Desable</a></button>
                     <?php else:?>
                      <button type="button" class="btn bg-success text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('admin','status',['id'=>$data->adminId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Enable</a></button>
                    <?php endif;?>
                    
                <button type="button" class="btn bg-success text-white btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('admin','form',['id'=>$data->adminId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">edit</a></button>
               <button type="button" class="btn bg-danger text-white   btn-sm"><a 
                onclick="mage.setUrl('<?php echo $this->getUrl('admin','delete',['id'=>$data->adminId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">delete</button></a></td>
            
                  </tr>
                  <?php endforeach;endif;?>
                </tbody>
              </table>
            </div>
       </div>
   </section>

   