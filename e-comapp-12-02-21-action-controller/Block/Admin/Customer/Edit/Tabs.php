<?php
namespace Block\Admin\Customer\Edit;


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
			$this->addTab('Customer', ['label' => 'Edit', 'block' => 'Block\Admin\Customer\Edit\Tabs\Edit']);

			if($this->getRequest()->getGet('id')){
				$this->addTab('Address', ['label' => 'Address', 'block' => 'Block\Admin\Customer\Edit\Tabs\address']);	
			}
			
			
			$this->setDefaultTab('Customer');
			return $this;
		}

		
}

?>