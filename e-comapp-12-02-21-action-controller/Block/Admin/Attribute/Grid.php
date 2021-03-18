<?php
namespace Block\Admin\Attribute;

\Mage::loadFileByClassName("Block\Core\Template");
class Grid extends \Block\Core\Template{

      
        protected $attributes=[];
       

        protected $categoriesOptions=[];
        public function __construct(){
            parent::__construct();
          $this->setTemplate('admin/attribute/grid.php');
        }

       
        public function setAttributes($attributes = null){
            if(!$attributes){
                $attribute=\Mage::getModel('Model\attribute');

                $attributes=$attribute->fetchAll();


            }
            $this->attributes=$attributes;
            return $this;

        }
        public function getAttributes(){
            if(!$this->attributes){
                $this->setAttributes();
            }
            return $this->attributes;
        }
       

       
}
?>