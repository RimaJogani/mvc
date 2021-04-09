<?php
namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");

class Admin1 extends \Controller\Core\Admin
{

    public function __construct()
    {
        parent::__construct();
    }
    
  public function gridHtmlAction()
    {
        try
        {

           $grid = \Mage::getBLock('block\Admin\Admin\grid')->tohtml();
           //print_r($grid);
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
          $this->redirect("gridHtml",null,null,true);getMessage();
           
      }

  }
   
  public function formAction()
  {
      try
      {

          $edit = \Mage::getBLock('block\Admin\Admin\edit');
          $admin=\Mage::getModel('model\admin');
          if($id=$this->getRequest()->getGet('id'))
          {
            $admin->load($id);
              if(!$admin)
              {
                  throw new Exception("Product data not found", 1);
                  
              }

          }
          $edit->setTableRow($admin);
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
        $this->redirect("gridHtml",null,null,true);
     }
  }
    
  public function saveAction()
  {
      try
      {
           
          if(!$this->getRequest()->isPost())
          {
              throw new Exception("invalid Request.");
          }
          $admin=\Mage::getModel('model\admin');
          if($id=$this->getRequest()->getGet('id'))
          {
              echo $id;
              $admin->load($id);
              
              if(!$admin)
              {
                 throw new Exception("no record Found.");
              }
             
          }
           
          $admin->createDate=date("Y-m-d H:i:s");
          $adminData=$this->getRequest()->getPost('admin');
          $adminData['adminPassword']=md5($adminData['adminPassword']);
          $admin->setData($adminData);
         
          if($admin->save())
          {
             
              $this->getMessage()->setSuccess('Record save Successfully.');

          }
          else
          {
              
              $this->getMessage()->setSuccess('unable to save records');
          }
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

          $adminId=$this->getRequest()->getGet('id');
			    $admin=\Mage::getModel('model\admin');
			
          if($admin->delete($adminId))
          {
            
              $this->getMessage()->setSuccess('Record delete Successfully.');

          }
          else
          {
              
              $this->getMessage()->setSuccess('unable to delete records');
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

  		    $admin=\Mage::getModel('model\admin');
  			  $admin->adminId=$this->getRequest()->getGet('id');
  			  $admin->status=$this->getRequest()->getGet('status');
			 
          if( $admin->status())
          {
             
              $this->getMessage()->setSuccess('status update Successfully.');

          }
          else
          {
             
              $this->getMessage()->setSuccess('unable to status update');
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