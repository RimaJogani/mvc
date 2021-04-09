<?php
$products=$this->getCollections();
$actions=$this->getActions();
//print_r($actions);
$columns=$this->getColumns();
$status=$this->getStatus();
$buttons=$this->getButtons();
$filters=$this->getFilters();
$filterButtons=$this->getFilterButtons();


//print_r($columns);

?>

   <section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3><?php $this->getTitle();?></h3>
              

                    <?php if ($buttons): ?>
                      <?php foreach ($buttons as $key => $button): ?>
                          <?php if ($button['ajax']): ?>
                              <a href="javascript:void(0)" class="<?php echo $button['class'] ?>" onclick="<?php echo $this->getButtonUrl($button['method'], $button['ajax'])?>" ><?php echo $button['label']?></a>
                          <?php else: ?>
                              <a href="<?php echo $this->getButtonUrl($button['method']);?>"><?php $button['label']?></a>
                          <?php endif;?>
                      <?php endforeach;?> 
                  <?php endif;?>

             
             <form id="filter" action="<?php echo $this->getUrl('Filter','Filter');?>" method="post">
            
              <table class="table table-success table-striped mt-4">
              
                <thead>

                  <tr>
                    <?php if($filters):?>
                        <?php foreach($filters as $key => $filter):?>
                            <th scope="col"><input type="text" class="<?php echo $filter['class']?>" name="<?php echo $filter['name']?>" placeholder="<?php echo $filter['placeholder']?>" ></th>
                        <?php endforeach;?>
                    <?php endif;?>

                    <?php if($filterButtons):?>
                        <?php foreach($filterButtons As $key => $filters):?>
                            <th colspan="3">
                                <?php if($filters['ajax']):?>
                                 <th><a href="javascript:void(0)" class="<?php echo $filters['class']?>" onClick="mage.resetParams().setForm('#filter').load();"><?php echo $filters['label']?></a></th>
                                  <?php else :?>
                                    <th><a class="<?php echo $filters['class']?>"><?php echo $filters['label']?></a></th>
                                <?php endif;?>

                            </th>
                        <?php endforeach;?>
                        <th><!-- <button type="button" class="btn btn-outline-danger" onclick="//setText(); mage.resetParams().setForm('#filter').load();">Clear</button> --></th>
                    <?php endif;?>

                  </tr>








                  <tr>
                    <?php foreach($columns as $key => $column): ?>
                        <th> <?php echo $column['label']?></th>
                      <?php endforeach ;?>
                      <th colspan="4">Action</th>
                  </tr>
 
                </thead>
                <tbody>
                   <?php if(!$products): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else: foreach($products->getData() as $product): ?>
                    <tr id="data">
                        <?php foreach($columns as $key => $column ):?>
                            <td><?php echo $this->getFileValue($product,$column['field'])?></td>
                        <?php endforeach;?>
                       
                        <?php if($status): ?>
                          
                            <?php if ($status[0]['ajax']): ?>
                              <?php if($product->status == '1'):?>
                              <td><a href="javascript:void(0)" class="<?php echo $status[0]['class'] ?>" onclick="<?=$this->getMethodUrl($product, $status[0]['method'])?>" ><?php echo $status[0]['label']?></a></td>
                            <?php else: ?>
                              <td><a href="javascript:void(0)" class="<?php echo $status[1]['class'] ?>" onclick="<?=$this->getMethodUrl($product, $status[1]['method'])?>" ><?php echo $status[1]['label']?></a></td>
                          <?php endif;?>
                           <?php endif;?>
                      <?php endif;?>



                        <?php if ($actions): ?>
                          <?php foreach ($actions as $key => $action): ?>
                            <?php if ($action['ajax']): ?>
                              <td><a href="javascript:void(0)" class="<?php echo $action['class'] ?>" onclick="<?php echo $this->getMethodUrl($product, $action['method'], $action['ajax'])?>" ><?php echo $action['label']?></a></td>
                            <?php else: ?>
                               <td><a class="<?php echo $action['class']; ?>" href="<?php echo $this->getMethodUrl($product, $action['method'], false)?>"><?php echo $action['label'];?></a></td>
                          <?php endif;?>
                        <?php endforeach;?>
                      <?php endif;?>
                        
                   </tr>
                

                  <?php endforeach ;?>
                  <?php endif ;?>

             
                </tbody>
              </table>
              </form>
            </div>
       </div>
   </section>

  <script type="text/javascript">
    
    /*function setText() {
      $(".clear").each(function(){
        $(this).val('');
      });
    }*/

  </script>
   