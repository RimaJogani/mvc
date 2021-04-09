<?php
//echo '<pre>';
$configGroup=$this->getConfigGroup();
//print_r($configGroup);
$configs=$configGroup->getConfigs();
//print_r($configs);

?>


<section>
       <div class="container pt-4">
          
            <div class="bg-light p-5 rounded">
              <form class="needs-validation" id="configForm" action="<?php echo $this->getUrl('configGroup_config','update');?>" method="post">
            <!-- <button class="btn bg-success text-white btn-sm" type="submit" onclick="updateForm(this)">Update</button> -->
              <button class="btn bg-success text-white btn-sm" type="button" onclick="mage.resetParams().setForm('#configForm').load();">Update</button>
              <h3>config Details</h3>
              
             
            
            
              <table class="table table-success table-striped mt-4" id="existingConfig">
                
                <tbody>
                  <?php if($configs):?>
                    
                    <?php foreach($configs->getData() as $data) :?>
                  <tr id="data">
                 
                      <td> <input type="text" class="form-control"  name="exist[<?php echo $data->configId ?>][title]" placeholder="Title" value="<?php echo $data->title ?>"></td>
                      <td> <input type="text" class="form-control"  name="exist[<?php echo $data->configId ?>][code]" placeholder="Code" value="<?php echo $data->code ?>"></td>
                      <td> <input type="text" class="form-control"  name="exist[<?php echo $data->configId ?>][value]" placeholder="Value" value="<?php echo $data->value ?>"></td>
                      <td><button class="btn bg-dark text-white btn-sm" type="submit"  value="Remove Option" onclick="removeRow(this);">Remove Config</button></td>
                      
            
                  </tr>
                  <?php endforeach;?>
                  <?php else :?>
                    <tr id="data">
                       
                      <td> <input type="text" class="form-control"  name="new[title][]" placeholder="Title"></td>
                      <td> <input type="text" class="form-control"  name="new[code][]" placeholder="Code"></td>
                      <td> <input type="text" class="form-control"  name="new[value][]" placeholder="Value"></td>
                      
                      
                      <td><button class="btn bg-dark text-white btn-sm" type="submit"  value="Remove Option" onclick="removeRow(this);">Remove Option</button></td>
            
                  </tr>
                <?php endif;?>
                </tbody>
              </table>
               </form> 
               <input class="btn bg-success text-white btn-sm" type="submit" name="addOption" value="Add" onclick="addRow();">
            </div>

       </div>
   </section>

 
  <div style="display: none">
  <table id="newConfig">
    <tbody>
      <tr>
        

        <td> <input type="text" class="form-control"  name="new[title][]" placeholder="Title"></td>
        <td> <input type="text" class="form-control"  name="new[code][]" placeholder="Code"></td>
        <td> <input type="text" class="form-control"  name="new[value][]" placeholder="Value"></td>
        
        <td><button class="btn bg-dark text-white btn-sm" type="submit"  value="Remove Option" onclick="removeRow(this);">Remove Option</button></td>

      </tr>
      </tbody>
  </table>
</div>
  <script type="text/javascript">
    
    function addRow(){
      var newConfigTable=document.getElementById('newConfig');
      var existingConfigTable = document.getElementById('existingConfig').children[0];
      existingConfigTable.prepend(newConfigTable.children[0].children[0].cloneNode(true));

    }
    function removeRow(button) {
      // var objTr = button.parentElement.parentElement;
      var objTr = $(button).closest('tr');
      
      objTr.remove();
      
    }
    function updateForm(button){
      var form=$(button).closest('form');
      form.attr('action',"<?php echo $this->getUrl('configGroup\config','update',['id'=>$configGroup->groupId]);?>");
      form.submit();
    }
  </script>

