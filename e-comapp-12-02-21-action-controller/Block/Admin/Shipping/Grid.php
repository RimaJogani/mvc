<?php
namespace Block\Admin\Shipping;

\Mage::getController("Block\Core\Template");
class Grid extends \Block\Core\Template{

        protected $template=null;
        protected $shippings=[];
        protected $controller=null;

        public function __construct(){
            parent::__construct();
          $this->setTemplate('admin/shipping/grid.php');
        }

       
        public function setShippings($shippings = null){
            if(!$shippings){
                $shipping=\Mage::getModel('model\shipping');
                $shippings=$shipping->fetchAll();


            }
            $this->shippings=$shippings;
            return $this;

        }
        public function getShippings(){
            if(!$this->shippings){
                $this->setShippings();
            }
            return $this->shippings;
        }

       
}
?>