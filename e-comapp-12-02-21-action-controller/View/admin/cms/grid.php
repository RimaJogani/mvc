<?php
$cmss=$this->getCmss();
?>
<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Cms Details</h3>
              
              <a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('cms','form');?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD CMS</a>
             
            
              <table class="table table-success table-striped mt-4">
              
                <thead>

                  <tr>
                    <th scope="col">Title/th>
                    <th scope="col">Identifier</th>
                    <th scope="col">Content</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!$cmss):?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else:  foreach($cmss->getData() as $key => $data):?>
                  <tr id="data">
                        <td><?php echo $data->title ?></td>
                        <td><?php echo $data->identifier?></td>
                        <td><?php echo $data->content ?></td>
                       <td><?php 
                                if($data->status):
                                    echo 'Enabled';
                                else:
                                    echo 'Disabled';
                                endif;
                            ?>
                        </td>
                        <td><?php echo $data->createDate ?></td>   
                    <td>
                    <?php if($data->status == 1):?>
                     <button type="button" class="btn bg-danger text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('cms','status',['id'=>$data->pageId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Desable</a></button>
                     <?php else:?>
                      <button type="button" class="btn bg-success text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('cms','status',['id'=>$data->pageId,'status'=>$data->status]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">Enable</a></button>
                    <?php endif;?>
                    <button type="button" class="btn bg-success btn-sm"><a onclick="mage.setUrl('<?php echo $this->getUrl('cms','form',['id'=>$data->pageId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">edit</a></button>
                       <button type="button" class="btn bg-danger btn-sm text-white"><a onclick="mage.setUrl('<?php echo $this->getUrl('cms','delete',['id'=>$data->pageId]);?>').resetParams().load();" href="javascript:void(0)" class="text-white">delte</a></button></td>
                        
                  </tr>
                  <?php endforeach;endif;?> 
                </tbody>
              </table>
            </div>
       </div>
   </section>

   
   