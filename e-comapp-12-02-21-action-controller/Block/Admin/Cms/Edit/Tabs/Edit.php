<?php
namespace Block\Admin\Cms\Edit\Tabs; 
\Mage::loadFileByClassName('Block\Core\Edit');

/**
 * 
 */
class Edit extends \Block\Core\Edit
{
	 
	
	function __construct()
	{
		$this->setTemplate('admin/cms/edit/tabs/edit.php');
	}



}
?>