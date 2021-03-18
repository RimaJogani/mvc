<?php

namespace Block\Admin\Cms;
\Mage::getController("Block\Core\Template");
class Grid extends \Block\Core\Template{

        protected $template=null;
        protected $cmss=[];
       

        public function __construct(){
            parent::__construct();
          $this->setTemplate('admin/cms/grid.php');
        }

       
        public function setCmss($cmss = null){
            if(!$cmss){
                $cmsModel=\Mage::getModel('Model\Cms');
                $cmss=$cmsModel->fetchAll();


            }
            $this->cmss=$cmss;
            return $this;

        }
        public function getCmss(){
            if(!$this->cmss){
                $this->setCmss();
            }
            return $this->cmss;
        }

       
}
?>