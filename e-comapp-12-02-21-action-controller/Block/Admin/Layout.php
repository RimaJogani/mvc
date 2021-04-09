<?php
namespace Block\Admin;
\Mage::loadFileByClassName("Block\Core\layout");

class Layout extends \Block\Core\Layout{

	public function __construct()
  {
		
		parent::__construct();
		$this->setTemplate('admin/layout/onecolumn.php');
    //$this->setTemplate('core/layout/three_column.php');
		$this->prepareChildren();
		
	}
	public function  prepareChildren()
       {
            //  $header=Mage::getBlock('Block_core_layout_header');
             // $this->addChild($header,'header');
             
              $headerLink=\Mage::getBlock('Block\Admin\Layout\Header');
              $this->addChild($headerLink,'headerLink');
             
              $left = \Mage::getBlock('block\Admin\layout\left');
              $this->addChild($left,'leftTab');

       
              $footer = \Mage::getBlock('block\Admin\layout\footer');
              $this->addchild($footer,'footer');
              
              $content =\Mage:: getBlock('Block\Admin\Layout\Content');
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