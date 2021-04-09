<?php
namespace Block\Admin\Attribute;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    
        public function prepareCollection()
        {
            $attribute=\Mage::getModel('Model\attribute');
            $attributes=$attribute->fetchAll();
            $this->setCollections($attributes);
            return $this;

        }

        
        public function prepareColumns()
        {
            $this->addColumn('attributeId',[

                'field' => 'attributeId',
                'label' => 'attribute Id',
                'type' => 'number'
            ]);
            $this->addColumn('entityTypeId',[

                'field' => 'entityTypeId',
                'label' => 'EntityType Id',
                'type' => 'text'
            ]);


            $this->addColumn('name',[

                'field' => 'name',
                'label' => 'Name',
                'type' => 'text'
            ]);
            
            $this->addColumn('code',[

                'field' => 'code',
                'label' => 'Code',
                'type' => 'text'
            ]);
             $this->addColumn('inputType',[

                'field' => 'inputType',
                'label' => 'Input Type',
                'type' => 'text'
            ]);
             $this->addColumn('backendType',[

                'field' => 'backendType',
                'label' => 'backend Type',
                'type' => 'text'
            ]);

             $this->addColumn('sortOrder',[

                'field' => 'sortOrder',
                'label' => 'Sort Order',
                'type' => 'text'
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

                'label' => 'Add Attribute',
                'method' => 'getAddnewUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);

            return $this;
        }



        public function getEditUrl($row, $ajax)
        {
          
            if (!$ajax) {
                return "{$this->getUrl('attribute','form',['id'=>$row->attributeId])}";
            }
            $url = $this->getUrl('attribute','form',['id'=>$row->attributeId]);
        return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getDeleteUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('attribute','delete', ['id' => $row->attributeId])}";
            }
            $url=$this->getUrl('attribute','delete', ['id' => $row->attributeId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }
       
       

        public function getAddnewUrl($ajax)
        {
            $url= $this->getUrl('attribute','form');
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getTitle()
        {
            return 'Manage Products';
        }

}



        

       

?>