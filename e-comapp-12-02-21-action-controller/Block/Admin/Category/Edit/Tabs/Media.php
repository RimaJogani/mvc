<?php
namespace Block\Admin\Category\Edit\Tabs;

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
		$this->setTemplate('admin/category/edit/tabs/media.php');
	}

	public function getImageData($id)
    {
        $media = \Mage::getModel("model\category\categorymedia");

        $query = "select * from categorymedia where categoryId =".$id;
        $media = $media->fetchAll($query);

        return $media;
    }
}

?>