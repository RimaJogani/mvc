<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');
/**
 * 
 */
class Attribute  extends \Block\Core\Template
{
    use \Block\Core\Edit\Traits;
	 protected $attribute=null;
     

	function __construct()
	{
		$this->setTemplate('admin/product/edit/tabs/attribute.php');

	}
	public function setAttribute($attribute = null){

            if($attribute){
                $this->attribute=$attribute;
                return $this;
            }
            
            $attribute=\Mage::getModel('Model\Attribute');
            $query="SELECT * FROM `attribute` Where `entityTypeId`='product'";
            $this->attribute=$attribute->fetchAll($query);
           
          
            return $this;

        }
        public function getAttribute(){
            if(!$this->attribute){
                $this->setAttribute();
            }
            return$this->attribute;
        }
        public function getOption($attributeId){

            
            $option=\Mage::getModel('Model\Attribute\option');
            $query="SELECT * FROM `attribute_option` Where `attributeId`={$attributeId}";
            $option=$option->fetchAll($query);
          
          
            return $option;

        }
       
        /*public function getOption()
        {
            echo $query="SELECT o.name 
            FROM attribute_option As `o`
            JOIN attribute As `a`
                ON o.attributeId=a.attributeId
                        AND entityTypeId='product'";
             $option=\Mage::getModel('Model\Attribute\Option');

             $data=$option->fetchAll($query);

             return $data;
        }*/
}

?>