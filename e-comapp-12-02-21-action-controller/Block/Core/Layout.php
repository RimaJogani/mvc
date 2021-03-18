<?php
namespace Block\Core;
\Mage::loadFileByClassName("Block\Core\Template");
class Layout extends Template{

	public function __construct(){
		
		parent::__construct();
		//$this->setTemplate('core/layout/onecolumn.php');
    $this->setTemplate('core/layout/three_column.php');
		$this->prepareChildren();
		
	}
	public function  prepareChildren()
       {
            //  $header=Mage::getBlock('Block_core_layout_header');
             // $this->addChild($header,'header');

              $headerLink=\Mage::getBlock('Block\core\layout\HeaderLink');
              $this->addChild($headerLink,'headerLink');
              
              $left = \Mage::getBlock('block\core\layout\left');
              $this->addChild($left,'leftTab');

       
              $footer = \Mage::getBlock('block\core\layout\footer');
              $this->addchild($footer,'footer');
              
              $content =\Mage:: getBlock('Block\Core\Layout\Content');
              $this->addChild($content,'content');

       }
       public function getContent()
       {
              return $this->getChild('content');
       }
       public function getLeft()
       {
              return $this->getChild('leftTab');
       }

}

?>