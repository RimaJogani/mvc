<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');
class ConfigGroup extends Core\Table{

    

    public function __construct(){
        parent::__construct();
        $this->setPrimaryKey('groupId');
        $this->setTableName('config_group');

    }
    
    public function getConfigs()
	{
		//print_r($this);
		if(!$this->groupId)
		{

			return false;
		}
		$query="SELECT * FROM `config`
		WHERE `groupId`='{$this->groupId}'";
		
		$configs=\Mage::getModel('Model\configgroup\config')->fetchAll($query);
		
		if(!$configs){
			return false;
		}
		return $configs;
	}


}


?>