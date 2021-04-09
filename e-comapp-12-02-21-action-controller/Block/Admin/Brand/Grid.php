<?php
namespace Block\Admin\Brand;


\Mage::loadFileByClassName("Block\Core\Template");
class Grid extends \Block\Core\Template{

        
        public function __construct(){
            parent::__construct();
          $this->setTemplate('admin/brand/grid.php');
        }

        public function getImageData()
        {
            $media = \Mage::getModel("model\brand");

           $query = "select * from brand";
            $media = $media->fetchAll($query);

            return $media;
        }
       
        
}
?>