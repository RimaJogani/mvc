<?php
namespace Block\Admin\Admin\Edit;

\Mage::loadFileByClassName('Block\Core\Template');
class Tabs extends \Block\Core\Template
{
	protected $tabs = [];
	protected $defaultTab = Null;
	function __construct()
	{
		$this->setTemplate('admin/admin/edit/tabs.php');
		$this->prepareTab();
	}
	public function prepareTab(){

		
		$this->addTab('Admin',['Label'=>'Edit','Block'=>'Block\Admin\Admin\Edit\Tabs\Edit']);
		// $this->addTab('Media',['Label'=>'Media','Block'=>'Block_Admin_Edit\Tabs\Media']);
		$this->setDefaultTab('Admin');
	}
	public function setTabs(Array $tabs){
		$this->tabs=$tabs;
		return $this;

	}
	public function getTabs(){
		return$this->tabs;
	}
	public function setDefaultTab($defaultTab){
		$this->defaultTab=$defaultTab;
		return $this;
	}
	public function getDefualtTab(){
		return $this->defaultTab;
	}
	public function addTab($key,$tabs = []){
		$this->tabs[$key]=$tabs;
		return $this;

	}
	public function getTab($key){
		if(!array_key_exists($key, $this->tabs)){
			return null;
		}
		return $this->tabs[$key];
	}
	public function removeTab($key){
		
		if(array_key_exists($key, $this->tabs)){
			unset($this->tabs[$key]);
		}
		
	}
}


?>