<?php

$payments=$this->getPayments();

?>

<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Payment Details</h3>
              
              <a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('payment','form');?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD Payment</a>
             
            
              <table class="table table-success table-striped mt-4">
              
                <thead>

                  <tr>
                    <th scope="col">Payment Name</th>
                    <th scope="col">Payment Code</th>
                    <th scope="col">Payment Amount</th>
                    <th scope="col">Discription</th>
                   
                    <th scope="col">Created At</th>
                     <th scope="col">Status</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php if(!$payments):?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else:  foreach($payments->getData() as $key => $data):
            ?>
                  <tr id="data">
                        <td><?php echo $data->paymentName ?></td>
                        <td><?php echo $data->paymentCode?></td>
                        <td><?php echo $data->paymentAmount ?></td>
                        <td><?php echo $data->description ?></td>
                       
                       
                        
                        <td><?php echo $data->createDate ?></td>   
                         <td><?php 
                                if($data->status):
                                    echo 'Enabled';
                                else:
                                    echo 'Disabled';
                               endif;
                            ?>
                        </td>
                    <td>
                    <?php if($data->status == 1):?>
                     <button type="button" class="btn bg-danger text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('payment','status',['id'=>$data->paymentId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Desable</a></button>
                     <?php else:?>
                      <button type="button" class="btn bg-success text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('payment','status',['id'=>$data->paymentId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Enable</a></button>
                    <?php endif; ?>
                     
                       <button type="button" class="btn bg-success btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('payment','form',['id'=>$data->paymentId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">edit</a></button>
                        <button type="button" class="btn bg-danger btn-sm text-white"><a onclick="mage.setUrl('<?php echo $this->getUrl('payment','delete',['id'=>$data->paymentId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">delte</a></button></td>
                        
                  </tr>
                  <?php endforeach;endif; ?> 
                </tbody>
              </table>
            </div>
       </div>
   </section>

   