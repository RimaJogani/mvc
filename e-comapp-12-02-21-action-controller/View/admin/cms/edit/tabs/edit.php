<?php
$cms=$this->getCms();
?>
 <div class="bg-light p-5 rounded mx-auto">
              <button type="button" class="btn bg-dark btn-md d-flex justify-content-right"><a onclick="mage.setUrl('<?php echo $this->getUrl('cms','gridHtml');?>').resetParams().load();" href="javascript:void(0)" class="text-white"> View CMS</a> </button>
           <?php if($this->getRequest()->getGet('id')):?>
            <h3 class="d-flex justify-content-center">Update CMS</h3>
            <?php else:?>
            <h3 class="d-flex justify-content-center">Add CMS</h3>
            <?php endif;?>
              <div class="row g-3">
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="cms[title]" placeholder="Title" value="<?php echo $cms->title?>" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
        
                    <div class="col-sm-6">
                     
                      <input type="text" class="form-control"  name="cms[identifier]" placeholder="Identifier" value="<?php echo $cms->identifier?>" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
        
                    
                    <div class="col-sm-12">
                      <div class="switch">
                            <select name="cms[status]" class="form-control" >
                            <?php foreach($cms->getStatusOptions() as $key => $value):?>
                        <option value="<?php echo $key?>" <?php if($cms->status == $key):?> selected <?php endif;?>><?php echo $value?></option>
                    <?php endforeach;?>
                            </select>
                           
                        </div>
                     
                    </div>
                    
                  <div class="col-sm-12">
                     <div class="adjoined-bottom">
    <div class="grid-container">
      <div class="grid-width-100">
        <div id="editor">
          
        </div>
      </div>
    </div>
  </div>
<input type="hidden" id="getData" name="cms[content]">
<input type="hidden" id="setData"  value="<?php echo htmlentities($cms->content); ?>">
                  </div>
                  <p class="d-flex justify-content-center">
                  <button class="btn waves-effect waves-light bg-dark text-white" type="button" name="save" onclick="mage.resetParams().setParams(setcontent()).setForm('#cmsForm').load();">Save
                   
                     </button></a>&nbsp;&nbsp;
                    
                  </p>
              </div>

  <script>
  initSample();
function setcontent(){

  var data = CKEDITOR.instances.editor.getData();
  document.getElementById("getData").value = data;

}
var setdata =  document.getElementById("setData").value;
CKEDITOR.instances['editor'].setData(setdata);

</script>