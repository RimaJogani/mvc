<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

/**
 * 
 */
class Edit extends \Block\Core\Edit
{
	  protected $category=null;
    protected $categoriesOptions=[];
   
	function __construct()
	{
		$this->setTemplate('admin/category/edit/tabs/edit.php');
	}

	/*public function setCategory($category = null){
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
        }*/

        

        public function getParentOptions()
        {
         
           
            if($this->categoriesOptions){
                return $this->categoriesOptions;
            }

             $query="SELECT `categoryId`,`categoryName` FROM `{$this->getTableRow()->getTableName()}`";
             $options = \Mage::getModel('Model\category')->getAdapter()->fetchPair($query);
        
              if(!$this->getRequest()->getGet('id'))
              {
                  $query1="SELECT `categoryId`,`pathId` FROM `{$this->getTableRow()->getTableName()}` ORDER BY `pathId` ASC";
              }
              else
              {
                  $query1="SELECT `categoryId`,`pathId` FROM `{$this->getTableRow()->getTableName()}` WHERE `pathId` NOT LIKE '{$this->getTableRow()->pathId}%' ORDER BY pathId ASC";
              }
       
             
             $this->categoriesOptions = \Mage::getModel('Model\category')->getAdapter()->fetchPair($query1);
           
            if($this->categoriesOptions)
            {
               foreach ($this->categoriesOptions as $categoryId => &$pathId) 
               {

                    
                    if($id = $this->getTableRow()->categoryId == $categoryId){
                      unset($this->categoriesOptions[$categoryId]);
                    }

                    if($id = $this->getTableRow()->categoryId != $categoryId)
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