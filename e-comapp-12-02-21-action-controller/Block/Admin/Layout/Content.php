<?php
namespace Block\Admin\Layout;
\Mage::loadFileByClassName('block\core\template');
class Content extends \Block\Core\Template
{
    function __construct()
    {
        $this->setTemplate('admin/layout/content.php');
        
    }
}
?>