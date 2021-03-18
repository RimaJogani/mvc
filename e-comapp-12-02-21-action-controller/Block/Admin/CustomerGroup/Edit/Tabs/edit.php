<?php
namespace Block\Admin\CustomerGroup\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

/**
 * 
 */
class Edit extends \Block\Core\Template
{
	  protected $customerGroup=null;
	
	function __construct()
	{
		$this->setTemplate('admin/customer_group/edit/tabs/edit.php');
	}

	public function setCustomerGroup($customerGroup = null){
            if($customerGroup){
                $this->customerGroup=$customerGroup;
                return $this;
            }
            
             $customerGroup=\Mage::getModel('Model\Customer\CustomerGroup');
                if($id = $this->getRequest()->getGet('id')){
                    $customerGroup=$customerGroup->load($id);
                   
                }
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