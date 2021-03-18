<?php
namespace Block\Admin\Cms\Edit\Tabs; 
\Mage::loadFileByClassName('Block\Core\Template');

/**
 * 
 */
class Edit extends \Block\Core\Template
{
	   protected $cms=null;
	
	function __construct()
	{
		$this->setTemplate('admin/cms/edit/tabs/edit.php');
	}

	 public function setCms($cms = null){
            if($cms){
                $this->cms=$cmst;
                return $this;
            }
            
            $cms=\Mage::getModel('Model\cms');
                if($id = $this->getRequest()->getGet('id')){
                    $cms=$cms->load($id);
                   
                }
                $this->cms=$cms;
               // print_r($payment);
            return $this;

        }
        public function getCms(){
            if(!$this->cms){
                $this->setCms();
            }
            return $this->cms;
        }


}
?>