<?php
namespace Controller\Admin\Customer;
\Mage::loadFileByClassName("Controller\Core\Admin");

class CustomerAddress extends \Controller\Core\Admin
{
    
    
    public function __construct()
    {
      parent::__construct();
    }

    public function saveAddressAction()
    {

          try
          {
              if(!$this->getRequest()->isPost())
              {
                throw new Exception("invalid Request.");
              }
             
              $billing=\Mage::getModel('model\customer\address');
              $shipping=\Mage::getModel('model\customer\address');
              
            
              
              $billingData=$this->getRequest()->getPost('billing');
              $billing->customerId=$this->getRequest()->getGet('id');
              $billing->addressType='billing';
              $billing->setData($billingData);
              if($billing->save())
              {
                  $this->getMessage()->setSuccess('record save successfully.');
              }
              else
              {
               
                $this->getMessage()->setSuccess('unable to save record');
              }
              $shippingData=$this->getRequest()->getPost('shipping');
              $shipping->customerId=$this->getRequest()->getGet('id');
              $shipping->addressType='shipping';
              $shipping->setData($shippingData);
             if($shipping->save())
             {
                $this->getMessage()->setSuccess('record save successfully.');
             }
             else
             {
                $this->getMessage()->setSuccess('unable to save record');
             }
            $this->redirect("gridHtml","customer",null,true);
                
           
          }
          catch(Exception $e)
          {
             
              $this->getMessage()->setFailure($e->getMessage());
              $this->redirect('gridHtml',"customer",null,true);
          }
         
  }
    

}

?>