<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');
/**
 * 
 */
class Media extends \Block\Core\Template
{
	use \Block\Core\Edit\Traits;
	function __construct()
	{
		$this->setTemplate('admin/product/edit/tabs/media.php');
	}

	public function getImageData($id)
    {
        $media = \Mage::getModel("model\product\productmedia");

        $query = "select * from productmedia where productId =".$id;
        $media = $media->fetchAll($query);
        return $media;
    }
}

?>