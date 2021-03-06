<?php

namespace Controller\Admin;
\Mage::loadFileByClassName("Controller\Core\Admin");


class Shipping extends \Controller\Core\Admin
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function gridHtmlAction()
	{
		try
		{
			$grid = \Mage::getBLock('block\Admin\shipping\grid')->toHtml();
            
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
			$this->redirect('gridHtml',null,null,true);
		}

	}
	
	public function formAction()
	{
		try
		{

			$edit = \Mage::getBLock('block\Admin\shipping\edit');
			$shipping =\Mage::getModel('model\shipping');
			if($id=$this->getRequest()->getGet('id'))
			{
				$shipping->load($id);
				if(!$shipping)
				{
					throw new Exception("Product data not found", 1);
					
				}
			}
		
			$edit->setTableRow($shipping);
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
			$this->redirect('gridHtml',null,null,true);
		}
		
		
	}
	
	public function saveAction()
	{

		try
		{
				
			$shipping=\Mage::getModel('Model\shipping');
			if($id=$this->getRequest()->getGet('id'))
			{
				$shipping->load($id);
				if(!$shipping)
				{
					throw new Exception("no record Found.");
				}
					//$payment->updateDate=date("Y-m-d H:i:s");
			}
			else
			{
				$shipping->createDate=date("Y-m-d H:i:s");

			}
			$shippingData=$this->getRequest()->getPost('shipping');
				
			$shipping->setData($shippingData);
			if($shipping->save())
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

            $shippingId=$this->getRequest()->getGet('id');
			$shipping=\Mage::getModel('Model\shipping');
			$shipping->delete($shippingId);
			$this->redirect("gridHtml",null,null,true);
           

        }catch(Exception $e)
        {
			$this->getMessage()->setFailure($e->getMessage());
			$this->redirect('gridHtml',null,null,true);
        }
    }


	public function statusAction()
	{
		try
		{
		  	$shipping=\Mage::getModel('Model\shipping');
			$shipping->shippingId=$this->getRequest()->getGet('id');
			$shipping->status=$this->getRequest()->getGet('status');
			$shipping->status();
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