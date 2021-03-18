<?php

namespace Controller\Core;
class Admin{

    protected $request = null;
    protected $layout = null;
    protected $message = null;

            public function __construct(){

                $this->setRequest();
                
            }
        public function setRequest(){

            $this->request=\Mage::getController('Model\Core\Request');
            return $this;

        }
        public function getRequest(){
            return $this->request;

        }
        public function setLayout(\Block\Core\Template $layout = null)    
        {
            if (!$layout) 
            {

                $layout = \Mage::getBlock('block\core\layout');
               
            }
            $this->layout = $layout;
           
            return $this;
        }
        public function getLayout()
        {
            if (!$this->layout) 
            {
                $this->setLayout();    
            }
            return $this->layout;
        }
        public function randerLayout()
        {      
            echo $this->getLayout()->toHtml();
        }

        public function setMessage(Model\Admin\Message $message = null)
        {
            if (!$message) 
            {
                $message =\Mage::getModel('Model\admin\message');
            }
            $this->message = $message;
            return $this;
        }
        public function getMessage()
        {
            if (!$this->message) 
            {
                $this->setMessage();
            }
            return $this->message;
        }



        public function redirect($actionName = NULL,$controllerName = NULL,$params =NULL ,$resetParams=false){ 
           
            header("location:".$this->getUrl($actionName,$controllerName,$params,$resetParams));
            exit();
        }

        public function getUrl($actionName = NULL,$controllerName = NULL, $params=NULL,$resetParams=false){ 

            $final=$_GET;
            if($resetParams){
                $final=[];
            }

            if($actionName == NULL){
                $actionName=$_GET['a'];
            }
            if($controllerName == NULL){
                $controllerName=$_GET['c'];

            }

            $final['c']=$controllerName;
            $final['a']=$actionName;
            if(is_array($params)){
                $final=array_merge($final,$params);
            }
           
            $queryString=http_build_query($final);
           
            unset($final);

            return "http://localhost/new_cycr/e-comapp-12-02-21-action-controller/index.php?{$queryString}";
        }
}


?>