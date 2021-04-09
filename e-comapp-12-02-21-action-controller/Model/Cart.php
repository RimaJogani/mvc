<?php

namespace Model;
\Mage::loadFileByClassName('Model\core\table');
/**
 * 
 */
class Cart extends Core\Table
{
	protected $customers = null;
	protected $customer = null;
	protected $items = null;
	protected $billingAddress = null;
	protected $shippinggAddress = null;
	protected $payment = null;
	protected $shipping = null;
	public function __construct()
	{
		parent::__construct();
		$this->setTableName('cart')->setPrimaryKey('cartId');

	}

	public function setCustomer(\Model\Customer $customer)
	{
		$this->customer = $customer;
		//print_r($this->customer);
		return $this;
	}
	public function getCustomer()
	{
		if($this->customer)
		{
			return $this->customer;
		}
		if(!$this->customerId)
		{
			return false;
		}
		$customer = \Mage::getModel('Model\customer')->load($this->customerId);
		if($customer)
		{
			$this->setCustomer($customer);
		}
		

		return $this->customer;

	}
	public function setCustomers(\Model\Customer\Collection $customers)
	{

		$this->customers=$customers;
		return $this;
	}
	public function getCustomers()
	{
		if($this->customers)
		{
			return $this->customers;
		}
		
		$customers = \Mage::getModel('Model\customer')->fetchAll();
		if($customers)
		{
			$this->setCustomers($customers);

		}
		return $this->customers;

	}

	public function setItems(\Model\Cart\Item\Collection $items)
	{
		$this->items=$items;
		return $this;
	}

	public function getItems()
	{
		if(!$this->cartId)
		{
			return false;
		}
		$items = \Mage::getModel('model\cart\item');

		$query = "select * from `{$items->getTableName()}` where `cartId`={$this->cartId}";
		$items = $items->fetchAll($query);
		if($items)
		{

			$this->setItems($items);
		}
		return $this->items;
		
	}

	public function setShippingAddress(\Model\Cart\Address $address)
	{
		$this->shippingAddress = $address;
		return $this;
	}

	public function getShippingAddress()
	{
		if(!$this->cartId)
		{
			return false;
		}
		$address = \Mage::getModel('model\cart\address');
		$query = "select * from `{$address->getTableName()}` where `cartId`= {$this->cartId} AND `addressType` ='shipping' ";
		
		$address = $address->fetchRow($query);
		if($address)
		{
			$this->setShippingAddress($address);
		}
		
		return $this->shippingAddress;
	}

	public function setBillingAddress(\Model\Cart\Address $address)
	{
		//print_r($address);
		$this->billingAddress = $address;
		//	print_r($this->billingAddress);
		return $this;
	}

	public function getBillingAddress()
	{
		if(!$this->cartId)
		{
			return false;
		}
		$address = \Mage::getModel('model\cart\address');
		$query = "select * from `{$address->getTableName()}` where `cartId`= {$this->cartId} AND `addressType` ='billing' ";
		
		$address = $address->fetchRow($query);
		//print_r($address);
		if($address)
		{
			$this->setBillingAddress($address);
			
		}
		
		
		return $this->billingAddress;
	}


	public function addItemToCart($product,$quantity,$addMode = false)
	{

		
		//print_r($this->cartId);
		$query = "select * from `cart_item` where `cartId` = '{$this->cartId}' AND `productId` = {$product->productId} ";
		$cartItem = \Mage::getModel('Model\cart\item');
		$cartItem = $cartItem->fetchRow($query);
		if($cartItem)
		{
			$cartItem->quantity += $quantity;
			$cartItem->save();
			return true;
		}
		$cartItem = \Mage::getModel('model\cart\item');
		$cartItem->cartId = $this->cartId;
		$cartItem->productId = $product->productId;
		$cartItem->price = $product->productPrice;
		$cartItem->quantity = $quantity;
		$cartItem->discount = $product->productDiscount * $quantity;
		$cartItem->basePrice = $quantity * $product->productPrice - ($product->productDiscount * $quantity * $quantity);

		$cartItem->createDate = date('Y-m-d H:i:s');
		//print_r($cartItem);
		$cartItem->save();

	}

	public function setPaymentMethod(\Model\cart $payment){
		$this->payment = $payment;
		return $this;
	}

	public function getPaymentMethod()
	{
		/*echo '<pre>';
		print_r($this->cartId);*/
		if($this->payment){
			return $this->payment;
		}
		if(!$this->cartId){
			return false;
		}
		$payment = \Mage::getModel('Model\cart')->load($this->cartId);
		
		if($payment)
		{
			$this->setPaymentMethod($payment);
		}
		
		return $this->payment;
	}
	public function setShippingMethod(\Model\cart $shipping){
		$this->shipping = $shipping;
		return $this;
	}

	public function getShippingMethod()
	{
		if($this->shipping){
			return $this->shipping;
		}
		if(!$this->cartId){
			return false;
		}
		$shipping = \Mage::getModel('Model\cart')->load($this->cartId);
		if($shipping)
		{
			$this->setShippingMethod($shipping);
		}
		
		return $this->shipping;
	}


}


?>