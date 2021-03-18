<?php
$products=$this->getProducts();
?>

   <section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Product Details</h3>
              
              <a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('product','form');?>').resetParams().load();" href="javascript:void(0);" role="button"> ADD PRODUCT</a>
             
            
              <table class="table table-success table-striped mt-4">
              
                <thead>

                  <tr>
                    <th scope="col">SKU</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
               <?php if(!$products): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else:  foreach($products->getData() as $key => $data): ?>
                  <tr id="data">
                        <td><?php echo $data->SKU ?></td>
                        <td><?php echo $data->productName ?></td>
                        <td><?php echo $data->productPrice ?></td>
                        <td><?php echo $data->productDiscount?></td>
                        <td><?php echo $data->productQty?></td>
                       
                        <td><?php 
                                if($data->status):
                                    echo 'Enabled';
                               else :
                                    echo 'Disabled';
                               endif;
                            ?>
                        </td>
                        <td><?php echo $data->description ?></td>
                        <td><?php echo $data->createDate ?></td>   
                       
                 <td>
                    <?php if($data->status == 1):?>
                     <button type="button" class="btn bg-danger text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('product','status',['id'=>$data->productId,'status'=>$data->status]);?>').resetParams().load();"
                      href="javascript:void(0)" class="text-white">Disable</a></button>
                     <?php else :?>
                      <button type="button" class="btn bg-success text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('product','status',['id'=>$data->productId,'status'=>$data->status]);?>').resetParams().load();"
                        href="javascript:void(0)" class="text-white">Enable</a></button>
                    <?php endif;?>
                     </td>
                        <td><button type="button" class="btn bg-success btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('product','form',['id'=>$data->productId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">edit</a></button></td>
                        <td><button type="button" class="btn bg-danger btn-sm text-white"><a onclick="mage.setUrl('<?php echo $this->getUrl('product','delete',['id'=>$data->productId]);?>').resetParams().load();"
                          href="javascript:void(0)" class="text-white">delte</a></button>
                          </td>
                        
                  </tr>
                  <?php endforeach;
                        endif;?> 
                </tbody>
              </table>
            </div>
       </div>
   </section>

   
   