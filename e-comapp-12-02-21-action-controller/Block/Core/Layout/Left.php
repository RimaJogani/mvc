<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('block\core\template');
class Left extends \Block\Core\Template
{
    function __construct()
    {
        $this->setTemplate('core/layout/left.php');   
    }
}
?>