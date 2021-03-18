<?php
namespace Model;


\Mage::loadFileByClassName('Model\Core\Table');
class Shipping extends Core\Table{

    const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

    public function __construct(){
        parent::__construct();
        $this->setPrimaryKey('shippingId');
        $this->setTableName('shipping');

    }
    public function getStatusOptions(){

		return [
			\Model\Shipping::STATUS_ENABLED =>"Enabled",
			\Model\Shipping::STATUS_DISABLED =>"Disabled"

		];
	}



}


?>