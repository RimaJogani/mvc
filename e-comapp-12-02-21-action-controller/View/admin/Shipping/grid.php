<?php

$shippings=$this->getShippings();


?>
 <section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Shipping Details</h3>
              
              <a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('shipping','form');?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD Shipping</a>
             
            
              <table class="table table-success table-striped mt-4">
              
                <thead>

                  <tr>
                    <th scope="col">Shipping Name</th>
                    <th scope="col">Shipping Code</th>
                    <th scope="col">Shipping Amount</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!$shippings): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else :  foreach($shippings->getData() as $key => $data): ?>
                  <tr id="data">
                        <td><?php echo $data->shippingName ?></td>
                        <td><?php echo $data->shippingCode?></td>
                        <td><?php echo $data->shippingAmount ?></td>
                        <td><?php echo $data->description ?></td>
                       
                       
                        <td><?php 
                                if($data->status) :  echo 'Enabled';
                               else: echo 'Disabled';
                                 endif;   
                                
                            ?>
                        </td>
                        
                        <td><?php echo $data->createDate ?></td>   
                        <td>
                    <?php if($data->status == 1):?>
                     <button type="button" class="btn bg-danger text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('shipping','status',['id'=>$data->shippingId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Desable</a></button>
                     <?php else :?>
                      <button type="button" class="btn bg-success text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('shipping','status',['id'=>$data->shippingId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Enable</a></button>
                    <?php endif;?>
                     </td> 
                     
                        <td><button type="button" class="btn bg-success btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('shipping','form',['id'=>$data->shippingId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">edit</a></button></td>
                        <td><button type="button" class="btn bg-danger btn-sm text-white"><a onclick="mage.setUrl('<?php echo $this->getUrl('shipping','delete',['id'=>$data->shippingId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">delte</a></button></td>
                        
                  </tr>
                  <?php endforeach;
                        endif;?> 
                </tbody>
              </table>
            </div>
       </div>
   </section>

   