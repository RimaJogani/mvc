<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

/**
 * 
 */
class Edit extends \Block\Core\Template
{
	   protected $customer=null;
        protected $customerGroup=null;
	
	function __construct()
	{
		$this->setTemplate('admin/customer/edit/tabs/edit.php');
	}

	 public function setCustomer($customer = null){
            if($customer){
                $this->customer=$customer;
                return $this;
            }
            
            $customer=\Mage::getModel('Model\customer');

                if($id = $this->getRequest()->getGet('id')){
                    $customer=$customer->load($id);
                   
                }
                 
                $this->customer=$customer;
             
            return $this;

        }
        public function getCustomer(){
            if(!$this->customer){
                $this->setCustomer();
            }
            return $this->customer;
        }
        public function setCustomerGroup($customerGroup = null){
            if($customerGroup){
                $this->customerGroup=$customerGroup;
                return $this;
            }
            
             $customerGroup=\Mage::getModel('Model\customer\CustomerGroup');
                
                    //$query="select * from product";
                    $customerGroup=$customerGroup->fetchAll();
                   
              
                $this->customerGroup=$customerGroup;
              
            return $this;

        }
        public function getCustomerGroup(){
            if(!$this->customerGroup){
                $this->setCustomerGroup();
            }
            return $this->customerGroup;
        }


       
}
?>