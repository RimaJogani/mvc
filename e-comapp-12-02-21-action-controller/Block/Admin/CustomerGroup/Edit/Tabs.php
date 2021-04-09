<?php
namespace Block\Admin\CustomerGroup\Edit;
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
			$this->addTab('CustomerGroup', ['label' => 'Edit', 'block' => 'Block\Admin\CustomerGroup\Edit\Tabs\Edit']);
			$this->setDefaultTab('CustomerGroup');
			return $this;
		}

		

}

?>