<?php

namespace Block\Admin\Cms;

\Mage::getController("Block\Core\Edit");
class Edit extends \Block\Core\Edit
{

        public function __construct()
        {
            parent::__construct();
            $this->setTabClass(\Mage::getBlock('Block\Admin\Cms\Edit\Tabs'));

        }
        

       
}
?>