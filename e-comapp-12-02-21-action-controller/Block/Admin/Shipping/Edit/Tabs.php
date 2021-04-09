<?php
namespace Block\Admin\shipping\Edit;
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
			$this->addTab('Shipping', ['label' => 'Edit', 'block' => 'Block\Admin\Shipping\Edit\Tabs\Edit']);
			$this->setDefaultTab('Shipping');
			return $this;
		}

		

}

?>