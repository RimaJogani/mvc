<?php
namespace Block\Admin\Attribute\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

/**
 * 
 */
class Edit extends \Block\Core\Template
{
	  protected $attribute=null;
   
   
	function __construct()
	{  
		$this->setTemplate('admin/attribute/edit/tabs/edit.php');
	}

	public function setAttribute($attribute = null){
            if($attribute){
                $this->attribute=$attribute;
                return $this;
            }
            
             $attribute=\Mage::getModel('Model\attribute');
             
                if($id = $this->getRequest()->getGet('id')){
                    $attribute=$attribute->load($id);
                   
                }
                $this->attribute=$attribute;
              
            return $this;

        }
        public function getAttribute(){
            if(!$this->attribute){
                $this->setAttribute();
            }
            return $this->attribute;
        }

        

        

        
        
        

}
?>