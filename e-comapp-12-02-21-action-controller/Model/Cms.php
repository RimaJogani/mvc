<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class Cms extends Core\Table{

    const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

    public function __construct(){
        parent::__construct();
        $this->setPrimaryKey('pageId');
        $this->setTableName('cms_page');

    }
    public function getStatusOptions(){

		return [
			\Model\Cms::STATUS_ENABLED =>"Enabled",
			\Model\Cms::STATUS_DISABLED =>"Disabled"

		];
	}



}


?>