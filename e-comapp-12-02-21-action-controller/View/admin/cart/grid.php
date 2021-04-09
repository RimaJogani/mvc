<?php
//echo '<pre>';
//print_r($this);die();
$cart = $this->getCart();

$cartItems = $this->getCart()->getItems();
$customers = $this->getCart()->getCustomers();




?>

<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Cart Details</h3>
              
              <?php /*<a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('category','form');?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD CATEGORY</a> */?>
           
            	<button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#cartForm').load();" name="update">Update
                </button>
                <form method="Post" action="<?php echo $this->getUrl('cart','selectCustomer'); ?>" id="customerForm">
                <div class="form-check form-switch col-sm-4 mt-5">
                    <div class="switch">
               			<select name="customer" class="form-control" >
                        
                        <?php if($customers):?>
                          <?php foreach($customers->getData() as $key => $customer):?>
                              <option value="<?php echo $customer->customerId?>" <?php if($cart->customerId == $customer->customerId){echo "selected";} ?>><?php echo $customer->firstName; ?></option>
                          <?php endforeach;?>
                        <?php endif;?>
               			</select>
           			</div>
       			</div>
       			<button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.resetParams().setForm('#customerForm').load();" name="go">Go
                </button>
                </form>
                <form method="Post" action="<?php echo $this->getUrl('cart','update'); ?>" id="cartForm">
              <table class="table table-success table-striped mt-4">
                <thead>
                  <tr>
                    <th scope="col">Cart Id</th>
                    <th scope="col">Product Id</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Row Total</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Final Total</th>
                    <th scope="col" colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!$cartItems): ?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                    <?php else: foreach($cartItems->getData() As $key => $item) :?>
                  <tr id="data">
                  		<td><?php echo $item->cartId ?></td>
                  		<td><?php echo $item->productId ?></td>
                		<td><input type="number" name="quantity[<?php echo $item->cartItemId ?>]" value="<?php echo $item->quantity?>"></td>
            			<td><?php echo $item->price ?></td>
               			<td><?php echo $item->price * $item->quantity ?></td>
               			<td><?php echo $item->discount * $item->quantity ?></td>
               			<td><?php echo $item->quantity * $item->price - ($item->discount * $item->quantity) ?></td>
	               		<td><button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.setUrl('<?php echo $this->getUrl('cart','delete',['id'=>$item->cartItemId])?>').resetParams().load();" name="delete">delete
                   
                     </button></td>
            
                  </tr>
                  <?php endforeach;?>
                   <?php endif;?>
                </tbody>
              </table>
             </form>
             <button class="btn waves-effect waves-light bg-dark text-white" type="button" onclick="mage.setUrl('<?php echo $this->getUrl('checkout','form',['id'=>$cart->customerId])?>').resetParams().load();" >checkOut
                   
                     </button></td>
            </div>
       </div>
   </section>
 