<?php

namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Category extends Core\Table{

	
	
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	public function __construct(){
		parent::__construct();
		$this->setTableName('category');
		$this->setPrimaryKey('categoryId');
	}

	public function getStatusOptions(){

		return [
			\Model\Category::STATUS_ENABLED =>"Enabled",
			\Model\Category::STATUS_DISABLED =>"Disabled"

		];
	}

	public function updatePathId(){
		
		if(!$this->parentId){

			$path=$this->categoryId;
		}
		else{
			echo 11;
			$parent=\Mage::getModel('Model\Category')->load($this->parentId,null);
              
      		$path=$parent->pathId."=".$this->categoryId;
		}
		$this->pathId=$path;
		
		$this->save();
	}
	public function updateChildrenPathId($categorypathId,$parent=null){
			echo "<pre>";
			$categorypathId=$categorypathId."=";

			 print_r($categorypathId);
			 print_r($parent);
			 
			 echo $query="SELECT * FROM  `{$this->getTableName()}` WHERE `pathId` LIKE '{$categorypathId}%' ORDER By `pathId` ASC ";
			
			$categories=$this->fetchAll($query);
			print_r($categories);
			if($categories){
				foreach ($categories->getData() as $key => $row) {
					//print_r($row->categoryId);
					$row=$this->load($row->categoryId);
					if($parent != Null){
						$row->parentId=$parent;
					}
					$row->updatePathId();
					
				}
			}
			
			
	}


	
}


?>