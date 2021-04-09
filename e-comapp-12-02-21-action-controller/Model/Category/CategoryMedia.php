<?php
namespace Model\Category;

\Mage::loadFileByClassName("Model\Core\Table");
class CategoryMedia extends \Model\Core\Table{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('categorymedia')->setPrimaryKey('categoryMediaId');
    }
}

?>