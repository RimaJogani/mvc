<?php

namespace Block\Admin\Payment\Edit;
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
			$this->addTab('Payment', ['label' => 'Edit', 'block' => 'Block\Admin\payment\Edit\Tabs\Edit']);
			
			$this->setDefaultTab('Payment');
			return $this;
		}


}

?>