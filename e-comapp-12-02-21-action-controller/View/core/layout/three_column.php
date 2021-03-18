<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="<?php echo $this->baseurl('skin/admin/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl('skin/admin/js/mage.js');?>"></script>
    <script src="<?php echo $this->baseurl('skin/admin/js/ckeditor.js');?>"></script>
    <script src="<?php echo $this->baseurl('skin/admin/js/sample.js');?>"></script>
  </head>
  <body>

  <div class="container-fluid">
            <div class = "row">
            <div class="w-100">
                 <div class ="text-white text-center"> <?php echo $this->getChild('headerLink')->toHtml();?> </div>
            </div>
            </div>
        
            <div class = "row mt-4">
                <div class="col-sm-2     border" style="height:530px">
                    <h2 class="text-black"></h2>
                    <?php echo $this->getChild('leftTab')->toHtml();?>
                </div>

                <div class="col-sm-10 border" >
                   
                    <?php echo $this->createBlock('block\core\layout\message')->toHtml(); ?>
                
                    <?php  echo $this->getChild('content')->toHtml();?>
                  
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="w-100">
                    <?php print_r($this->getChild('footer')->toHtml()); echo  $this->getChild('footer')->toHtml();?>
                </div>
        </div>
  </div>
  
    
  </body>
</html>