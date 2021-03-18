<?php
namespace Model\Product;

\Mage::loadFileByClassName("Model\Core\Table");
class ProductMedia extends \Model\Core\Table{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('productmedia')->setPrimaryKey('productmediaId');
    }
}

?>