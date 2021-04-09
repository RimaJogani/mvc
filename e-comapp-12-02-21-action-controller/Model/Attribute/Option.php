<?php
namespace Model\Attribute;
\Mage::loadFileByClassName('Model\Core\Table');

class Option extends \Model\Core\Table
{
	protected $attribute = null; 
	
	public function __construct(){
		parent::__construct();
		$this->setTableName('attribute_option');
		$this->setPrimaryKey('optionId');
	}
	public function setAttribute($attribute)
	{
		$this->attribute = $attribute;
		return $this;
	}
	public function getOptions()
	{
		if(!$this->getAttribute()->attributeId)
		{
			return null;
		}
		$query="SELECT * FROM `attribute_option`
		WHERE `attributeId`='{$this->getAttribute()->attributeId}'
		ORDER BY `sortOrder` ASC";
		return $this->fetchAll($query);
		

	}
	public function getAttribute()
	{
		return $this->attribute;
	}

	
}


?>