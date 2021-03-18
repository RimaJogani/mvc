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

            $formhtml = \Mage::getBLock('block\Admin\attribute\form')->toHtml();
            $tabshtml = \Mage::getBLock('block\Admin\attribute\edit\Tabs')->toHtml();
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
            print_r($attributeData);
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
    


}

?>