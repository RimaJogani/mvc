<?php

namespace Block\Admin\Attribute\Edit;

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

			$this->addTab('Attribute', ['label' => 'Edit', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Edit']);
			if($this->getRequest()->getGet('id')){
			$this->addTab('Option', ['label' => 'Option', 'block' => 'Block\Admin\Attribute\Edit\Tabs\Option']);
			}
			$this->setDefaultTab('Attribute');
			return $this;
		}

		


}

?>