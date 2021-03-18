<?php

$attribute=$this->getAttribute();
$option=$attribute->getOptions();

?>

<section>
       <div class="container pt-4">
       		
            <div class="bg-light p-5 rounded">
              <form class="needs-validation" id="optionForm" action="<?php echo $this->getUrl('attribute_option','update');?>" method="post">
        		<!-- <button class="btn bg-success text-white btn-sm" type="submit" onclick="updateForm(this)">Update</button> -->
        		  <button class="btn bg-success text-white btn-sm" type="button" onclick="mage.resetParams().setForm('#optionForm').load();">Update</button>
              <h3>Option Details</h3>
              
             
            
            
              <table class="table table-success table-striped mt-4" id="existingOption">
                
                <tbody>
                  <?php if($option):?>
                    
                    <?php foreach($option->getData() as $data) :?>
                  <tr id="data">
                 
		                  <td> <input type="text" class="form-control"  name="exist[<?php echo $data->optionId ?>][name]" placeholder="Name" value="<?php echo $data->name ?>"></td>
		                  <td><input type="text" class="form-control"  name="exist[<?php echo $data->optionId ?>][sortOrder]"  placeholder="SortOrder" value="<?php echo $data->sortOrder ?>"></td>
		                  <td><button class="btn bg-dark text-white btn-sm" type="submit"  value="Remove Option" onclick="removeRow(this);">Remove Option</button></td>
		                  
            
                  </tr>
                  <?php endforeach;?>
                  <?php else :?>
                    <tr id="data">
                   
                      <td> <input type="text" class="form-control"  name="new[name]" placeholder="Name"></td>
                      <td><input type="text" class="form-control"  name="new[SortOrder]"  placeholder="SortOrder"></td>
                      <td><button class="btn bg-dark text-white btn-sm" type="submit"  onclick="removeRow(this);">Remove Option</button></td>
            
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
  <table id="newOption">
  	<tbody>
  		<tr>
        <?php if($attribute->attributeId):?>
 <input type="hidden" name="new[attributeId]" value="<?php echo $attribute->attributeId;?>">
<?php endif;?>
  			<td> <input type="text" class="form-control"  name="new[name]" placeholder="Name"></td>
     		<td><input type="text" class="form-control"  name="new[SortOrder]"  placeholder="SortOrder"></td>
          	<td><button class="btn bg-dark text-white btn-sm" type="submit"  value="Remove Option" onclick="removeRow(this);">Remove Option</button></td>

  		</tr>
  		</tbody>
  </table>
</div>
  <script type="text/javascript">
  	
  	function addRow(){
  		var newOptionTable=document.getElementById('newOption');
  		var existingOptionTable = document.getElementById('existingOption').children[0];
  		existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));

  	}
  	function removeRow(button) {
  		// var objTr = button.parentElement.parentElement;
      var objTr = $(button).closest('tr');
  		
  		objTr.remove();
  		
  	}
    function updateForm(button){
      var form=$(button).closest('form');
      form.attr('action',"<?php echo $this->getUrl('attribute\option','update');?>");
      form.submit();
    }
  </script>