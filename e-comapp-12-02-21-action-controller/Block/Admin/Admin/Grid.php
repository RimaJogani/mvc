<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    
        public function prepareCollection()
        {

            $admin=\Mage::getModel('Model\admin');

            $filter=\Mage::getModel('Model\admin\filter');

            if($filterValue = $filter->getFilter('admin'))
            {
                $filterName = array_keys($filterValue);
                $values = array_values($filterValue);
                $projection = 'where';
                foreach ($filterName as $key => $value) {
                    
                    if($values[$key])
                    {
                        $projection .= "`$filterName[$key]` = '$values[$key]' AND";
                    }

                }
                if($projection == 'where')
                {   

                    $projection = '';
                }
                else
                {
                    $words = explode(" ",$projection);
                    array_splice($words, -1);
                    $projection = implode(" ",$words);

                }   
                echo $query = "select * from `{$admin->getTableName()}` $projection";die;
                $rows = $admin->fetchAll($query);
                $this->setCollections($rows);
            }
            else
            {
                $admins=$admin->fetchAll();
                $this->setCollections($admins);
                return $this;
            }

        }

        
        public function prepareColumns()
        {
            $this->addColumn('adminId',[

                'field' => 'adminId',
                'label' => 'Admin Id',
                'type' => 'number'
            ]);
            $this->addColumn('name',[

                'field' => 'adminName',
                'label' => 'Admin Name',
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

                'label' => 'Add Admin',
                'method' => 'getAddnewUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);

            return $this;
        }

        public function prepareFilters()
        {
            $filter = \Mage::getModel('model\Admin\filter');
            //print_r($filter);die();
            $values = $filter->getFilter('admin1');

            $this->addfilter('adminId',[

                'name'=>'filter[admin1][adminId]',
                'style'=>'width:75px',
                'value'=>$values['adminId'],
                'placeholder'=> 'Id',
                'class'=>'clear'

            ]);
            $this->addfilter('adminName',[

                'name'=>'filter[admin1][adminName]',
                'style'=>'width:75px',
                'value'=>$values['adminName'],
                'placeholder'=> 'Name',
                'class'=>'clear'

            ]);
            $this->addfilter('status',[

                'name'=>'filter[admin1][status]',
                'style'=>'width:75px',
                'value'=>$values['status'],
                'placeholder'=> 'Status',
                'class'=>'clear'

            ]);
        }

        public function prepareFilterButtons()
        {
            $this->addFilterButton('addnew',[

                'label' => 'Apply Filter',
                'class' => 'btn btn-outline-secondary',
                'ajax' => true
            ]);

            return $this;
        }


        public function getStatusUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('admin','status',['id'=>$row->adminId,'status'=>$row->status])}";
            }
            $url = $this->getUrl('admin','status',['id'=>$row->adminId,'status'=>$row->status]); 
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getEditUrl($row, $ajax)
        {
          
            if (!$ajax) {
                return "{$this->getUrl('admin','form',['id'=>$row->adminId])}";
            }
            $url = $this->getUrl('admin','form',['id'=>$row->adminId]);
        return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getDeleteUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('admin','delete', ['id' => $row->adminId])}";
            }
            $url=$this->getUrl('admin','delete', ['id' => $row->adminId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }
       
       

        public function getAddnewUrl($ajax)
        {
            $url= $this->getUrl('admin','form');
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getTitle()
        {
            return 'Manage Products';
        }

}



        

       

?>