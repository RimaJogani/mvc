<?php
namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");



class Payment extends \Controller\Core\Admin
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function gridHtmlAction()
	{
		try
		{

			$grid=\Mage::getBlock('Block\Admin\payment\grid')->toHtml();

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
			$this->redirect('gridHtml',null,null,true);
		}

	}
	
	public function formAction()
	{
		try
		{

			$formhtml = \Mage::getBLock('block\Admin\payment\form')->toHtml();
            $tabshtml = \Mage::getBLock('block\Admin\payment\edit\Tabs')->toHtml();
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
			$payment=\Mage::getModel('Model\Payment');
			if($id=$this->getRequest()->getGet('id'))
			{
				$payment->load($id);
				if(!$payment)
				{
					throw new Exception("no record Found.");
				}
					//$payment->updateDate=date("Y-m-d H:i:s");
			}
			else
			{
				$payment->createDate=date("Y-m-d H:i:s");

			}
			$paymentData=$this->getRequest()->getPost('payment');
			$payment->setData($paymentData);
			if($payment->save())
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
        try{

            $paymentId=$this->getRequest()->getGet('id');
			$payment=\Mage::getModel('Model\Payment');
			
			if($payment->delete($paymentId))
			{
				$this->getMessage()->setSuccess('record delete successfully.');
			}
			else
			{
				
				$this->getMessage()->setSuccess('unable to delete record');
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
		  	$payment=\Mage::getModel('Model\Payment');
			$payment->paymentId=$this->getRequest()->getGet('id');
			$payment->status=$this->getRequest()->getGet('status');
			 
			if( $payment->status())
			{
				$this->getMessage()->setSuccess('status Update successfully.');
			}
			else
			{
				$this->getMessage()->setSuccess('unable to update status');
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