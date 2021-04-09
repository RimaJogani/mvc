<?php

$cart = $this->getCart();

$customer = $cart->getCustomer();
//print_r($customer->firstName);
//print_r($cart->cartId);
$billingAddress = $this->getBillingAddress();
//print_r($billingAddress);
$shippingAddress = $this->getShippingAddress();
//print_r($shippingAddress);
$paymentMethods = $this->getPaymentMethods();
//print_r($paymentMethods);
$shippingMethods = $this->getShippingMethods();
//print_r($shippingMethods);die();
$cartshippingMethod = $cart->getShippingMethod();
//print_r($cartshippingMethod->paymentId);
$cartpaymentMethod = $cart->getPaymentMethod();

//$basetotal = $this->getBaseTotal();


?>



<form method="POST" id="addressForm" action="">
	<div class="form-group">
		<label for="customer">Customer Name :-  </label><?php echo $customer->firstName.' '.$customer->lastName?>
		
	</div>
	
	
		<h4>Billing Address Form</h4>
		<hr>
		
		
		
		<div class="font-weight-bold form-row">
			<div class="form-group col-md-3">
				<input type="text" class="form-control" name="billing[address]" id="address" placeholder="Address" <?php if($billingAddress):?> value="<?php echo $billingAddress->address ?>" <?php endif;?> >
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control" name="billing[city]" id="city" placeholder="City"<?php if($billingAddress):?> value="<?php echo $billingAddress->city ?>" <?php endif;?> >
			</div>
		</div>
		<div class="font-weight-bold form-row">

			<div class="form-group col-md-3">
				<input type="text" class="form-control" name="billing[state]" id="state" placeholder="State" <?php if($billingAddress):?> value="<?php echo $billingAddress->state ?>" <?php endif;?> >
			</div>
			<div class="form-group col-md-3">
				<input type="number" class="form-control" name="billing[zipcode]" id="city" placeholder="Zipcode" <?php if($billingAddress):?> value="<?php echo $billingAddress->zipcode ?>" <?php endif;?>  >
			</div>

		</div>
		<div class="font-weight-bold form-row">

			<div class="form-group col-md-3">
				<input type="text" class="form-control" name="billing[country]" id="country" placeholder="Country" <?php if($billingAddress):?> value="<?php echo $billingAddress->country?>" <?php endif;?> >
			</div>
			<div>
				<p>
			      <label>
			        <input type="checkbox" name="billing[saveToAddressBook]" />
			        <span>Save to Address book</span>
			      </label>
			    </p>
			</div>
		</div>
		<?php if($billingAddress):?>
		<?php  $cartAddressId = $billingAddress->cartAddressId;?>
	
		<?php $addressId = $billingAddress->addressId;?>
		<?php $cartId = $cart->cartId;?>

		<button class="btn waves-effect waves-light bg-dark text-white"  type="button" onclick="mage.resetParams().setForm('#addressForm').setUrl('<?php echo $this->getUrl('Checkout','saveBillingAddress',['cartId'=>$cartId,'addressId'=>$addressId,'cartAddressId'=>$cartAddressId]); ?>').load();">Save
	                     </button>
     	<?php endif;?>
   
    
		<h4>Shipping Address Form</h4>

		<hr>
		<div>
			<p>
		      <label>
		        <input type="checkbox" name="sameAsBilling" />
		        <span>Same As Billing</span>
		      </label>
		    </p>
		</div>
		
		<div class="font-weight-bold form-row">
			<div class="form-group col-md-3">
				<input type="text" class="form-control" name="shipping[address]" id="address" placeholder="Address" <?php if($shippingAddress):?> value="<?php echo $shippingAddress->address?>" <?php endif;?> >
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control" name="shipping[city]" id="city" placeholder="City" <?php if($shippingAddress):?> value="<?php echo $shippingAddress->city?>" <?php endif;?> >
			</div>
		</div>
		<div class="font-weight-bold form-row">

			<div class="form-group col-md-3">
				<input type="text" class="form-control" name="shipping[state]" id="state" placeholder="State" <?php if($shippingAddress):?> value="<?php echo $shippingAddress->state?>" <?php endif;?>>
			</div>
			<div class="form-group col-md-3">
				<input type="number" class="form-control" name="shipping[zipcode]" id="city" placeholder="Zipcode" <?php if($shippingAddress):?> value="<?php echo $shippingAddress->zipcode?>" <?php endif;?>>
			</div>

		</div>
		<div class="font-weight-bold form-row">

			<div class="form-group col-md-3">
				<input type="text" class="form-control" name="shipping[country]" id="country" placeholder="Country" <?php if($shippingAddress):?> value="<?php echo $shippingAddress->country?>" <?php endif;?> >
			</div>
			<div>
				<p>
			      <label>
			        <input type="checkbox" name="shipping[saveToAddressBook]" />
			        <span>Save to Address book</span>
			      </label>
			    </p>
			</div>
		</div>
		<?php if($shippingAddress):?>
			<?php $cartAddressId = $shippingAddress->cartAddressId;?>
			
			<?php $addressId = $shippingAddress->addressId;?>
			<?php $cartId = $cart->cartId;?>

			<button class="btn waves-effect waves-light bg-dark text-white"  type="button" onclick="mage.resetParams().setForm('#addressForm').setUrl('<?php echo $this->getUrl('Checkout','saveShippingAddress',['cartId'=>$cartId,'addressId'=>$addressId,'cartAddressId'=>$cartAddressId]); ?>').load();">Save
		    </button>
        <?php endif;?>
  

	<h4>Payment Methods</h4>
	<?php foreach($paymentMethods->getData() as $key => $paymentMethod):?>
	 <p>
      <label>
        <input class="with-gap" name="paymentMethod" type="radio"  value="<?php echo $paymentMethod->paymentId?>" <?php echo $cartpaymentMethod->paymentId == $paymentMethod->paymentId ? "checked" : "" ?>/>
        <span><?php echo $paymentMethod->paymentName?></span>
      </label> 
    </p>
    <?php endforeach; ?>
    <button class="btn waves-effect waves-light bg-dark text-white"  type="button" onclick="mage.resetParams().setForm('#addressForm').setUrl('<?php echo $this->getUrl('Checkout','paymentMethod'); ?>').load();">Save
		    </button>


	<h4>Shipment Methods</h4>
	<?php foreach($shippingMethods->getData() as $key => $shippingMethod):?>
	 <p>
      <label>
      	
        <input class="with-gap" name="shippingMethod" type="radio" value="<?php echo $shippingMethod->shippingId?>" <?php echo $cartshippingMethod->shippingId == $shippingMethod->shippingId ? "checked" : "" ?> />
        <span><?php echo $shippingMethod->shippingName?></span>
      </label> 
      <label>
      	<?php echo $shippingMethod->shippingAmount?>
      </label>
    </p>
	<?php endforeach; ?>
	<button class="btn waves-effect waves-light bg-dark text-white"  type="button" onclick="mage.resetParams().setForm('#addressForm').setUrl('<?php echo $this->getUrl('Checkout','shippingMethod'); ?>').load();">Save
		    </button>
	<h4>Billing Details</h4>
	<div style="margin-right: 800px">
	<table class="table">
	<tr>
		<td>BASE TOTAL</td>
		<td><?php echo $this->getBaseTotal();?></td>
	</tr>
	<tr>
		<td>SHIPPING CHARGES</td>

		<td><?php echo $this->getShippingCharges();?></td>
	</tr>
	
	<tr>
		<td><strong>GRAND TOTAL</strong></td>
		<td><input type="hidden" name="grandTotal" value="<?php echo $this->getGrantTotal();?>"></td>
		<td><?php echo $this->getGrantTotal();?></td>
	</tr>
	
	</table>
	<button class="btn btn-dark" type="button" onclick="mage.resetParams().setForm('#addressForm').setUrl('<?php echo $this->getUrl('checkout','calculate',['id' => $cart->cartId]); ?>').load();">save</button><br>

<button class="btn btn-success" type="button" onclick="mage.resetParams().setForm('#addressForm').setUrl('<?php echo $this->getUrl('PlaceOrder','save',['id' => $cart->customerId]); ?>').load();">Place Order</button>
</form>





