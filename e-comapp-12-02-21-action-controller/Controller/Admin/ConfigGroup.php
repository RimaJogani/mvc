<?php
namespace Controller\Admin;
\Mage::loadFileByClassName("Controller\Core\Admin");

class  ConfigGroup extends \Controller\Core\Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    public function gridHtmlAction()
    {
        try{
         
        
            $grid = \Mage::getBLock('block\Admin\configGroup\grid')->tohtml();
            $response=[
              
              'element'=>[
              [
                'selector'=>'#ContentGrid',
                'html'=>$grid

              ],
            
            ]

            ];
            header("content-type: application/json");
            echo json_encode($response);
        
          }
          catch(Exception $e)
          {
            
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("grid",null,null,true);
          }
    }
   
    public function formAction()
    {
        try{


            $edit = \Mage::getBLock('block\Admin\configGroup\edit');

            $configGroup=\Mage::getModel('model\configGroup');

            if($id=$this->getRequest()->getGet('id'))
            {
              
              $configGroup->load($id);
              if(!$configGroup)
              {
                throw new Exception(" data not found", 1);
                
              }
            }
    
            $edit->setTableRow($configGroup);
            //print_r($edit);die();
            $edithtml=$edit->tohtml();
            $response=[

              'element'=>[

                [
                  'selector'=>'#ContentGrid',
                  'html'=>$edithtml

                ],

                

              ]
            ];
            header("content-type: application/json");
            echo json_encode($response);
        
           
          }
          catch(Exception $e)
          {
          
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("grid",null,null,true);
          }
    }

    public function saveAction()
    {
          try
          {
            $configGroup=\Mage::getModel('model\configGroup');
            if($id=$this->getRequest()->getGet('id'))
            {
              $configGroup->load($id);
              if(!$configGroup)
              {
                throw new Exception("Invalid Request", 1);
                
              }
            }
            else
            {
                $configGroup->createDate=date("Y-m-d H:i:s");

            }
            $configGroupData=$this->getRequest()->getPost('configGroup');
           // print_r($attributeData);
           
            
            $configGroup->setData($configGroupData);
            $configGroup->save();
          }
          catch(Exception $e)
          {
           
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("gridHtml",null,null,true);
          }
          $this->redirect("gridHtml",null,null,true);
    }

    public function deleteAction()
    {
         try{
             
            $configGroupId=$this->getRequest()->getGet('id');
            $configGroup=\Mage::getModel('model\configGroup');
            
            if($configGroup->delete($configGroupId))
            {
          
            $this->getMessage()->setSuccess("Record delete Successfully.");
           }
           else
           {
            $this->getMessage()->setSuccess("Unable to delete Record.");
           }
            $this->redirect("gridHtml",null,null,true);
        
         }catch(Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("gridHtml",null,null,true);
         }
    }

   


}

?>