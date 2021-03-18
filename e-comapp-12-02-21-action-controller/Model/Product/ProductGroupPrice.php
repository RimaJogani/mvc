<?php

namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Table');

class ProductGroupPrice extends \Model\Core\Table{

	
	
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	public function __construct()
	{
		parent::__construct();
		$this->setTableName('product_group_price');
		$this->setPrimaryKey('entityId');
	}

	// public function getStatusOptions(){

	// 	return [
	// 		Model_CustomerGroup::STATUS_ENABLED =>"Enabled",
	// 		Model_CustomerGroup::STATUS_DISABLED =>"Disabled"

	// 	];
	// }
	
}


?>