<!-- <?php// if(!$this->getRequest()->getGet('id')): ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h4 class="display-5">Registration Required</h4>
            <p class="lead">Access Denied !</p>
            <hr class="my-2">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Login First !</a>
            </p>
        </div>
    </div>
    <?php
   //else:
?> -->

<form method="post" id="mediaForm" action="<?php echo $this->getUrl('product\productmedia','check'); ?>" enctype="multipart/form-data">
     <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
                <h4 class="card-title">
                    <p class="h2 text-center">Media</p><br>
                </h4>
                
                    <div class="text-right">
                        <button class="btn waves-effect waves-dark yellow" type="button" onclick="mage.resetParams().setForm('#mediaForm').load();" name="update">Update
                            edit
                        </button>
                        <button class="btn waves-effect waves-light red" type="button" onclick="mage.resetParams().setForm('#mediaForm').setUrl('<?php echo $this->getUrl('product\productmedia','delete'); ?>').load();" name="delete">Delete
                            delete
                        </button>
                    </div>
                    <p class="card-text">
                    <div class="row">

                        <table class="highlight">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Label</th>
                                    <th>Small</th>
                                    <th>Thumb</th>
                                    <th>Base</th>
                                    <th>Gallery</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $imageData = $this->getImageData($this->getRequest()->getGet('id'));
                                
                                    if(!$imageData):?>
                                    
                                    <tr>
                                        <th colspan="5" class="text-center">No Images Uploaded For This Product</th>                                    
                                    </tr>
                                    <?php else: ?>
                                    <?php foreach ($imageData->getData() as $value) :?>                               
                                    <tr>
                                        <td><img src="./skin/admin/images/<?php echo $value->productId.$value->imageName ?>" height="100px" width="100px" alt=""></td>
                                        <td><input type="text" name="image[<?php echo $value->productMediaId; ?>][imageLabel]" value="<?php echo $value->imageLabel; ?>"> </td>
                                        <td> 
                                            <label>
                                                <input value="<?php echo $value->productMediaId; ?>" name="image[small]" type="radio" <?php echo $value->small ? "checked" : "" ?> />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input value="<?php echo $value->productMediaId; ?>" name="image[thumb]" type="radio" <?php echo $value->thumb ? "checked" : "" ?> />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input value="<?php echo $value->productMediaId; ?>" name="image[base]" type="radio" <?php echo $value->base ? "checked" : "" ?> />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="image[<?php echo $value->productMediaId; ?>][gallery]" <?php echo $value->gallery ? "checked" : "" ?> />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="image[<?php echo $value->productMediaId; ?>][remove]" />
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

        mage.setUrl('<?php echo $this->getUrl('product_productMedia','save');?>');
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

        