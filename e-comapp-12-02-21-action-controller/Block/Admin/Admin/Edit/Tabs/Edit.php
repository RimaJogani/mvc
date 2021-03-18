<?php
namespace Block\Admin\Admin\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

/**
 * 
 */
class Edit extends \Block\Core\Template
{

	 protected $admin=null;	
	function __construct()
	{
			$this->setTemplate('admin/admin/edit/tabs/edit.php');
	}
	public function setAdmin($admin = null){
            if($admin){
                $this->admin=$admin;
                return $this;
            }
            
             $admin=\Mage::getModel('Model\admin');
                if($id = $this->getRequest()->getGet('id')){
                    $admin=$admin->load($id);
                   
                }
                $this->admin=$admin;
              
            return $this;

        }
        public function getAdmin(){
            if(!$this->admin){
                $this->setAdmin();
            }
            return $this->admin;
        }
}
?>