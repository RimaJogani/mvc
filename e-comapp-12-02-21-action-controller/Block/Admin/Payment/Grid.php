<?php
namespace Block\Admin\Payment;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    
        public function prepareCollection()
        {
            $payment=\Mage::getModel('Model\Payment');
            $payments=$payment->fetchAll();
            $this->setCollections($payments);
            return $this;

        }

        
        public function prepareColumns()
        {
            $this->addColumn('paymentId',[

                'field' => 'paymentId',
                'label' => 'payment Id',
                'type' => 'number'
            ]);
            $this->addColumn('paymentName',[

                'field' => 'paymentName',
                'label' => 'Payment Name',
                'type' => 'text'
            ]);

            $this->addColumn('paymentCode',[

                'field' => 'paymentCode',
                'label' => 'payment Code',
                'type' => 'number'
            ]);
            $this->addColumn('paymentAmount',[

                'field' => 'paymentAmount',
                'label' => 'Payment Amount',
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

                'label' => 'Add Payment',
                'method' => 'getAddnewUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);

            return $this;
        }


        public function getStatusUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Payment','status',['id'=>$row->paymentId,'status'=>$row->status])}";
            }
            $url = $this->getUrl('Payment','status',['id'=>$row->paymentId,'status'=>$row->status]); 
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getEditUrl($row, $ajax)
        {
          
            if (!$ajax) {
                return "{$this->getUrl('Payment','form',['id'=>$row->paymentId])}";
            }
            $url = $this->getUrl('Payment','form',['id'=>$row->paymentId]);
        return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getDeleteUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Payment','delete', ['id' => $row->paymentId])}";
            }
            $url=$this->getUrl('Payment','delete', ['id' => $row->paymentId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }
       
       

        public function getAddnewUrl($ajax)
        {
            $url= $this->getUrl('Payment','form');
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getTitle()
        {
            return 'Manage Products';
        }

}



        

       

?>