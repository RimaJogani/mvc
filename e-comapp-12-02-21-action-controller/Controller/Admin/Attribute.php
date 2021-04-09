<?php
namespace Controller\Admin;
\Mage::loadFileByClassName("Controller\Core\Admin");

class  Attribute extends \Controller\Core\Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    public function gridHtmlAction()
    {
        try{
        
            $grid = \Mage::getBLock('block\Admin\attribute\grid')->tohtml();
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

            $edit = \Mage::getBLock('block\Admin\attribute\edit');
            $attribute=\Mage::getModel('model\attribute');

            if($id=$this->getRequest()->getGet('id'))
            {
              $attribute->load($id);
              if(!$attribute)
              {
                throw new Exception("Product data not found", 1);
                
              }
            }
    
            $edit->setTableRow($attribute);
            
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
            $attribute=\Mage::getModel('model\attribute');
            if($id=$this->getRequest()->getGet('id'))
            {
              $attribute->load($id);
              if(!$attribute)
              {
                throw new Exception("Invalid Request", 1);
                
              }
            }
            $attributeData=$this->getRequest()->getPost('attribute');
           // print_r($attributeData);
            echo $query="ALTER TABLE {$attributeData['entityTypeId']} ADD {$attributeData['name']} {$attributeData['backendType']}";
            $attribute->getAdapter()->query($query);
            $attribute->setData($attributeData);
            $attribute->save();
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
             
            $attributeId=$this->getRequest()->getGet('id');
            $attribute=\Mage::getModel('model\attribute');
            
            if($attribute->delete($attributeId))
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

    public function testAction()
    {
      echo "<pre>";
      $query = "SELECT * FROM `attribute` WHERE `entityTypeId` = 'product'";
      $attributes = \Mage::getModel("Model\attribute")->fetchAll($query);
      //print_r($attributes);

      foreach ($attributes->getData() as $key => $attribute) 
      {
          print_r($attribute->getOptions());

      }
      
    }
    


}

?>