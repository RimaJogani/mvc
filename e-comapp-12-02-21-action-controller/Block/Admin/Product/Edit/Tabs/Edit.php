<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
/**
 * 
 */
class Edit  extends \Block\Core\Edit
{
	 protected $brand=null;
	function __construct()
	{
		$this->setTemplate('admin/product/edit/tabs/edit.php');
	}
    public function setBrand($brand = null){

            if($brand){
                $this->brand=$brand;
                return $this;
            }
            
            $brand=\Mage::getModel('Model\brand');
            
            $brand=$brand->fetchAll();
                
            $this->brand=$brand;
              
            return $this;

        }
        public function getBrand(){
            if(!$this->brand){
                $this->setBrand();
            }
            return $this->brand;
        }

	/*public function setProduct($product = null){
            if($product){
                $this->product=$product;
                return $this;
            }
            
            $product=\Mage::getModel('Model\product');
                if($id = $this->getRequest()->getGet('id')){
                    $product=$product->load($id);
                   
                }
                $this->product=$product;
              
            return $this;

        }
        public function getProduct(){
            if(!$this->product){
                $this->setProduct();
            }
            return $this->product;
        }*/
}

?>