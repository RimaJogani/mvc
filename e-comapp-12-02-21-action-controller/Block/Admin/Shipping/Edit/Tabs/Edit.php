<?php
namespace Block\Admin\Shipping\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

/**
 * 
 */
class Edit extends \Block\Core\Template
{
	     protected $shipping=null;
	
	function __construct()
	{
		$this->setTemplate('admin/shipping/edit/tabs/edit.php');
	}

	 public function setShipping($shipping = null){
            if($shipping){
                $this->shipping=$shipping;
                return $this;
            }
            
            $shipping=\Mage::getModel('model\shipping');
                if($id = $this->getRequest()->getGet('id')){
                    $shipping=$shipping->load($id);
                   
                }
                $this->shipping=$shipping;
               // print_r($payment);
            return $this;

        }
        public function getShipping(){
            if(!$this->shipping){
                $this->setShipping();
            }
            return $this->shipping;
        }

}
?>