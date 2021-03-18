<?php
namespace Block\Core\Layout; 
\Mage::loadFileByClassName('block\core\template');
class Message extends \Block\Core\Template
{
    function __construct()
    {
        $this->setTemplate('core/layout/message.php');
        
    }
}
?>