<?php
namespace Block\Admin\CustomerGroup;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    
        public function prepareCollection()
        {
            $customerGroup=\Mage::getModel('Model\customer\CustomerGroup');
            $customerGroups=$customerGroup->fetchAll();
             
            $this->setCollections($customerGroups);

            return $this;

        }

        
        public function prepareColumns()
        {
            $this->addColumn('customerGroupId',[

                'field' => 'customerGroupId',
                'label' => 'CustomerGroup Id',
                'type' => 'number'
            ]);
            $this->addColumn('customerGroupName',[

                'field' => 'customerGroupName',
                'label' => 'CustomerGroup Name',
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

                'label' => 'Add CustomerGroup',
                'method' => 'getAddnewUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);

            return $this;
        }


        public function getStatusUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Customer\CustomerGroup','status',['id'=>$row->customerGroupId,'status'=>$row->status])}";
            }
            $url = $this->getUrl('Customer\CustomerGroup','status',['id'=>$row->customerGroupId,'status'=>$row->status]); 
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getEditUrl($row, $ajax)
        {
          
            if (!$ajax) {
                return "{$this->getUrl('Customer\CustomerGroup','form',['id'=>$row->customerGroupId])}";
            }
            $url = $this->getUrl('Customer\CustomerGroup','form',['id'=>$row->customerGroupId]);
        return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getDeleteUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Customer\CustomerGroup','delete', ['id' => $row->customerGroupId])}";
            }
            $url=$this->getUrl('Customer\CustomerGroup','delete', ['id' => $row->customerGroupId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }
       
       

        public function getAddnewUrl($ajax)
        {
            $url= $this->getUrl('Customer\CustomerGroup','form');
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getTitle()
        {
            return 'Manage Products';
        }

}



        

       

?>