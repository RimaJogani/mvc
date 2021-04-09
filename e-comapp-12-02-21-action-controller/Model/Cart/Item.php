<?php

namespace Model\Cart;
\Mage::loadFileByClassName('model\core\table');
/**
 * 
 */
class Item extends \Model\Core\Table
{
	protected $cart = null;	
	protected $product = null;
	public function __construct()
	{
		parent::__construct();
		$this->setTableName('cart_item')->setPrimarykey('cartItemId');
	}

	public function setCart(\Model\Cart $cart)
	{
		$this->cart=$cart;
		return $this;
	}

	public function getcart()
	{
		if(!$this->cartId)
		{
			return false;
		}
		$cart = \Mage::getModel('model\cart')->load($this->cartId);
		$this->setCart($cart);
		return $this->cart;

	}

	public function setProduct(\Model\Product $product)
	{
		$this->product=$product;
		return $this;
	}

	public function getProduct()
	{
		if(!$this->productId)
		{
			return false;
		}
		$product = \Mage::getModel('model\product')->load($this->productId);
		$this->setProduct($product);
		return $this->product;

	}
}

	

?>