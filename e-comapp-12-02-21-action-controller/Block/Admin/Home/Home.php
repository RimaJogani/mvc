<?php
namespace Block\Admin\Home;
\Mage::loadFileByClassName('Block\Core\Template');

/**
 * 
 */
class Home extends \Block\Core\Template
{
	
	public function __construct()
	{	
		$this->setTemplate('admin/home/home.php');
	}

}

?>