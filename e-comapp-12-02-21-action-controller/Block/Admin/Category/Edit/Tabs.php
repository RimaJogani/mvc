<?php
namespace Block\Admin\Category\Edit;

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
			$this->addTab('Category', ['label' => 'Edit', 'block' => 'Block\Admin\Category\Edit\Tabs\Edit']);
			$this->addTab('Media', ['label' => 'Media', 'block' => 'Block\Admin\Category\Edit\Tabs\Media']);
			$this->setDefaultTab('Category');
			return $this;
		}

		


}

?>