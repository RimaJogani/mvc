<?php
namespace Controller\Admin; 
\Mage::loadFileByClassName("Controller\Core\Admin");



class Customer extends \Controller\Core\Admin
{
    
    public function __construct()
    {
        parent::__construct();
    }

  public function gridHtmlAction()
  {
      try
      {
        $grid=\Mage::getBlock('Block\Admin\customer\grid')->toHtml();
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
        $this->redirect('gridHtmlAction',null,null,true);
      }

  }
   
  public function formAction()
  {
      try
      {
        
        $formhtml = \Mage::getBLock('block\Admin\Customer\form')->toHtml();
        $tabshtml = \Mage::getBLock('block\Admin\Customer\edit\Tabs')->toHtml();
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
        $this->redirect('gridHtml',null,null,true);
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
            $customer=\Mage::getModel('model\customer');
            if($id=$this->getRequest()->getGet('id'))
            {
                $customer->load($id);
                if(!$customer)
                {
                  throw new Exception("no record Found.");
                }
                $customer->updateDate=date("Y-m-d H:i:s");


            }
            else
            {
                $customer->createDate=date("Y-m-d H:i:s");
                $customer->password=md5(rand(10000000,1000000000));
        
            }
            $customerData=$this->getRequest()->getPost('customer');
            $customer->setData($customerData);
            if($customer->save())
            {
                $this->getMessage()->setSuccess('record save successfully.');
            }
            else
            {
                $this->getMessage()->setSuccess('unable to save record');
            }


            $this->redirect("gridHtml",null,null,true);
      }
      catch(Exception $e)
      {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('gridHtml',null,null,true);
      }
         
  }
    

  public function deleteAction()
  {
      try
      {
          $customerId=$this->getRequest()->getGet('id');
          $customer=\Mage::getModel('model\customer');
          
          if($customer->delete($customerId))
          {
            $this->getMessage()->setSuccess("record delete Successfully.");
          }
          else
          {
            $this->getMessage()->setSuccess("Unable to record delete.");
          }
          $this->redirect("gridHtml",null,null,true);
      }
      catch(Exception $e)
      {
          $this->getMessage()->setFailure($e->getMessage());
          $this->redirect('gridHtml',null,null,true);
      }
  }

  public function statusAction()
  {
      try
      {
        
		  	$customer=\Mage::getModel('model\customer');
			  $customer->customerId=$this->getRequest()->getGet('id');
			  $customer->status=$this->getRequest()->getGet('status');
			  
        if($customer->status())
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
        $this->redirect('gridHtml',null,null,true);
      }
  }

}

?>