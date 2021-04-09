<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
\Mage::loadFileByClassName('Block\Core\Edit\Traits');
/**
 * 
 */
class GroupPrice extends \Block\Core\Template
{
	use \Block\Core\Edit\Traits;
	protected $product = null;
	function __construct()
	{
		$this->setTemplate('admin/product/edit/tabs/groupprice.php');
		
	}

	
	public function getCustomerGroup()
	{
		 $query="SELECT cg.*,pgp.productId,pgp.entityId,pgp.price,
		if(p.productPrice IS NULL,'{$this->getTableRow()->productPrice}',p.productPrice) As productPrice
		FROM customergroup cg
		LEFT JOIN product_group_price pgp
			ON pgp.customerGroupId = cg.customerGroupId
				AND pgp.productId = '{$this->getTableRow()->productId}'
		LEFT JOIN product p
			ON pgp.productId=p.productId";
		
		$customerGroup=\Mage::getModel('model\customer\customerGroup');
		$data=$customerGroup->fetchAll($query);
		
		return $data;
	}
}

?>