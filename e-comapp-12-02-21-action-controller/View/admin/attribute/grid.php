<?php
$attributes=$this->getAttributes();
?>
<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Attributes Details</h3>
              
              <a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('attribute','form');?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD Attributes</a>
            
            
              <table class="table table-success table-striped mt-4">
                <thead>
                  <tr>
                    <th scope="col">Attribute Id</th>
                    <th scope="col">EntityType</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Inpute Type</th>
                    <th scope="col">Backend Type</th>
                    <th scope="col">Sort Order</th>
                    <th scope="col">Backend Model</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!$attributes): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else: foreach($attributes->getData() as $data): ?>
                  <tr id="data">
                 
                  <td><?php echo $data->attributeId ?></td>
                  <td><?php echo $data->entityTypeId ?></td>
                  <td><?php echo $data->name ?></td>
                  <td><?php echo $data->code ?></td>
                  <td><?php echo $data->inputType ?></td>
                  <td><?php echo $data->backendType ?></td>
                  <td><?php echo $data->sortOrder ?></td>
                  <td><?php echo $data->backendModel ?></td>
                  <td>
                        
                        
                   <button type="button" class="btn bg-success text-white btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('attribute','form',['id'=>$data->attributeId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">edit</a></button>
                   <button type="button" class="btn bg-danger text-white   btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('attribute','delete',['id'=>$data->attributeId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">delete</button></a>
                 </td>
             
                  </tr>
                  <?php endforeach;?>
                   <?php endif;?>
                </tbody>
              </table>
            </div>
       </div>
   </section>

   