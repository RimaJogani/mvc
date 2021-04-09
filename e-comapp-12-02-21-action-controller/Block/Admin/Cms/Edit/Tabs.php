<?php
namespace Block\Admin\Cms\Edit;


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
			$this->addTab('Cms', ['label' => 'Edit', 'block' => 'Block\Admin\Cms\Edit\Tabs\Edit']);
			$this->setDefaultTab('Cms');
			return $this;
		}


}

?>