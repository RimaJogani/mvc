<?php

namespace Model\Cart;
\Mage::loadFileByClassName('model\core\table');
/**
 * 
 */
class Address extends \Model\Core\Table
{
	protected $cart = null;
	protected $billingAddress = null;
	protected $shippingAddress = null;

	const ADDRESS_TYPE_BILLING = 'Billing';
	const ADDRESS_TYPE_SHIPPING = 'Shipping';
	public function __construct()
	{
		parent::__construct();
		$this->setTableName('cart_address')->setPrimarykey('cartAddressId');
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

	public function setBillingAddress(\Model\Customer\Address $address)
	{
		$this->billingAddress = $address;
		return $this;
	}
	public function getBillingAddress()
	{
		
		if(!$this->addressId)
		{
			return false;
		}
		$address = \Mage::getModel('model\customer\address');
		$query = "select * from `{$address->getTableName()}` where `addressId`= {$this->addressId} AND `addressType` ='billing' ";
		
		$address->fetchAll($query);
		$this->setBillingAddress($address);
		return $this->address;


	}

	public function setShippingAddress(\Model\Customer\Address $address)
	{
		$this->shippingAddress = $address;
		return $this;
	}
	public function getShippingAddress()
	{
		if(!$this->addressId)
		{
			return false;
		}
		$address = \Mage::getModel('model\customer\address');
		$query = "select * from `{$address->getTableName()}` where `addressId`= {$this->addressId} AND `addressType` ='shipping' ";
		$address->fetchAll($query);
		$this->setBillingAddress($address);
		return $this->address;


	}
}



?>