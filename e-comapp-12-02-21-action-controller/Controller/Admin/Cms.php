<?php
namespace Controller\Admin;
\Mage::loadFileByClassName("Controller\Core\Admin");



class Cms extends \Controller\Core\Admin
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function gridHtmlAction()
	{
		try
		{

			$grid=\Mage::getBlock('Block\Admin\cms\grid')->toHtml();
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
			$edit = \Mage::getBLock('block\Admin\cms\edit');
	       	$cms=\Mage::getModel('model\cms');
	        if($id=$this->getRequest()->getGet('id'))
	        {
	          $cms->load($id);
	          if(!$cms)
	          {
	            throw new Exception("Not record found", 1);
	            
	          }
	        }
	        $edit->setTableRow($cms);
	        $edithtml=$edit->toHtml();
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
			if(!$this->getRequest()->isPost())
			{
				throw new Exception("invalid Request.");
			}
			$cms=\Mage::getModel('Model\cms');

			if($id=$this->getRequest()->getGet('id')){
				
				$cms->pageId = $id;
			}
			else
			{
				$cms->createDate=date("Y-m-d H:i:s");
			}
			$cmsData=$this->getRequest()->getPost('cms');
			$cms->setData($cmsData);
			if($cms->save())
			{
				$this->getMessage()->setSuccess('record save successfully.');
			}else{
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

            $pageId=$this->getRequest()->getGet('id');
			$cms=\Mage::getModel('Model\cms');
			$cms->delete($pageId);
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
		  	$cms=\Mage::getModel('Model\cms');
			$cms->pageId=$this->getRequest()->getGet('id');
			$cms->status=$this->getRequest()->getGet('status');
			$cms->status();
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