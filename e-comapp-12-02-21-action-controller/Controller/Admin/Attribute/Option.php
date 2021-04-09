<?php
namespace Controller\Admin\Attribute;
\Mage::loadFileByClassName("Controller\Core\Admin");

class Option extends \Controller\Core\Admin
{

  public function __construct()
  {
    parent::__construct();
  }


  public function gridHtmlAction()
    {
        try{
        
            $formhtml = \Mage::getBLock('Block\Admin\Attribute\Edit\Tabs\Option')->toHtml();
              $response=[
              
              'element'=>[
              [
                'selector'=>'#ContentGrid',
                'html'=>$formhtml

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
    public function updateAction()
    {
        try{
           
            $existData=$this->getRequest()->getPost('exist');
            $attributeId=$this->getRequest()->getGet('id');

            $newData=$this->getRequest()->getPost('new');
            
            //print_r($existData);
            $attributeOption=\Mage::getModel('model\attribute\option');
            
            if($existData)
            {

                foreach ($existData as $key => $value) 
                {
                  //print_r($key);
                  $id[]=$key;
                }
                $id=implode(",",$id);
                $query="DELETE FROM `{$attributeOption->getTableName()}` WHERE `{$attributeOption->getPrimaryKey()}` NOT IN ({$id}) AND `attributeId`={$attributeId}";
                $attributeOption->delete(null,$query);
               
           
           
                foreach ($existData as $optionId => $option) 
                {
                  
                    $attributeOption=\Mage::getModel('model\attribute\option');
                    $query="SELECT * FROM `{$attributeOption->getTableName()}` WHERE `attributeId`='{$attributeId}' AND `{$attributeOption->getPrimaryKey()}`='$optionId'";
                    $attributeOption->fetchRow($query);
                    //print_r($attributeOption);
                  
                    $attributeOption->name=$option['name'];
                    $attributeOption->sortOrder=$option['sortOrder'];
                    $attributeOption=$attributeOption->save();
                    if($attributeOption)
                    {
                        $this->getMessage()->setSuccess('option update successfully.');
                    }
                }
            }
            else
            {
              $attributeOption=\Mage::getModel('model\attribute\option');
              $query="DELETE FROM `{$attributeOption->getTableName()}` WHERE `attributeId`={$attributeId}";
              $attributeOption->delete(null,$query);
            }
            if($newData)
            { 

               //print_r($newData);
                foreach ($newData['name'] as $key => $value) 
                {
                  $attributeOption=\Mage::getModel('model\attribute\option');
                  $attributeOption->name = $newData['name'][$key];
                  $attributeOption->sortOrder = $newData['sortOrder'][$key];
                  
                  $attributeOption->attributeId = $attributeId;
                  //print_r($attributeOption);
                  $attributeOption->save();
                }
                
            }
                

            $this->redirect("form","attribute",null,false);
        
          }
          catch(Exception $e)
          {
           
            $this->getMessage()->setFailure($e->getMessage());
             $this->redirect("gridhtml","attribute_option",null,false);
          }
    }


    

}

?>