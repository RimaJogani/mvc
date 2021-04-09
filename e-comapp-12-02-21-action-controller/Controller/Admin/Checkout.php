<?php
namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");




class  Checkout extends \Controller\Core\Admin
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function formAction()
    {
        try
        {
            $customerId = $this->getRequest()->getGet('id');
            $cart = $this->getCart($customerId);

            $grid = \Mage::getBLock('block\Admin\Cart\checkout');
            
            foreach ($cart->getdata() as $key => $value) 
            {
               $grid->setCart($value);  

            }
            $gridHtml = $grid->toHtml();
            $response=[
              
              'element'=>[
              [
                'selector'=>'#ContentGrid',
                'html'=>$gridHtml

              ]
            ]

            ];
            header("content-type: application/json");
            echo json_encode($response);   
        }
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("form",null,null,true);
        }

    }
    protected function getCart($customerId = null)
    {
        
        $session = \Mage::getModel('model\admin\session');
        $cart = \Mage::getModel('model\cart');
        //print_r($cart);
        if($customerId)
        {
          $session->customerId = $customerId;
        }
        
        $query = "select * from `{$cart->getTableName()}` where `customerId` = '{$session->customerId}'";
        $cart = $cart->fetchAll($query);
        
        
        if($cart)
        {
          return $cart;
        }
        /*$cart = \Mage::getModel('model\cart');
        //print_r($cart);
        $cart->customerId = $customerId;
        $cart->createDate = date("Y-m-d H:i:s");
        
        $cart->save();
        return $cart;*/

    }

    public function saveBillingAddressAction()
    {
        try
        {
            echo "<pre>";

            $billing = $this->getRequest()->getPost('billing');
            if($billing['saveToAddressBook'] == 'on')
            {
               
               $cart = $this->getCart();
                foreach ($cart->getdata() as $key => $value) 
                {
                    $cartId = $value->cartId;
                    $customerId = $value->getCustomer()->customerId;
                    $addressId = $value->getCustomer()->getBillingAddress()->addressId;
                    
                    $cartAddressId = $value->getBillingAddress()->cartAddressId;
                    $customerBillingAddress = \Mage::getModel('model\customer\address');
                    $cartBillingAddress = \Mage::getModel('model\cart\address');
                    
                    //print_r($customerBillingAddress);
                    if($addressId)
                    {
                        $query = "select * from `customeraddress` where `addressId` = {$addressId} AND `addressType` = 'billing'";
                        $customerBillingAddress = $customerBillingAddress->fetchRow($query);
                        //echo 'update';
                        $customerBillingAddress->addressId = $addressId;
                        $customerBillingAddress->addressType = 'billing';

                        $query = "select * from `cart_address` where `cartAddressId` = {$cartAddressId} AND `addressType` = 'billing'";
                        $cartBillingAddress = $cartBillingAddress->fetchRow($query);
                        //echo 'update';
                        $cartBillingAddress->cartAddressId = $cartAddressId;
                        $cartBillingAddress->addressId = $addressId;
                        $cartBillingAddress->addressType = 'billing';


                    }
                    else
                    {
                        //echo 'save';
                        $customerBillingAddress->customerId = $customerId;
                        $customerBillingAddress->addressType = 'billing';


                        $cartBillingAddress->cartId = $cartId;
                        $cartBillingAddress->addressId = $addressId;
                        $cartBillingAddress->addressType = 'billing';
                    }
                    
                    
                    unset($billing['saveToAddressBook']);
                    $customerBillingAddress->setData($billing);
                    //print_r($customerBillingAddress);  
                    $customerBillingAddress->save(); 
                    $cartBillingAddress->setData($billing);
                    //print_r($cartBillingAddress);
                    $cartBillingAddress->save();
                    
                }
            }
            else
            {

                $addressId = $this->getRequest()->getGet('addressId');
                $cartAddressId = $this->getRequest()->getGet('cartAddressId');
                $cartId = $this->getRequest()->getGet('cartId');
                //print_r($billing);
                $cartBillingAddress = \Mage::getModel('model\cart\Address');
                $cartBillingAddress->cartAddressId = $cartAddressId;
                $cartBillingAddress->addressId = $addressId;
                $cartBillingAddress->cartId = $cartId;
                $cartBillingAddress->addressType = 'billing';
                $cartBillingAddress->setData($billing);
                //print_r($cartBillingAddress);
                $cartBillingAddress->save();
            } 
            $this->redirect("form",null,null,true);
        }   
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("form",null,null,true);
        }


    }
   
    public function saveShippingAddressAction()
    {
        try
        {
            
            echo "<pre>";
            $shipping = $this->getRequest()->getPost('shipping');
            $flag = $this->getRequest()->getPost('sameAsBilling');
            if($flag)
            {   

                $billing = $this->getRequest()->getPost('billing');
                $cart = $this->getCart();

                foreach ($cart->getdata() as $key => $value) 
                {

                    $cartId = $value->cartId;
                    $cartaddress = $value->getShippingAddress();
                     $cartShippingAddress = \Mage::getModel('model\cart\address');
                    if($cartaddress)
                    {
                        $cartAddressId = $cartaddress->cartAddressId;
                    
                       
                        if($cartAddressId)
                        { 
                            //echo 'update';
                            $cartShippingAddress = $cartShippingAddress->load($cartAddressId);
                            if(!$cartShippingAddress)
                            {
                                throw new Exception("invalid Id", 1);
                            }
                            //print_r($cartShippingAddress);
                            $cartShippingAddress->cartAddressId = $cartAddressId;
                        }
                        
                    }
                    //echo 'save';
                    $cartShippingAddress->addressType = 'shipping';
                    $cartShippingAddress->cartId = $cartId;
                    $cartShippingAddress->setData($billing);
                    //print_r($cartShippingAddress);
                    $cartShippingAddress->save();
                
                }
                
            }
            else
            {
                
                $addressId = $this->getRequest()->getGet('addressId');
                $cartAddressId = $this->getRequest()->getGet('cartAddressId');
                $cartId = $this->getRequest()->getGet('cartId');
                //print_r($shipping);
                $cartShippingAddress = \Mage::getModel('model\cart\Address');
                
                $cartShippingAddress->cartAddressId = $cartAddressId;
                $cartShippingAddress->addressId = $addressId;
                $cartShippingAddress->cartId = $cartId;
                $cartShippingAddress->addressType = 'shipping';
                $cartShippingAddress->setData($shipping);
                //print_r($cartShippingAddress);
                $cartShippingAddress->save();
            }
            if($shipping['saveToAddressBook'] == 'on')
                {
                
                    //echo 'saveToAddressBook';
                    $cart = $this->getCart();
                    foreach ($cart->getdata() as $key => $value) 
                    {
                        //print_r($value->getCustomer());die();
                        $cartId = $value->cartId;
                        $customerId = $value->getCustomer()->customerId;
                        $addressId = $value->getCustomer()->getShippingAddress()->addressId;
                        $cartAddressId = $value->getShippingAddress()->cartAddressId;
                        $customerShippingAddress = \Mage::getModel('model\customer\address');
                        $cartShippingAddress = \Mage::getModel('model\cart\address');
                        
                        //print_r($customerShippingAddress);
                        if($addressId)
                        {
                            $query = "select * from `customeraddress` where `addressId` = {$addressId} AND `addressType` = 'shipping'";
                            $customerShippingAddress = $customerShippingAddress->fetchRow($query);
                            //echo 'update';
                            $customerShippingAddress->addressId = $addressId;
                            $customerShippingAddress->addressType = 'shipping';

                            $query = "select * from `cart_address` where `cartAddressId` = {$cartAddressId} AND `addressType` = 'shipping'";
                            $cartShippingAddress = $cartShippingAddress->fetchRow($query);
                            //echo 'update';
                            $cartShippingAddress->cartAddressId = $cartAddressId;
                            $cartShippingAddress->addressId = $addressId;
                            $cartShippingAddress->addressType = 'shipping';


                        }
                        else
                        {
                            //echo 'save';
                            $customerShippingAddress->customerId = $customerId;
                            $customerShippingAddress->addressType = 'shipping';


                            $cartShippingAddress->cartId = $cartId;
                            $cartShippingAddress->addressId = $addressId;
                            $cartShippingAddress->addressType = 'shipping';
                        }
                        
                        
                        unset($shipping['saveToAddressBook']);
                        $customerShippingAddress->setData($shipping);
                        //print_r($customerShippingAddress);  
                        $customerShippingAddress->save(); 
                        $cartShippingAddress->setData($shipping);
                        //print_r($cartShippingAddress);
                        $cartShippingAddress->save();
                        
                        
                    }
                    



                }  
            $this->redirect("form",null,null,true);
        }
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("form",null,null,true);
        }


    }
    public function paymentMethodAction()
    {
        try
        {
            $paymentId = $this->getRequest()->getPost('paymentMethod');
            $cart = $this->getCart();
            foreach ($cart->getdata() as $key => $value) 
            {
                    $cartId = $value->cartId;
            }
            $cartModel = \Mage::getModel('Model\cart');
            $cartModel->cartId = $cartId;
            $cartModel->paymentId = $paymentId; 
            $cartModel->save();
            $this->redirect("form",null,null,true);

        }
        
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("form",null,null,true);
        }
    }

    public function shippingMethodAction()
    {
        try
        {
            $shippingId = $this->getRequest()->getPost('shippingMethod');
            $shipping = \Mage::getModel('model\shipping');
            $shipping = $shipping->load($shippingId);
            if($shipping)
            {
                $shippingAmount = $shipping->shippingAmount;
            }
            $cart = $this->getCart();
            foreach ($cart->getdata() as $key => $value) 
            {
                    $cartId = $value->cartId;
            }
            $cartModel = \Mage::getModel('Model\cart');
            $cartModel->cartId = $cartId;
            $cartModel->shippingId = $shippingId; 
            $cartModel->shippingAmount = $shippingAmount; 
            $cartModel->save();
            $this->redirect("form",null,null,true);

        }
        
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("form",null,null,true);
        }
    }
   

   public function calculateAction()
   {
       
       try
        {
              
               $total = $this->getRequest()->getPost('grandTotal');
               $cartId = $this->getRequest()->getGet('id');
               
               $cart = \Mage::getModel('model\cart');

               $cart->cartId = $cartId;
               $cart->total = $total;
               

               $cart->save();
               $this->redirect("form",null,null,true);

        }
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("form",null,null,true);
        }
    }



  


}

?>