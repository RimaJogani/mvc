<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');

class Product extends Core\Table{

	
	
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	public function __construct(){
		parent::__construct();
		$this->setTableName('product');
		$this->setPrimaryKey('productId');
	}

	public function getStatusOptions(){

		return [
			\Model\Product::STATUS_ENABLED =>"Enabled",
			\Model\Product::STATUS_DISABLED =>"Disabled"

		];
	}
	
}


?>