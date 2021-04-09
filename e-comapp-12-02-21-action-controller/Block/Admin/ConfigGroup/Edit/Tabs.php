<?php

namespace Block\Admin\ConfigGroup\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

/**
*
*/
class Tabs extends \Block\Core\Edit\Tabs
{
		function __construct()
		{
			parent::__construct();
			
		}

		public function prepareTabs()
		{

			$this->addTab('ConfigGroup', ['label' => 'Edit', 'block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Edit']);
			if($this->getRequest()->getGet('id')){
			$this->addTab('Config', ['label' => 'Config', 'block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Config']);
			}
			$this->setDefaultTab('ConfigGroup');
			return $this;
		}

		


}

?>