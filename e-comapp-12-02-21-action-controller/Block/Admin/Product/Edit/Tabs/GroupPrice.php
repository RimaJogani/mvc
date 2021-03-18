<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');
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
		$this->setProduct();
	}

	public function setProduct()
	{
		$product=\Mage::getModel('Model\product');
		$query="SELECT * FROM `product` Where `productId`='{$this->getRequest()->getGet('id')}'";
		$product->fetchRow($query);
		
		$this->product=$product;
		//print_r($this->product);
		//die();
		return $this;
	}
	public function getProduct()
	{

		return $this->product;
	}
	public function getCustomerGroup()
	{
		 $query="SELECT cg.*,pgp.productId,pgp.entityId,pgp.price,
		if(p.productPrice IS NULL,'{$this->getProduct()->productPrice}',p.productPrice) As productPrice
		FROM customergroup cg
		LEFT JOIN product_group_price pgp
			ON pgp.customerGroupId = cg.customerGroupId
				AND pgp.productId = '{$this->getProduct()->productId}'
		LEFT JOIN product p
			ON pgp.productId=p.productId";
		
		$customerGroup=\Mage::getModel('model\customer\customerGroup');
		$data=$customerGroup->fetchAll($query);
		
		return $data;
	}
}

?>