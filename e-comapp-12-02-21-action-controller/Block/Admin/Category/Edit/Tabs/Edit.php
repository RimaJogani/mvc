<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

/**
 * 
 */
class Edit extends \Block\Core\Template
{
	  protected $category=null;
      protected $categoriesOptions=[];
   
	function __construct()
	{
		$this->setTemplate('admin/category/edit/tabs/edit.php');
	}

	public function setCategory($category = null){
            if($category){
                $this->category=$category;
                return $this;
            }
            
             $category=\Mage::getModel('Model\category');
             
                if($id = $this->getRequest()->getGet('id')){
                    $category=$category->load($id);
                   
                }
                $this->category=$category;
              
            return $this;

        }
        public function getCategory(){
            if(!$this->category){
                $this->setCategory();
            }
            return $this->category;
        }

        

        public function getParentOptions()
        {
         
            //echo "<pre>";
            if($this->categoriesOptions){
                return $this->categoriesOptions;
            }

             $query="SELECT `categoryId`,`categoryName` FROM `{$this->getCategory()->getTableName()}`";
             $options = \Mage::getModel('Model\category')->getAdapter()->fetchPair($query);
        
              if(!$this->getRequest()->getGet('id'))
              {
                  $query1="SELECT `categoryId`,`pathId` FROM `{$this->getCategory()->getTableName()}` ORDER BY `pathId` ASC";
              }
              else
              {
                  $query1="SELECT `categoryId`,`pathId` FROM `{$this->getCategory()->getTableName()}` WHERE `pathId` NOT LIKE '{$this->getCategory()->pathId}%' ORDER BY pathId ASC";
              }
       
             
             $this->categoriesOptions = \Mage::getModel('Model\category')->getAdapter()->fetchPair($query1);
           
            if($this->categoriesOptions)
            {
               foreach ($this->categoriesOptions as $categoryId => &$pathId) 
               {

                    
                    if($id = $this->getRequest()->getGet('id') == $categoryId){
                      unset($this->categoriesOptions[$categoryId]);
                    }

                    if($id = $this->getRequest()->getGet('id') != $categoryId)
                    {

                      $pathIds=explode("=",$pathId);
                   
                  
                      
                       foreach ($pathIds as $key => &$id) 
                       {
                          if(array_key_exists($id,$options))
                          {
                            $id=$options[$id];
                           }
                       }
                  
                    $pathId=implode("/",$pathIds);
                    //print_r($pathId);
                  }
                }
            } 

            $this->categoriesOptions=[""=>"Root category"] +  $this->categoriesOptions;    
        
            return $this->categoriesOptions;
          
        }

        
        

}
?>