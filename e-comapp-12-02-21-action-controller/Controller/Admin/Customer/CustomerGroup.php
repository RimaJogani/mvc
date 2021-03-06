<?php

namespace Controller\Admin\Customer;
\Mage::loadFileByClassName("Controller\Core\Admin");



class  CustomerGroup extends \Controller\Core\Admin
{
   
    public function __construct()
    {
        parent::__construct();
    }
    
    public function gridHtmlAction()
    {
        try
        {
        
            $grid = \Mage::getBLock('block\Admin\CustomerGroup\grid')->tohtml();
            $response=[

              'element'=>[

                [
                  'selector'=>'#ContentGrid',
                  'html'=>$grid

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

            $edit = \Mage::getBLock('block\Admin\CustomerGroup\edit');
            $customerGroup=\Mage::getModel('model\customer\customergroup');
            if($id=$this->getRequest()->getGet('id'))
            {
              $customerGroup->load($id);
                if(!$customerGroup )
                {
                    throw new Exception("Product data not found", 1);
                    
                }

            }
          $edit->setTableRow($customerGroup);
          $edithtml=$edit->tohtml();
            $response=[

              'element'=>[

                [
                  'selector'=>'#ContentGrid',
                  'html'=>$edithtml

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
      try{
         
            if(!$this->getRequest()->isPost())
            {
                throw new Exception("invalid Request.");
            }
           
          
             $customerGroup=\Mage::getModel('model\Customer\CustomerGroup');
             if($id=$this->getRequest()->getGet('id'))
             {
                 echo $id;
                 $customerGroup->load($id);
                
                 if(!$customerGroup)
                 {
                     throw new Exception("no record Found.");
                 }
             
             }
         
          
             $customerGroupData=$this->getRequest()->getPost('customerGroup');
             $customerGroup->createDate=date("Y-m-d H:i:s");
             $customerGroup->setData($customerGroupData);
          
             if($customerGroup->save())
             {
                $this->getMessage()->setSuccess('record save successfully.');
             }
             else
             {
                $this->getMessage()->setSuccess('unable to save record');
             }
         
         
          $this->redirect("gridHtml","customer_customerGroup",null,true);
         
        
        }
        catch(Exception $e)
        {
            
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("gridHtml","customer_customerGroup",null,true);
           
        }

     
  }

    

 public function deleteAction()
 {
     try
     {
         
          $customerGroupId=$this->getRequest()->getGet('id');
    			$customerGroup=\Mage::getModel('model\customer\customerGroup');
    			
          if($customerGroup->delete($customerGroupId))
          {
         
           $this->getMessage()->setSuccess("Record delete Successfully.");
         }
         else
         {
          
          $this->getMessage()->setSuccess("Unable to delete Record.");
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
    try{
        
            $customerGroup=\Mage::getModel('Model\customer\CustomerGroup');
        	  $customerGroup->customerGroupId=$this->getRequest()->getGet('id');
        	  $customerGroup->status=$this->getRequest()->getGet('status');
        	 
             if($customerGroup->status())
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