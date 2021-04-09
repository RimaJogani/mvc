
<form method="post" id="mediaForm" action="<?php echo $this->getUrl('Brand','check'); ?>" enctype="multipart/form-data">
     <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
                <h4 class="card-title">
                    <p class="h2 text-center">Media</p><br>
                </h4>
                
                    <div class="text-right">
                        <button class="btn waves-effect waves-dark yellow" type="button" onclick="mage.resetParams().setForm('#mediaForm').load();" name="update">Update
                            edit
                        </button>
                        <button class="btn waves-effect waves-light red" type="button" onclick="mage.resetParams().setForm('#mediaForm').setUrl('<?php echo $this->getUrl('brand','delete'); ?>').load();" name="delete">Delete
                            delete
                        </button>
                    </div>
                    <p class="card-text">
                    <div class="row">

                        <table class="highlight">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $imageData = $this->getImageData();
                                
                                    if(!$imageData):?>
                                    
                                    <tr>
                                        <th colspan="5" class="text-center">No Images Uploaded</th>                                    
                                    </tr>
                                    <?php else: ?>
                                    <?php foreach ($imageData->getData() as $value) :?>                               
                                    <tr>
                                        <td><?php echo $value->brandId;?></td>
                                        <td><img src="./skin/admin/images/brand/<?php echo $value->brandImage?>" height="100px" width="100px" alt=""></td>
                                        <td><input type="text" name="image[<?php echo $value->brandId; ?>][brandName]" value="<?php echo $value->brandName; ?>"> </td>
                                        <td> 
                                            <input type="text" name="image[<?php echo $value->brandId ?>][sortOrder]" value="<?php echo $value->sortOrder; ?>">
                                        </td>
                                        <td>
                                            <?php if($value->status == 0):?>
                                             <button type="button" class="btn bg-danger text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('brand','status',['id'=>$value->brandId,'status'=>$value->status]);?>').resetParams().load(); " href="javascript:void(0)" class="text-white">Desable</a></button>
                                             <?php else:?>
                                              <button type="button" class="btn bg-success text-white btn-sm"> <a onclick="mage.setUrl('<?php echo $this->getUrl('brand','status',['id'=>$value->brandId,'status'=>$value->status]);?>').resetParams().load(); " href="javascript:void(0)" class="text-white">Enable</a></button>
                                            <?php endif;?>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="image[<?php echo $value->brandId; ?>][remove]" />
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>   
                                <?php endif; ?>
                            </tbody>

                        </table>
                        </div>
                        </p>
                    </div>

                
                <!-- <form method="post" action="<?php //echo $this->getUrl('product\productMedia','save'); ?>" enctype="multipart/form-data"> -->
                    <div class="form-group">
                        <label for="file">Example file input</label>
                        <input type="file" id="file" class="form-control-file" name="image">

                    </div>
                    <button class="btn waves-effect waves-dark btn-dark" id="btnUpload" type="button" >Upload
                        
                    </button>

            </div>
            <!-- </form> -->
        </div>
    </div>
</form>

<script type="text/javascript">
    
$(document).ready(function(){

    $('#btnUpload').click(function(){

        mage.setUrl('<?php echo $this->getUrl('brand','save');?>');
        var fData= new FormData();
        //alert(fData);
        var files = $('#file')[0].files;
       // alert(files);
        if(files.length > 0)
        {
            fData.append('image',files[0]);
            $.ajax({

                        url: mage.getUrl(),
                        type: 'post',
                        data: fData,
                        contentType: false,
                        processData: false,
                        success: function(response)
                        {
                            $.each(response.element, function (i, element) {
                            $(element.selector).html(element.html);
                            //alert(element.selector+' '+element.html);
                            });
                        }
                    });
        }
        else
        {
            alert("Please select a file.");
        }

    });

});


</script>

        