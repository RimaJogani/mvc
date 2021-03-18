<?php 
namespace Block\Core\Edit;
\Mage::loadFileByClassName('Block\Core\Template');



class Tabs extends \Block\Core\Template
{

	protected $tableRow=null;
	protected $tabs = [];
	protected $defaultTab = NULL;
	public function __construct()
		{
			$this->setTemplate("core/edit/tabs.php");
			$this->prepareTabs();
		}
		public function getTableRow()
		{
			return $this->tableRow;
		}
		public function setTableRow(\Model\Core\Table $tableRow)
		{	

			$this->tableRow = $tableRow;
			
			return $this;
		}
		public function prepareTabs()
		{
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
			return $this;
		}

		public function getDefaultTab()
		{
			
			return $this->defaultTab;
		}
}

?>