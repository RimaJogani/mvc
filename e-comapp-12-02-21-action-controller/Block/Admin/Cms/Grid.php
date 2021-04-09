<?php
namespace Block\Admin\Cms;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    
        public function prepareCollection()
        {
            $cmsModel=\Mage::getModel('Model\Cms');
            $cmss=$cmsModel->fetchAll();
             
            $this->setCollections($cmss);

            return $this;

        }

        
        public function prepareColumns()
        {
            $this->addColumn('pageId',[

                'field' => 'pageId',
                'label' => 'Page Id',
                'type' => 'number'
            ]);
            $this->addColumn('title',[

                'field' => 'title',
                'label' => 'title',
                'type' => 'text'
            ]);

            $this->addColumn('identifier',[

                'field' => 'identifier',
                'label' => 'Identifier',
                'type' => 'number'
            ]);
            $this->addColumn('content',[

                'field' => 'content',
                'label' => 'Content',
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

                'label' => 'Add Cms',
                'method' => 'getAddnewUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);

            return $this;
        }


        public function getStatusUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Cms','status',['id'=>$row->pageId,'status'=>$row->status])}";
            }
            $url = $this->getUrl('Cms','status',['id'=>$row->pageId,'status'=>$row->status]); 
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getEditUrl($row, $ajax)
        {
          
            if (!$ajax) {
                return "{$this->getUrl('Cms','form',['id'=>$row->pageId])}";
            }
            $url = $this->getUrl('Cms','form',['id'=>$row->pageId]);
        return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getDeleteUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('Cms','delete', ['id' => $row->pageId])}";
            }
            $url=$this->getUrl('Cms','delete', ['id' => $row->pageId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }
       
       

        public function getAddnewUrl($ajax)
        {
            $url= $this->getUrl('Cms','form');
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getTitle()
        {
            return 'Manage Products';
        }

}



        

       

?>