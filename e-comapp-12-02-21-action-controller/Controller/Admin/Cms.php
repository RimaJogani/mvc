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
			$formhtml = \Mage::getBLock('block\Admin\cms\form')->toHtml();
	        $tabshtml = \Mage::getBLock('block\Admin\cms\edit\Tabs')->toHtml();
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