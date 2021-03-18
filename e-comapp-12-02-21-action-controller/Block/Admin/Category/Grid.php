<?php
namespace Block\Admin\Category;


\Mage::loadFileByClassName("Block\Core\Template");
class Grid extends \Block\Core\Template{

        protected $template=null;
        protected $categories=[];
        protected $controller=null;

        protected $categoriesOptions=[];
        public function __construct(){
            parent::__construct();
          $this->setTemplate('admin/category/grid.php');
        }

       
        public function setCategories($categories = null){
            if(!$categories){
                $category=\Mage::getModel('Model\category');

                $categories=$category->fetchAll();


            }
            $this->categories=$categories;
            return $this;

        }
        public function getCategories(){
            if(!$this->categories){
                $this->setCategories();
            }
            return $this->categories;
        }
        public function getName($category){

           
            if(!$this->categoriesOptions){

                $query="SELECT `categoryId`,`categoryName` FROM `category`";
                $this->categoriesOptions = \Mage::getModel('Model\category')->getAdapter()->fetchPair($query); 
            }

         // echo $category;die();
        
            $pathIds=explode("=",$category);
            foreach ($pathIds as $key =>&$id) {
                     if(array_key_exists($id, $this->categoriesOptions))
                     {
                        $id=$this->categoriesOptions[$id];
                     }
                }
           
            return implode("=>",$pathIds);
        }


       
}
?>