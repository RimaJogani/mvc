<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('block\core\template');
class Footer extends \Block\Core\Template
{
    function __construct()
    {
        $this->setTemplate('core/layout/footer.php');
        
    }
}
?>