<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Home extends \Controller\Core\Admin{

   

   
    public function indexAction()
    {

    	
       	$home=\Mage::getBlock('Block\Admin\Home\Home');
       	
      	$this->getLayout()->getContent()->addChild($home,'home');
     
     	$this->randerLayout();

    }
   
}

?>