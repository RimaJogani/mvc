<?php
namespace Model;


\Mage::loadFileByClassName('Model\Core\Table');

class Attribute extends Core\Table{

	
	
	const BACKENDTYPE_VARCHAR='varchar(20)';
	const BACKENDTYPE_INT='int(11)';
	const BACKENDTYPE_DECIMAL='decimal(10.2)';
	const BACKENDTYPE_TEXT='text(255)';

	const INPUTTYPE_TEXT='text';
	const INPUTTYPE_TEXTAREA='textarea';
	const INPUTTYPE_SELECT='select';
	const INPUTTYPE_CHECKBOX='checkbox';
	const INPUTTYPE_RADIO='radio';

	const ENTITYTPYE_PRODUCT='product';
	const ENTITYTPYE_CATEGORY='category';


	public function __construct(){
		parent::__construct();
		$this->setTableName('attribute');
		$this->setPrimaryKey('attributeId');
	}

	public function getBackendTypeOptions(){

		return [
				
			\Model\Attribute::BACKENDTYPE_VARCHAR =>"varchar",
			\Model\Attribute::BACKENDTYPE_INT =>"Int",
			\Model\Attribute::BACKENDTYPE_DECIMAL =>"Decimal",
			\Model\Attribute::BACKENDTYPE_TEXT =>"Text"

		];
	}
	public function getInputTypeOptions(){

		return [
				
			\Model\Attribute::INPUTTYPE_TEXT =>"Text Box",
			\Model\Attribute::INPUTTYPE_TEXTAREA =>"Text Area",
			\Model\Attribute::INPUTTYPE_SELECT =>"Select",
			\Model\Attribute::INPUTTYPE_CHECKBOX =>"Check Box",
			\Model\Attribute::INPUTTYPE_RADIO =>"Radio"


		];
	}
	public function getEntityTypeOptions(){
		return[

			\Model\Attribute::ENTITYTPYE_PRODUCT=>"Product",
			\Model\Attribute::ENTITYTPYE_CATEGORY=>"Category"



		];
	}



	public function getOptions()
	{
		if(!$this->attributeId)
		{
			return false;
		}
		 $query="SELECT * FROM `attribute_option`
		WHERE `attributeId`='{$this->attributeId}'
		ORDER BY `sortOrder` ASC";
		$options=\Mage::getModel('Model\Attribute\option')->fetchAll($query);
		if(!$options){
			return null;
		}
		return $options;
	}


	

	

	
}


?>