<?php
namespace Block\Admin\Customer;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    
        public function prepareCollection()
        {
           $customer=\Mage::getModel('Model\customer');
            
              $query="SELECT customer.customerId,customer.createDate,customergroup.customerGroupName,customeraddress.zipcode,customer.firstName,customer.lastName,customer.email,customer.contactNo,customer.status FROM ((customer LEFT JOIN customergroup ON customer.customerGroupId = customergroup.customerGroupId) LEFT JOIN customeraddress ON customer.customerId = customeraddress.customerId AND customeraddress.addressType = 'Billing')";

             

              $cutomers=$customer->fetchAll($query);
             
            $this->setCollections($cutomers);

            return $this;

        }

        
        public function prepareColumns()
        {
            $this->addColumn('customerId',[

                'field' => 'customerId',
                'label' => 'customer Id',
                'type' => 'number'
            ]);
            $this->addColumn('customerGroupName',[

                'field' => 'customerGroupName',
                'label' => 'customerGroupName',
                'type' => 'text'
            ]);
            $this->addColumn('zipcode',[

                'field' => 'zipcode',
                'label' => 'zipcode',
                'type' => 'number'
            ]);
            $this->addColumn('firstName',[

                'field' => 'firstName',
                'label' => 'firstName',
                'type' => 'text'
            ]);
            $this->addColumn('lastName',[

                'field' => 'lastName',
                'label' => 'lastName',
                'type' => 'text'
            ]);
            $this->addColumn('email',[

                'field' => 'email',
                'label' => 'email',
                'type' => 'text'
            ]);

            $this->addColumn('contactNo',[

                'field' => 'contactNo',
                'label' => 'contactNo',
                'type' => 'text'
            ]);
            $this->addColumn('status',[

                'field' => 'status',
                'label' => 'Status',
                'type' => 'number'
            ]);

            $this->addColumn('createdDate',[

                'field' => 'createDate',
                'label' => 'CreatedDate',
                'type' => 'number'
            ]);
            

            return $this;
            
        }
        
        public function prepareActions()
        {
           
            $this->addActions('edit',[

                'label' => 'Edit',
                'method' => 'getEditUrl',
                'class' => 'btn btn-warning',
                'ajax' => true
            ]);
             

             $this->addActions('delete',[

                'label' => 'Delete',
                'method' => 'getDeleteUrl',
                'class' => 'btn btn-danger',
                'ajax' => true
            ]);
              return $this;
            
        }
        

        
        public function prepareStatus()
        {
            $this->addStatus('1',[

                'label' => 'Enable',
                'method' => 'getStatusUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);
             $this->addStatus('0',[

                'label' => 'Disable',
                'method' => 'getStatusUrl',
                'class' => 'btn btn-danger',
                'ajax' => true
            ]);
             
              return $this;

            
        }
        
        
        public function prepareButtons()
        {
            $this->addButton('addnew',[

                'label' => 'Add customer',
                'method' => 'getAddnewUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);

            return $this;
        }


        public function getStatusUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Customer','status',['id'=>$row->customerId,'status'=>$row->status])}";
            }
            $url = $this->getUrl('Customer','status',['id'=>$row->customerId,'status'=>$row->status]); 
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getEditUrl($row, $ajax)
        {
          
            if (!$ajax) {
                return "{$this->getUrl('Customer','form',['id'=>$row->customerId])}";
            }
            $url = $this->getUrl('Customer','form',['id'=>$row->customerId]);
        return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getDeleteUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Customer','delete', ['id' => $row->customerId])}";
            }
            $url=$this->getUrl('Customer','delete', ['id' => $row->customerId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }
       
       

        public function getAddnewUrl($ajax)
        {
            $url= $this->getUrl('Customer','form');
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getTitle()
        {
            return 'Manage Products';
        }

}



        

       

?>