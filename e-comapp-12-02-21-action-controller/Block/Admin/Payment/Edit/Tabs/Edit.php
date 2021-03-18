<?php
namespace Block\Admin\Payment\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Template');

/**
 * 
 */
class Edit extends \Block\Core\Template
{
	   protected $payment=null;
	
	function __construct()
	{
		$this->setTemplate('admin/payment/edit/tabs/edit.php');
	}

	 public function setPayment($payment = null){
            if($payment){
                $this->payment=$payment;
                return $this;
            }
            
            $payment=\Mage::getModel('Model\payment');
                if($id = $this->getRequest()->getGet('id')){
                    $payment=$payment->load($id);
                   
                }
                $this->payment=$payment;
               // print_r($payment);
            return $this;

        }
        public function getPayment(){
            if(!$this->payment){
                $this->setPayment();
            }
            return $this->payment;
        }


}
?>