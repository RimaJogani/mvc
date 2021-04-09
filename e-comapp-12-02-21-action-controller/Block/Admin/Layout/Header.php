<?php
namespace Block\Admin\Layout;

\Mage::loadFileByClassName('block\core\template');

class Header extends \Block\Core\Template
{
    function __construct()
    {
    	
        $this->setTemplate('admin/layout/headerlink.php');
        
    }
}
?>