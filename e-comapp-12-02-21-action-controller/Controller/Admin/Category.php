<?php
namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");




class  Category extends \Controller\Core\Admin
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function gridHtmlAction()
    {
        try
        {
            $grid = \Mage::getBLock('block\Admin\category\grid')->toHtml();
            $response=[
              
              'element'=>[
              [
                'selector'=>'#ContentGrid',
                'html'=>$grid

              ],
              [
                'selector'=>'#ContentTabHtml',
                'html'=>NULL
              ]
            ]

            ];
            header("content-type: application/json");
            echo json_encode($response);   
        }
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("gridHtml",null,null,true);
        }

    }
   
    public function formAction()
    {
        try
        {

            $formhtml = \Mage::getBLock('block\Admin\Category\form')->tohtml();
            $tabshtml = \Mage::getBLock('block\Admin\Category\edit\Tabs')->tohtml();
         
            $response=[

              'element'=>[

                [
                  'selector'=>'#ContentGrid',
                  'html'=>$formhtml

                ],

                [
                'selector'=>'#ContentTabHtml',
                  'html'=>$tabshtml
                ]


              ]
            ];
            header("content-type: application/json");
            echo json_encode($response);
               
             
        }
        catch(Exception $e)
        {
          $this->getMessage()->setFailure($e->getMessage());
          $this->redirect("gridHtml",null,null,true);
        }
    }
    public function saveAction()
    {
        try
        {
          
            $category=\Mage::getModel('model\category');
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("invalid Request.");
            }
            if($id=$this->getRequest()->getGet('id'))
            {
              
               $category=$category->load($id);
               if(!$category)
               {
                   throw new Exception("no record Found.");
               }
             
           }
         
            $categorypathId=$category->pathId;
           
            $categoryData=$this->getRequest()->getPost('category');
            $category->setData($categoryData);

            $category->save();
            $category->updatePathId();
            $category->updateChildrenPathId($categorypathId);
      
            $this->redirect("gridHtml",null,null,true);
        }
        catch(Exception $e)
        {

            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("gridHtml",null,null,true);
               
        }

       
     }

     public function deleteAction()
     {
         try
         {
            
              $category=\Mage::getModel('model\category');
          
              if($categoryId=$this->getRequest()->getGet('id'))
              {
           
                $category=$category->load($categoryId);
                if(!$category)
                {
                  throw new Exception("Invalid Id", 1);
              
                }
              }
          
			        $pathId=$category->pathId;
              $parentId=$category->parentId;
              $category->updateChildrenPathId($pathId,$parentId);
			  
              if($category->delete($categoryId))
              {
                $this->getMessage()->setSuccess("record delete Successfully.");
             }
             else{
              $this->getMessage()->setSuccess("Unable to record delete.");
             }
            $this->redirect("gridHtml",null,null,true);
				
         }
         catch(Exception $e)
         {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("gridHtml",null,null,true);
         }
    }

    public function statusAction()
    {
        try
        {
    		    $category=\Mage::getModel('model\category');
    			  $category->categoryd=$this->getRequest()->getGet('id');
    			  $category->status=$this->getRequest()->getGet('status');
    			  

           if($category->status())
           {
              $this->getMessage()->setSuccess("status update Successfully.");
           }
           else
           {
              $this->getMessage()->setSuccess("Unable to status update.");
           }
			     $this->redirect("gridHtml",null,null,true);
		  

       }
       catch(Exception $e)
       {
          $this->getMessage()->setFailure($e->getMessage());
          $this->redirect("gridHtml",null,null,true);
       }

  }



}

?>