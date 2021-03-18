<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
/**
 * 
 */
class Address extends \Block\Core\Template
{
      protected $shipping=null;
      protected $billing=null;
	
    	function __construct()
    	{
    		$this->setTemplate('admin/customer/edit/tabs/address.php');
    	}
  	 public function setBilling($billing = null)
     {
  			
              if(!$billing){

                   $billing=\Mage::getModel('Model\customer\address');
                
                    if($id = $this->getRequest()->getGet('id'))
                    {

                        $query="SELECT * FROM `customeraddress` WHERE `customerId` = $id AND `addressType` = 'billing'";
                       
                        $row = $billing->fetchRow($query);
                        $this->billing=$row;
                      }

             
              	
                        //var_dump($billing);
                        
                       
                  }
                    
                    $this->billing=$billing;
                   return $this;
                 
            }
          public function getBilling(){
          	//echo 12;
              if(!$this->billing){
                  $this->setBilling();
              }

              return $this->billing;
          }



          public function setShipping($shipping = null)
     {
        
              if(!$shipping){

                   $shipping=\Mage::getModel('Model\customer\address');
                 
                    if($id = $this->getRequest()->getGet('id'))
                    {

                        $query="SELECT * FROM `customeraddress` WHERE `customerId` = $id AND `addressType` = 'shipping'";
                       
                        $row = $shipping->fetchRow($query);
                        $this->shipping=$row;
                      }

                    }
                    
                    $this->shipping=$shipping;
                   return $this;
                 
            }
          public function getShipping(){
            //echo 12;
              if(!$this->shipping){
                  $this->setShipping();
              }

              return $this->shipping;
          }
			

}

?>