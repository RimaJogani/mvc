<?php
namespace Model\Customer;

\Mage::loadFileByClassName('Model\Core\Table');
class Address extends \Model\Core\Table{

    const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

    public function __construct(){
        parent::__construct();
        $this->setPrimaryKey('addressId');
        $this->setTableName('customeraddress');

    }
    
    

}


?>