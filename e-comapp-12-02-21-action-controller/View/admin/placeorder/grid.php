<?php
$orders = $this->getPlaceOrder();
?>
<section>
       <div class="container pt-4">
       
            <div class="bg-light p-5 rounded">
              <h3>Order Details</h3>
              
              <a class="btn btn-md bg-dark text-white" onclick="mage.setUrl('<?php echo $this->getUrl('cart','gridHtml');?>').resetParams().load();" href="javascript:void(0)" role="button"> ADD Order</a>
            
            
              <table class="table table-success table-striped mt-4">
                <thead>
                  <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Customer Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact NO</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Sipping Method</th>
                    <th scope="col">total</th>
                    <th scope="col">address</th>
                    <th scope="col">State</th>
                    <th scope="col">Country</th>
                    <th scope="col">Zipcode</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php if(!$orders):?>
                     <tr>
                        <td colspan="3"> No records Found</td>
                    </tr>
                   	<?php else:?>
						<?php foreach($orders->getData() as $order):?>
		                  	<tr id="data">
			                  	<td><?php echo $order->orderId;?></td>
								<td><?php echo $order->customerId;?></td>
								<td><?php echo $order->firstName;?></td>
								<td><?php echo $order->email;?></td>
								<td><?php echo $order->contactNo;?></td>
								<td><?php echo $order->paymentName;?></td>
								<td><?php echo $order->shippingName;?></td>
								
								<td><?php echo $order->total;?></td>
								<td><?php echo $order->address;?></td>
								<td><?php echo $order->state;?></td>
								<td><?php echo $order->country;?></td>
								<td><?php echo $order->zipcode;?></td>
		            
		                  	</tr>
	                  <?php endforeach;?>
                   <?php endif;?>
                </tbody>
              </table>
            </div>
       </div>
   </section>

   