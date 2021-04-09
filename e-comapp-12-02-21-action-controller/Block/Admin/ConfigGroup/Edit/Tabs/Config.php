<?php
namespace Block\Admin\ConfigGroup\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');
/**
 * 
 */
class Config extends \Block\Core\Template
{
	//protected $options=[];
    use \Block\Core\Edit\Traits;
	public $configGroup=null;
	
	public function __construct()
	{  
		$this->setTemplate('admin/configgroup/edit/tabs/config.php');
	}
	

	public function setConfigGroup($configGroup = null){
            if($configGroup){
                $this->configGroup=$configGroup;
                return $this;
            }
            
             $configGroup=\Mage::getModel('Model\configGroup');
             
                if($id = $this->getRequest()->getGet('id')){
                    $configGroup=$configGroup->load($id);
                   
                }
                $this->configGroup=$configGroup;
              
            return $this;

        }
        public function getConfigGroup(){
            if(!$this->configGroup){
                $this->setConfigGroup();
            }
            return $this->configGroup;
        }

	
}

?>