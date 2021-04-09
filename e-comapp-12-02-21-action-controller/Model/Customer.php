<?php

namespace Model;


\Mage::loadFileByClassName('Model\Core\Table');
class Customer extends Core\Table{

    const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

    public function __construct(){
        parent::__construct();
        $this->setPrimaryKey('customerId');
        $this->setTableName('customer');

    }
    public function getStatusOptions(){

		return [
			\Model\Customer::STATUS_ENABLED =>"Enabled",
			\Model\Customer::STATUS_DISABLED =>"Disabled"

		];
	}

    public function getBillingAddress()
    {
        $query = "select * from `customeraddress` where `addressType` = 'billing' and `customerId` = {$this->customerId}";
        $address = \Mage::getModel('Model\Customer')->fetchRow($query);
        return $address;
    }

    public function getShippingAddress()
    {
        $query = "select * from `customeraddress` where `addressType` = 'shipping' and `customerId` = {$this->customerId}";
        $address = \Mage::getModel('Model\Customer')->fetchRow($query);
        return $address;
    }


    

}


?>