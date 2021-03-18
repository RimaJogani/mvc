<?php
namespace Block\Admin\Product\Edit;


\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

/**
*
*/
class Tabs extends \Block\Core\Edit\Tabs
{

		public function __construct()
		{

			parent::__construct();
		}
		public function prepareTabs()
		{	

			$this->addTab('Product', ['label' => 'Form', 'block' => 'Block\Admin\Product\Edit\Tabs\Edit']);
			if($this->getRequest()->getGet('id')){
			$this->addTab('Media', ['label' => 'Media', 'block' => 'Block\Admin\Product\Edit\Tabs\Media']);	
			
			$this->addTab('Group_Price', ['label' => 'Group_Price', 'block' => 'Block\Admin\Product\Edit\Tabs\GroupPrice']);
			$this->addTab('Attribute', ['label' => 'Attribute', 'block' => 'Block\Admin\Product\Edit\Tabs\Attribute']);
			}
			$this->setDefaultTab('Product');
			return $this;
		}

		


}

?>