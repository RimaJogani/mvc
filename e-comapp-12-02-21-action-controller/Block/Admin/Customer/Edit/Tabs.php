<?php
namespace Block\Admin\Customer\Edit;


\Mage::loadFileByClassName('Block\Core\Template');

/**
*
*/
class Tabs extends \Block\Core\Template
{
		protected $tabs = [];
		protected $defaultTab = NULL;

		function __construct()
		{
			$this->setTemplate('admin/customer/edit/tabs.php');
			$this->prepareTab();
		}

		public function prepareTab()
		{
			$this->addTab('Customer', ['label' => 'Edit', 'block' => 'Block\Admin\Customer\Edit\Tabs\Edit']);

			if($this->getRequest()->getGet('id')){
				$this->addTab('Address', ['label' => 'Address', 'block' => 'Block\Admin\Customer\Edit\Tabs\address']);	
			}
			
			
			$this->setDefaultTab('Customer');
			return $this;
		}

		public function setTabs(array $tabs = [])
		{
			$this->tabs = $tabs;
			return $this;
		}

		public function getTabs()
		{
			return $this->tabs;
		}

		public function addTab($key ,$tab = [])
		{
			$this->tabs[$key] = $tab;
		}

		public function getTab($key)
		{
			if (!array_key_exists($key, $this->tabs)) {
			return NULL;
		}
			return $this->tabs[$key];
		}

		public function removeTab($key)
		{
			if (!array_key_exists($key, $this->tabs)) {
			unset($this->tabs[$key]);
			}
		}
		public function setDefaultTab($defaultTab)
		{
			$this->defaultTab = $defaultTab;
		}

		public function getDefaultTab()
		{
			return $this->defaultTab;
		}


}

?>