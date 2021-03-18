<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName("Block\Core\Template");
class Grid extends \Block\Core\Template{

        protected $template=null;
        protected $admins=[];
        protected $controller=null;

        public function __construct(){
            parent::__construct();
          $this->setTemplate('admin/admin/grid.php');
        }

       
        public function setAdmins($admins = null){
            if(!$admins){
                $admin=\Mage::getModel('Model\admin');

                $admins=$admin->fetchAll();


            }
            $this->admins=$admins;
            return $this;

        }
        public function getadmins(){
            if(!$this->admins){
                $this->setadmins();
            }
            return $this->admins;
        }

       
}
?>