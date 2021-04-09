<?php
namespace Block\Admin\Layout;
\Mage::loadFileByClassName('block\core\template');

class Footer extends \Block\Core\Template
{
    function __construct()
    {
        $this->setTemplate('admin/layout/footer.php');
        
    }
}
?>