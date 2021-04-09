<?php
namespace Block\Admin\Cart;


\Mage::loadFileByClassName("Block\Core\Template");

class Checkout extends \Block\Core\Template
{
    
    protected $payments = null;
    protected $shippings = null;
    protected $cart = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/cart/checkout.php');
    }

    public function setCart(\Model\Cart $cart)
    {
       
        $this->cart=$cart;
        return $this;

    }
    public function getCart()
    {
        if(!$this->cart)
        {
            throw new \Exception("Cart is not set");
            
        }

        return $this->cart;
    }

    
    public function getBillingAddress()
    {
       $cartBillingAddress = $this->getCart()->getBillingAddress();
        //print_r($cartBillingAddress);die();
        
        if($cartBillingAddress)
        {
            return $cartBillingAddress;
        }
        $cart = $this->getCart();
        
        //print_r($customerBillingAddress);
        if($cart->getCustomer())
        {
            $customerBillingAddress = $cart->getCustomer()->getBillingAddress();
            if($customerBillingAddress)
            {
                $cartBillingAddress = \Mage::getModel('model\cart\address');
                $cartBillingAddress->cartId = $cart->cartId;
                $cartBillingAddress->addressId = $customerBillingAddress->addressId;
                $cartBillingAddress->addressType = $customerBillingAddress->addressType;
                $cartBillingAddress->address= $customerBillingAddress->address;
                $cartBillingAddress->city = $customerBillingAddress->city;
                $cartBillingAddress->state = $customerBillingAddress->state;
                $cartBillingAddress->country = $customerBillingAddress->country;
                $cartBillingAddress->zipcode = $customerBillingAddress->zipcode;

                $billingAddress = $cartBillingAddress;
                //print_r($BillingAddress);
               return $billingAddress;
            }
            

        }
        
        $cartBillingAddress = \Mage::getModel('model\cart\address');
        return $cartBillingAddress;
    }

    public function getShippingAddress()
    {
       
        $cartShippingAddress = $this->getCart()->getShippingAddress();
        //print_r($cartShippingAddress);die();
        
        if($cartShippingAddress)
        {
            return $cartShippingAddress;
        }
        $cart = $this->getCart();
        
        //print_r($customerShippingAddress);
        if($cart->getCustomer())
        {
            $customerShippingAddress = $cart->getCustomer()->getShippingAddress();
            if($customerShippingAddress)
            {
                $cartShippingAddress = \Mage::getModel('model\cart\address');
                $cartShippingAddress->cartId = $cart->cartId;
                $cartShippingAddress->addressId = $customerShippingAddress->addressId;
                $cartShippingAddress->addressType = $customerShippingAddress->addressType;
                $cartShippingAddress->address= $customerShippingAddress->address;
                $cartShippingAddress->city = $customerShippingAddress->city;
                $cartShippingAddress->state = $customerShippingAddress->state;
                $cartShippingAddress->country = $customerShippingAddress->country;
                $cartShippingAddress->zipcode = $customerShippingAddress->zipcode;

                $shippingAddress = $cartShippingAddress;
                //print_r($shippingAddress);
               return $shippingAddress;
            }
            

        }
        
        $cartShippingAddress = \Mage::getModel('model\cart\address');
        return $cartShippingAddress;
    }
       
   public function setPayemtMethods(\Model\Payment\Collection $payments)
    {
       $this->payments = $payments;
       return $this;
    } 
    public function getPaymentMethods()
    {
        if($this->payments)
        {
            return $this->payments;
        }
        $payments = \Mage::getModel('model\payment');
        $payments = $payments->fetchAll();
        if($payments)
        {
            $this->setPayemtMethods($payments);
        }
        return $this->payments;
    }

    public function setShippingMethods(\Model\Shipping\Collection $shippings)
    {
       $this->shippings = $shippings;
       return $this;
    } 
    public function getShippingMethods()
    {
        if($this->shippings)
        {
            return $this->shippings;
        }
        $shippings = \Mage::getModel('model\shipping');
        $shippings = $shippings->fetchAll();
        if($shippings)
        {
            $this->setShippingMethods($shippings);
        }
        return $this->shippings;
    }

    public  function getBaseTotal()
    {

        $cart = $this->getCart();
       
        $cartItems = $cart->getItems();
        //print_r($cartItems);die();
        $total = 0;
        if($cartItems)
        {
            foreach ($cartItems->getData() as $item) 
            {
               $total  += $item->basePrice;
            }
           
        }
       
        return $total;


    }   
    public  function getShippingCharges()
    {
        $cart = $this->getCart();
        //print_r($cart);
        if($cart)
        {   
            return $cart->shippingAmount;
        }

        return 0;
    }

    public function getGrantTotal()
    {
        return $this->getBaseTotal() + $this->getShippingCharges();

    }


}


?>