<?php
$categories=$this->getCategories();
?>
<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Categories Details</h3>
              
              <a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('category','form');?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD CATEGORY</a>
            
            
              <table class="table table-success table-striped mt-4">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!$categories): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else: foreach($categories->getData() as $data): ?>
                  <tr id="data">
                  <td><?php echo $this->getName($data->pathId) ?></td>
                  <td><?php 
                          if($data->status):
                              echo 'Enabled';
                          else:
                              echo 'Disabled';
                          endif;
                      ?>
                  </td>
                <td><?php echo $data->description ?></td>

                <?php
                
                        if($data->status == 1):
                          $label='Enable';
                        else:
                          $label='Desable';
                        endif;
                
                ?>
               <td>
                    <?php if($data->status == 1):?>
                     <button type="button" class="btn bg-danger text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('category','status',['id'=>$data->categoryId,'status'=>$data->status]);?>').resetParams().load(); " href="javascript:void(0)" class="text-white">Desable</a></button>
                     <?php else:?>
                      <button type="button" class="btn bg-success text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('category','status',['id'=>$data->categoryId,'status'=>$data->status]);?>').resetParams().load(); " href="javascript:void(0)" class="text-white">Enable</a></button>
                    <?php endif;?>
                    
               <button type="button" class="btn bg-success text-white btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('category','form',['id'=>$data->categoryId]);?>').resetParams().load(); " href="javascript:void(0)"  class="text-white">edit</a></button>
               <button type="button" class="btn bg-danger text-white   btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('category','delete',['id'=>$data->categoryId]);?>').resetParams().load(); " href="javascript:void(0)" class="text-white">delete</button></a></td>
            
                  </tr>
                  <?php endforeach;?>
                   <?php endif;?>
                </tbody>
              </table>
            </div>
       </div>
   </section>

   