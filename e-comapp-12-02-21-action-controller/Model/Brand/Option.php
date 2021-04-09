<?php

namespace Model\Brand;
\Mage::getModel('Model\Attribute\option');
/**
 * 
 */
class Option extends \Model\Attribute\Option
{

	public function getOptions()
	{
		if(!$this->getAttribute()->attributeId)
		{
			return false;
		}

		$query=" SELECT 
			brandId As optionId,
			brandName As name,
			'{$this->getAttribute()->attributeId}' As attributeId,
			sortOrder 
		FROM `brand` 
		ORDER BY `sortOrder` ASC";
		$options=\Mage::getModel('Model\brand')->fetchAll($query);
		if(!$options){
			return null;
		}
		return $options;
	}
	
}


?>