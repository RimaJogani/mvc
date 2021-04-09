<?php
namespace Block\Admin\ConfigGroup;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    
        public function prepareCollection()
        {
            $configGroup=\Mage::getModel('Model\configGroup');
            $configGroups=$configGroup->fetchAll();
            $this->setCollections($configGroups);
            return $this;

        }

        
        public function prepareColumns()
        {
            $this->addColumn('groupId',[

                'field' => 'groupId',
                'label' => 'Group Id',
                'type' => 'number'
            ]);
            


            $this->addColumn('name',[

                'field' => 'name',
                'label' => 'Name',
                'type' => 'text'
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
        

       
        
        public function prepareButtons()
        {
            $this->addButton('addnew',[

                'label' => 'Add configGroup',
                'method' => 'getAddnewUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);

            return $this;
        }



        public function getEditUrl($row, $ajax)
        {
          
            if (!$ajax) {
                return "{$this->getUrl('ConfigGroup','form',['id'=>$row->groupId])}";
            }
            $url = $this->getUrl('ConfigGroup','form',['id'=>$row->groupId]);
        return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getDeleteUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('ConfigGroup','delete', ['id' => $row->groupId])}";
            }
            $url=$this->getUrl('ConfigGroup','delete', ['id' => $row->groupId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }
       
       

        public function getAddnewUrl($ajax)
        {
            $url= $this->getUrl('ConfigGroup','form');
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getTitle()
        {
            return 'Manage Products';
        }

}



        

       

?>