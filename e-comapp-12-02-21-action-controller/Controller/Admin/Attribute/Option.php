<?php
namespace Controller\Admin\Attribute;
\Mage::loadFileByClassName("Controller\Core\Admin");

class Option extends \Controller\Core\Admin
{

  public function __construct()
  {
    parent::__construct();
  }

 /* public function gridAction()
  {
       
        try
        {
            $attribute=Mage::getModel('model_attribute');
            $attributeId=$this->getRequest()->getGet('id');
            $attribute->load($attributeId);
             //print_r($attribute);
            $option=Mage::getBlock('Block_attribute_edit_tabs_option')->setAttribute($attribute);

            $form = Mage::getBLock('block_attribute_form');
            $tabs = Mage::getBLock('block_attribute_edit_Tabs');
            $layout=$this->getLayout();
           
            $layout->getLeft()->addChild($tabs,'tabs');
            $layout->getContent()->addChild($form,'Form');
            $this->randerLayout();  

        }
        catch(Exception $e)
        {
            $msg=Mage::getModel("Model_admin_message");
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',null,null,true);
        }
      //$this->redirect('grid', null, null, false);  
  }*/

  public function gridHtmlAction()
    {
        try{
        
            $formhtml = \Mage::getBLock('Block\Admin\Attribute\Edit\Tabs\Option')->toHtml();
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
    public function updateAction()
    {
        try{
            echo "<pre>";
            $existData=$this->getRequest()->getPost('exist');
            $attributeId=$this->getRequest()->getGet('id');
            $newData=$this->getRequest()->getPost('new');
            print_r($newData);
            print_r($existData);
            $attribute=\Mage::getModel('model\attribute');
            $attributeOption=\Mage::getModel('model\attribute\option');
            
            if($existData)
            {

                foreach ($existData as $key => $value) 
                {
                  //print_r($key);
                  $id[]=$key;
                }
                $id=implode(",",$id);
                echo $query="DELETE FROM `{$attributeOption->getTableName()}` WHERE `{$attributeOption->getPrimaryKey()}` NOT IN ({$id}) AND `attributeId`={$attributeId}";
                $attributeOption->delete(null,$query);
               
            }
            

            foreach ($existData as $optionId => $option) {
              
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
            if($newData)
            { 
                $attributeOption=\Mage::getModel('model\attribute\option');
                foreach($newData as $key => $value)
                {
                   
                     $values[]="'".$value."'";
                     $keys[]="`".$key."`";
                }
                
                   $values=implode(',',$values);
                   $keys=implode(',',$keys);
                   echo $query="insert into `{$attributeOption->getTableName()}` ({$keys}) values ({$values}) ";
                   $attributeOption->insert($query);
                   if($attributeOption)
                  {
                      $this->getMessage()->setSuccess('option update successfully.');
                  }
                
            }
            
            $this->redirect("gridhtml","attribute_option",null,false);
        
          }
          catch(Exception $e)
          {
           
            $this->getMessage()->setFailure($e->getMessage());
             $this->redirect("gridhtml","attribute_option",null,false);
          }
    }


    

}

?>