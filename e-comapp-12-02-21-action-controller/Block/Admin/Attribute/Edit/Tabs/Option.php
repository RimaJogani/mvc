<?php
namespace Block\Admin\Attribute\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
/**
 * 
 */
class Option extends \Block\Core\Template
{
	//protected $options=[];
	public $attribute=null;
	
	public function __construct()
	{  
		$this->setTemplate('admin/attribute/edit/tabs/option.php');
	}
	// public function setAttribute(Model_Attribute $attribute)
	// {
		
    	
 //        $this->attribute=$attribute;
 //      	return $this;
       

 //    }
 //    public function getAttribute()
 //    { 
 //    	print_r($this);
 //        return $this;
 //    }

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