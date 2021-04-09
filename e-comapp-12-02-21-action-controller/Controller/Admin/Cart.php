<?php 
namespace Controller\Admin;
\Mage::loadFileByClassName('controller\core\admin');
/**
 * 
 */
class Cart extends \Controller\Core\Admin
{
	
	
	public function addToCartAction()
	{
		
		try
		{

			$productId = (int)$this->getRequest()->getGet('id');
			$product = \Mage::getModel('model\Product')->load($productId);
			//print_r($product);
			if(!$product)
			{
				throw new \Exception("Product is not valid");
				
			}
			//echo 11;
			$cart = $this->getCart();
			/*var_dump($cart);
			print_r($cart);die();*/
			foreach ($cart->getdata() as $key => $value) 
			{
				$value->addItemToCart($product,1,true);	
			}
			
			$this->getMessage()->setSuccess('Item successfully added into cart');
			$this->redirect('gridHtml',null,null,true);

		}
		catch(Exception $e)
		{
			$this->getMessage()->setFailure($e->getMessage());
          	$this->redirect("gridHtml",null,null,true);

		}
		

	}

	protected function getCart($customerId = null)
	{
		
		$session = \Mage::getModel('model\admin\session');
		if($customerId)
		{
			$session->customerId = $customerId;
		}
		$cart = \Mage::getModel('model\cart');
		$query = "select * from `{$cart->getTableName()}` where `customerId` = '{$session->customerId}'";
		$cart = $cart->fetchAll($query);
		if($cart)
		{
			return $cart;
		}

		$cart = \Mage::getModel('model\cart');
		$cart->customerId = $session->customerId;
		$cart->createDate = date("Y-m-d H:i:s");
		
		$cart->save();
		return $cart;

	}
	public function gridHtmlAction()
    {
        try
        {
           $grid = \Mage::getBLock('block\Admin\Cart\grid');
          	
           $cart = $this->getCart();
          // print_r($cart);die();
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
          $this->redirect("gridHtml",null,null,true);
           
      }

  }
  public function UpdateAction()
  {
  		try
  		{
  			//echo "<pre>";
  			$quantities = $this->getRequest()->getPost('quantity');

  			$cart = $this->getCart();

  			foreach ($quantities as $cartItemId => $quantity) 
  			{
  				if($quantity == 0)
  				{
  					$cartItem = \Mage::getModel('model\cart\item')->delete($cartItemId);
  					$this->redirect('gridHtml',null,null,true);
  				}
  				$cartItem = \Mage::getModel('model\cart\item')->load($cartItemId);

  				$basePrice =  $quantity * $cartItem->price - ($cartItem->discount * $quantity);
  				$cartItem->basePrice = $basePrice; 
  				$cartItem->quantity = $quantity;

  				$cartItem->save();	
  			}
  			$this->redirect('gridHtml',null,null,true);
  		}
  		catch(Exception $e)
	    {
	          
	        $this->getMessage()->setFailure($e->getMessage());
	        $this->redirect("gridHtml",null,null,true);
	           
	    }

  }

  public function deleteAction()
  {
  		try
  		{
  			
  			$cartItemId = $this->getRequest()->getGet('id');

  			$cartItem = \Mage::getModel('model\cart\item')->delete($cartItemId);
  			$this->redirect("gridHtml",null,null,true);
  			
  		}
  		catch(Exception $e)
	    {
	          
	        $this->getMessage()->setFailure($e->getMessage());
	        $this->redirect("gridHtml",null,null,true);
	           
	    }
  }

  public function selectCustomerAction()
  {
  		
  		$customerId = $this->getRequest()->getPost('customer');
  		
  		$this->getCart($customerId);
  		$this->redirect("gridHtml",null,null,true);
  }

}  


?>