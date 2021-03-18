<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script type="text/javascript" src="<?php echo $this->baseurl('skin/admin/js/jquery-3.6.0.js');?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl('skin/admin/js/mage.js');?>"></script>



  </head>
  <body>
  <div class="container-fluid">
            <div class = "row text-center">
                <div class="w-100">
                    <?php echo $this->getChild('headerLink')->toHtml();?>
                </div>
            </div>

            <div class = "row mt-4 d-flex align-items-center justify-content-center" style="height:530px;">
                <div>
                    <?php echo $this->createBlock('block_core_layout_message')->toHtml(); ?>
                </div>
                <div class="col-lg-12" >
                        <?php echo $this->getChild('content')->toHtml();?>                
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="w-100">
                    <?php echo $this->getChild('footer')->toHtml();?>
                </div>
            </div>

  </body>
</html>