   <section>
       <div class="container pt-4 mx-auto">
              <div class="col-md-7 mx-auto col-lg-8 mt-4">
         
                <form class="needs-validation" id="paymentForm" method="POST" action="<?php echo $this->getUrl('payment','save');?>">
                   <?php echo $this->getTabContent();?>
                </form>
              </div>
       </div>
   </section>

   
    