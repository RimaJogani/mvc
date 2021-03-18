<?php
namespace Block\Admin\Product;

\Mage::getController("Block\Core\Template");
class Grid extends \Block\Core\Template{

        protected $template=null;
        protected $products=[];
        protected $controller=null;

        public function __construct(){
            parent::__construct();
          $this->setTemplate('admin/Product/grid.php');
        }

       
        public function setProducts($products = null){
            if(!$products)
            {
                $product=\Mage::getModel('Model\Product');
                $products=$product->fetchAll();


            }
            $this->products=$products;
            return $this;

        }
        public function getProducts(){
            if(!$this->products){
                $this->setProducts();
            }
            return $this->products;
        }

       
}
?>