<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('block\core\template');
class Content extends \Block\Core\Template
{
    function __construct()
    {
        $this->setTemplate('core/layout/content.php');
        
    }
}
?>