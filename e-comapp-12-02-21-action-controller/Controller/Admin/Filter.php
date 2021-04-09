<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('controller\core\admin');
/**
 * 

 */
class Filter extends \Controller\Core\Admin
{
	
	public function filterAction()
	{
		
		$filters = $this->getRequest()->getPost('filter');
		//print_r($filters);die();
		$filter = \Mage::getModel('Model\Admin\Filter');
		$filter->setFilters($filters);
		//$controllerName = 'Admin_';
		foreach ($filters as $key => $value) 
		{
			
			$controllerName = $key;
					# code...
		}	
		//echo $controllerName;
		$this->redirect('gridHtml',$controllerName);	

	}
}

?>