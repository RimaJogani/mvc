<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Brand extends Core\Table{

	
	
	
	public function __construct(){
		parent::__construct();
		$this->setTableName('brand');
		$this->setPrimaryKey('brandId');
	}


	


	
}


?>