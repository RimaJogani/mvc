<?php
namespace Block\Admin\Customer;

\Mage::getController("Block\Core\Template");
class Grid extends \Block\Core\Template{

        protected $template=null;
        protected $customers=[];
        
       

        public function __construct(){
            parent::__construct();
          $this->setTemplate('admin/customer/grid.php');
        }

       
        public function setCustomers($customers = null){
            if(!$customers){
                $customer=\Mage::getModel('Model\customer');

                $customers=$customer->fetchAll();
                // $customers=$customer->customerGroupId();

            }
            $this->customers=$customers;
            return $this;

        }
        public function getCustomers(){
            if(!$this->customers){
                $this->setCustomers();
            }
            return $this->customers;
        }
        public function getCustomerGrorpName($customerGroupId){

            $customerGroup=\Mage::getModel('Model\customerGroup');
            $data=$customerGroup->load($customerGroupId);
            return $data->customerGroupName;
        }

 public function customerData(){
          
              $customerob=\Mage::getModel('Model\customer');
            // print_r($customerob);
           // $query="SELECT

           //              `cg.customergroupName`,
           //             ` a.zipcode`,
           //              `c.firstName`,   
           //              `c.lastName`,
           //              `c.email`,
           //              `c.contactNo`,
           //              `c.status `


           //          FROM `customer` AS `c`
           //          JOIN `customergroup` as `cg`

           //          ON `c.customerGroupId`=`cg.customerGroupId`

           //          JOIN `customeraddress` as `a`

           //          ON `c.customerId`=`a.customerId` and `a.addressType`='billing' ";
              $query="SELECT customer.customerId,customer.createDate,customergroup.customerGroupName,customeraddress.zipcode,customer.firstName,customer.lastName,customer.email,customer.contactNo,customer.status FROM ((customer LEFT JOIN customergroup ON customer.customerGroupId = customergroup.customerGroupId) LEFT JOIN customeraddress ON customer.customerId = customeraddress.customerId AND customeraddress.addressType = 'Billing')";

            //   SELECT customer.customerId,customer.firstName,customer.lastName,customer.email,customer.status ,customer.createdDate, customer_group.name , customer_address.zipcode
            // FROM ((customer LEFT JOIN customer_group ON customer.groupId = customer_group.groupId)
            // LEFT JOIN customer_address ON customer.customerId = customer_address.customerId AND customer_address.addressType = 'billing')
             

              $cutomerData=$customerob->fetchAll($query);
             //print_r($cutomerData);die();
              return $cutomerData;
        }

       
}
?>