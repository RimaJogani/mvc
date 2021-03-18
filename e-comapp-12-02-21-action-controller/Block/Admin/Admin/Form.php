<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName("Block\Core\Template");
class Form extends \Block\Core\Template
{

    
       
        public function __construct()
        {
            parent::__construct();
            $this->setTemplate('admin/admin/form.php');

        }

    public function getTabContent()
    {

    	$tabBlock=\Mage::getBlock('Block\Admin\admin\edit\tabs');
       
    	$tabs=$tabBlock->getTabs();

    	$tab=$this->getRequest()->getGet('tab',$tabBlock->getDefualtTab());
    	if(!array_key_exists($tab, $tabs)){
    		return Null;
    	}
    	$blockClassName=$tabs[$tab]['Block'];
    	 $block = \Mage::getBlock($blockClassName);
            
         echo $block->toHtml();
    	
    	
    }
        

       
}
?>