
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script type="text/javascript" src="<?php echo $this->baseurl('skin/admin/js/jquery.js');?>"></script>
      <script type="text/javascript" src="<?php echo $this->baseurl('skin/admin/js/mage.js');?>"></script>
    <title>Document</title> 

    
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container">
          <a class="navbar-brand" href="./">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" onclick="mage.setUrl('<?php echo $this->getUrl('Product','gridHtml',[],true)?>').load();" href="javascript:void(0)" >Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" onclick="mage.setUrl('<?php echo $this->getUrl('Attribute','gridHtml',[],true)?> ').load();" href="javascript:void(0)" >Attribute</a>
              </li>
             <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl('Admin','gridHtml',[],true)?>').load();">Admin</a>
              </li>
             <!--  <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php //echo $this->getUrl('Admin','grid',[],true)?> ">Admin</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" onclick="mage.setUrl('<?php echo $this->getUrl('Customer\CustomerGroup','gridHtml',[],true)?>').load();" href="javascript:void(0)" >CustomerGroup</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" onclick="mage.setUrl('<?php echo $this->getUrl('Customer','gridHtml',[],true)?>').load();" href="javascript:void(0)" >Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" onclick="mage.setUrl('<?php echo $this->getUrl('Category','gridHtml',[],true)?>').load();" href="javascript:void(0)">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" onclick="mage.setUrl('<?php echo $this->getUrl('Payment','gridHtml',[],true)?>').load();" href="javascript:void(0)" >Payment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" onclick="mage.setUrl('<?php echo $this->getUrl('Shipping','gridHtml',[],true)?>').load();" href="javascript:void(0)">Shipping</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" onclick="mage.setUrl('<?php echo $this->getUrl('Cms','gridHtml',[],true)?>').load();" href="javascript:void(0)" >Cms Page</a>
              </li>

             
            </ul>
           
          </div>
        </div>
      </nav>
