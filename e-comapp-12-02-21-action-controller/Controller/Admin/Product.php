<?php
namespace Controller\Admin;
\Mage::loadFileByClassName("Controller\Core\Admin");


class Product extends \Controller\Core\Admin
{
	
	public function __construct()
	{
		parent::__construct();
	}

	
	public function gridHtmlAction()
    {
        try
        {
          $grid = \Mage::getBLock('block\Admin\product\grid')->tohtml();

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
			$edit = \Mage::getBLock('block\Admin\product\edit');
			$product =\Mage::getBLock('model\product');
			if($id=$this->getRequest()->getGet('id'))
			{
				$product->load($id);
				if(!$product)
				{
					throw new Exception("Product data not found", 1);
					
				}
			}
		
			$edit->setTableRow($product);
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
			$product=\Mage::getModel('Model\product');

			if($id=$this->getRequest()->getGet('id'))
			{
				$product=$product->load($id);
				if(!$product)
				{
					throw new Exception("Record Not Found");
				}
				$product->updateDate=date("Y-m-d H:i:s");
				
			}
			else
			{
				$product->createDate=date("Y-m-d H:i:s");
			}
			
			$productData=$this->getRequest()->getPost('product');
			print_r($productData);
			$product->setData($productData);
			if($product->save())
			{
				$this->getMessage()->setSuccess('record save successfully.');
			}else{
				$this->getMessage()->setSuccess('unable to save record');
			}
			$this->redirect('gridHtml',NULL,NULL,true);
			
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
             
            $productId=$this->getRequest()->getGet('id');
			$product=\Mage::getModel('Model\product');
			
			if($product->delete($productId))
			{
				$this->getMessage()->setSuccess('record deleted successfully.');
			}
			else
			{
				$this->getMessage()->setSuccess('record not anable to delete.');
			}
			$this->redirect('gridHtml',NULL,NULL,true);

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
		  
		   	$product=\Mage::getModel('Model\product');
		  	$product->productId=$this->getRequest()->getGet('id');
		 	$product->status=$this->getRequest()->getGet('status');
		
		   	if($product->status())
			{
				$this->getMessage()->setSuccess('Status Updated.');
			}else{
				$this->getMessage()->setSuccess('Status not anable to Updated');
			}
	  
		   	$this->redirect('gridHtml',NULL,NULL,false);
	
		}
  		catch(Exception $e)
  		{
	        $this->getMessage()->setFailure($e->getMessage());
	        $this->redirect('gridHtml',null,null,true);
	   }
	}


}


?>