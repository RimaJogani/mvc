<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class Payment extends Core\Table{

    const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

    public function __construct(){
        parent::__construct();
        $this->setPrimaryKey('paymentId');
        $this->setTableName('payment');

    }
    public function getStatusOptions(){

		return [
			\Model\Payment::STATUS_ENABLED =>"Enabled",
			\Model\Payment::STATUS_DISABLED =>"Disabled"

		];
	}



}


?>