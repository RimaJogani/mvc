<?php
namespace Block\Core;

\Mage::getController("Block\Core\Template");
class Grid extends Template
{

        protected $collections=null;
        protected $columns=[];
        protected $actions=[];
        protected $status=[];
        protected $buttons=[];
        protected $filters=[];
        protected $filterButtons=[];
        public function __construct()
        {
           
            $this->setTemplate('./core/grid.php');
            
            $this->prepareColumns();
            $this->prepareActions();
            $this->prepareStatus();
            $this->prepareButtons();
            $this->prepareCollection();
            $this->prepareFilters();
            $this->prepareFilterButtons();
            
        }
       
        public function setCollections($collection)
        {

            $this->collections = $collection;

            return $this;

        }
        public function getCollections()
        {

            return $this->collections;
        }

        public function prepareCollection()
        {

            return $this;

        }

        public function getcolumns()
        {
        	//print_r($this->columns);
            return $this->columns;

        }
        public function addColumn($key,$column)
        {
            $this->columns[$key]=$column;

            return $this;
        }
        public function prepareColumns()
        {
            return $this;
            
        }
        public function addFilter($key,$value)
        {
            $this->filters[$key] = $value;
            return $this;
        }
        public function getFilters()
        {
            return $this->filters;
        }
        public function prepareFilters()
        {
            return $this;
        }
        public function addFilterButton($key,$value)
        {
            $this->filterButtons[$key] = $value;
            return $this;
        }
        public function getFilterButtons()
        {
            return $this->filterButtons;
        }
        public function prepareFilterButtons()
        {
            return $this;
        }
        public function getFileValue($row,$field)
        {
            return $row->$field;
        }
        public function getActions()
        {

            return $this->actions;

        }
        public function addActions($key,$value)
        {
            $this->actions[$key]=$value;

            return $this;
        }

        
        public function prepareActions()
        {
           return $this;

            
        }
        public function getStatus()
        {

            return $this->status;

        }
        public function addStatus($key,$value)
        {
            $this->status[$key]=$value;

            return $this;
        }

        
        public function prepareStatus()
        {
            return $this;

            
        }


        public function getMethodUrl($row, $methodName, $ajax = true)
        {

            return $this->$methodName($row, $ajax);
        }

        
        public function getButtons()
        {

            return $this->buttons;

        }
        public function addButton($key,$value)
        {
            $this->buttons[$key]=$value;
            return $this;
        }

        
        public function prepareButtons()
        {

            return $this;
            
        }

        public function getButtonUrl($methodName,$ajax = true)
        {
            return $this->$methodName($ajax);
        }

        

        public function getTitle()
        {
            return 'Manage Products';
        }

}



        

       

?>