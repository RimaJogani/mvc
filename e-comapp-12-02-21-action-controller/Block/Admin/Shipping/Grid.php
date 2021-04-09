<?php
namespace Block\Admin\Shipping;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    
        public function prepareCollection()
        {
            $shipping=\Mage::getModel('model\shipping');
            $shippings=$shipping->fetchAll();
             
            $this->setCollections($shippings);

            return $this;

        }

        
        public function prepareColumns()
        {
            $this->addColumn('shippingId',[

                'field' => 'shippingId',
                'label' => 'Shipping Id',
                'type' => 'number'
            ]);
            $this->addColumn('name',[

                'field' => 'shippingName',
                'label' => 'Shipping Name',
                'type' => 'text'
            ]);

            $this->addColumn('code',[

                'field' => 'shippingCode',
                'label' => 'Code',
                'type' => 'text'
            ]);


            $this->addColumn('amount',[

                'field' => 'shippingAmount',
                'label' => 'Amount',
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

                'label' => 'Add Shipping',
                'method' => 'getAddnewUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);

            return $this;
        }


        public function getStatusUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Shipping','status',['id'=>$row->shippingId,'status'=>$row->status])}";
            }
            $url = $this->getUrl('Shipping','status',['id'=>$row->shippingId,'status'=>$row->status]); 
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getEditUrl($row, $ajax)
        {
          
            if (!$ajax) {
                return "{$this->getUrl('Shipping','form',['id'=>$row->shippingId])}";
            }
            $url = $this->getUrl('Shipping','form',['id'=>$row->shippingId]);
        return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getDeleteUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Shipping','delete', ['id' => $row->shippingId])}";
            }
            $url=$this->getUrl('Shipping','delete', ['id' => $row->shippingId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }
       
       

        public function getAddnewUrl($ajax)
        {
            $url= $this->getUrl('Shipping','form');
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getTitle()
        {
            return 'Manage Products';
        }

}



        

       

?>