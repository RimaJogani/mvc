<?php
namespace Controller\Admin\ConfigGroup;
\Mage::loadFileByClassName("Controller\Core\Admin");

class Config extends \Controller\Core\Admin
{

  public function __construct()
  {
    parent::__construct();
  }


  public function gridHtmlAction()
    {
        try{
        
            $formhtml = \Mage::getBLock('Block\Admin\ConfigGroup\Edit\Tabs\config')->toHtml();
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
            $groupId=$this->getRequest()->getGet('id');

            $newData=$this->getRequest()->getPost('new');
            
           //print_r($existData);
           
            $config=\Mage::getModel('model\ConfigGroup\config');
            
            if($existData)
            {
                
                foreach ($existData as $key => $value) 
                {
                  //print_r($key);
                  $id[]=$key;
                }
                
                $id=implode(",",$id);
                $query="DELETE FROM `{$config->getTableName()}` WHERE `{$config->getPrimaryKey()}` NOT IN ({$id}) AND `groupId`={$groupId}";
                $config->delete(null,$query);
               
           
           
                foreach ($existData as $configId => $config) 
                {
                  
                    $configModel=\Mage::getModel('model\ConfigGroup\config');
                    $query="SELECT * FROM `{$configModel->getTableName()}` WHERE `groupId`='{$groupId}' AND `{$configModel->getPrimaryKey()}`='$configId'";
                    $configModel->fetchRow($query);
                    //print_r($attributeOption);
                  
                    
                    $configModel->title=$config['title'];
                    $configModel->code=$config['code'];
                    $configModel->value=$config['value'];
                    
                    $configModel=$configModel->save();

                    if($configModel)
                    {
                        $this->getMessage()->setSuccess('option update successfully.');
                    }
                    
                }
            }
            else
            {
              $config=\Mage::getModel('model\ConfigGroup\config');
              $query="DELETE FROM `{$config->getTableName()}` WHERE `groupId`={$groupId}";
              $config->delete(null,$query);
            }
           
            if($newData)
            { 
               
                
               //print_r($newData);
                foreach ($newData['title'] as $key => $value) 
                {
                  $config=\Mage::getModel('model\ConfigGroup\config');
                  $config->title = $newData['title'][$key];
                  $config->code = $newData['code'][$key];
                  $config->value = $newData['value'][$key];
                  $config->groupId = $groupId;
                  $config->createDate = date('Y-m-d H:s:i');
                  //print_r($config);
                  $config->save();
                }
                
            }
      
            
            
           $this->redirect("form","ConfigGroup",null,false);
        
          }
          catch(Exception $e)
          {
           
            $this->getMessage()->setFailure($e->getMessage());
             $this->redirect("gridhtml","ConfigGroup_Config",null,false);
          }
    }


    

}

?>