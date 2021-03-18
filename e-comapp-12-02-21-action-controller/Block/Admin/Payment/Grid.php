<?php
namespace Block\Admin\Payment;

\Mage::getController("Block\Core\Template");
class Grid extends \Block\Core\Template{

        protected $template=null;
        protected $payments=[];
        protected $controller=null;

        public function __construct(){
            parent::__construct();
          $this->setTemplate('admin/payment/grid.php');
        }

       
        public function setPayments($payments = null){
            if(!$payments){
                $payment=\Mage::getModel('Model\Payment');
                $payments=$payment->fetchAll();


            }
            $this->payments=$payments;
            return $this;

        }
        public function getPayments(){
            if(!$this->payments){
                $this->setPayments();
            }
            return $this->payments;
        }

       
}
?>