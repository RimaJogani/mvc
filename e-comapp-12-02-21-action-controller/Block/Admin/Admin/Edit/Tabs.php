<?php
namespace Block\Admin\Admin\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs
{
	

	public function __construct()
		{
			parent::__construct();
		}
	public function prepareTabs(){

		
		$this->addTab('Admin', ['label' => 'Form', 'block' => 'Block\Admin\Admin\Edit\Tabs\Edit']);
		$this->setDefaultTab('Admin');
		return $this;
	}
	
}


?>