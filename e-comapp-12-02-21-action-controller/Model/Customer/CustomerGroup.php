<?php

namespace Model\Customer;

\Mage::getController('Model\Core\Table');

class CustomerGroup extends \Model\Core\Table{

	
	
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	public function __construct(){
		parent::__construct();
		$this->setTableName('customerGroup');
		$this->setPrimaryKey('customerGroupId');
	}

	public function getStatusOptions(){

		return [
			\Model\Customer\CustomerGroup::STATUS_ENABLED =>"Enabled",
			\Model\Customer\CustomerGroup::STATUS_DISABLED =>"Disabled"

		];
	}
	
}


?>