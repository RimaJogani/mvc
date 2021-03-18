<?php
namespace Block\core;
class Template{

        protected $template=null;
      
        protected $message;
        protected $children=[];
        protected $request = null;

        public function __construct(){
       
           
        }

        public function setTemplate($template)
        {
        // echo 111;
        $this->template="View/".$template;
        return $this;

        }
        public function getTemplate(){

            // echo 222;
            // print_r($this->template);
            return $this->template;
        }
       
        public function toHtml()
        {
           
            ob_start();
            // $abc = $this->getTemplate();
            require_once $this->getTemplate();
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
       

       

        public function setRequest()
        {
           $this->request = \Mage::getModel('model\core\request');
           return $this;
        }
        public function getRequest()
        {
            if (!$this->request) {
                $this->setRequest();
            }
           return $this->request;
        }
        
        public function getUrl($controllarName=null, $actionName=null, $prams=[], $resetparam = false)
        {   
            $url = \Mage::getModel('model\core\url');
            return $url->getUrl($controllarName,$actionName,$prams,$resetparam);
        }
        
        public function baseUrl($subUrl = null){
             $url = \Mage::getModel('model\core\url');
            return $url->baseUrl($subUrl);

        }
        public function setChildren($children = null)
        {
            $this->children = $children;
            return $this;
        }
        public function getChildren()
        {
            return $this->children;
        }
    
        public function addChild(\Block\core\Template $child, $key=null)
        {
            
            if (!$key) 
            {
               
                $key = get_class($child);
            }
            //print_r($this->children[$key] = $child);
             $this->children[$key] = $child;
             return $this;
             
        }
        public function getChild($key)
        {
            if (!array_key_exists($key,$this->children)) 
            {
                return null;
            }
            return $this->children[$key];
        }
        public function removeChild($key)
        {
            if (!array_key_exists($key,$this->children)) 
            {
               return null;
            }
            unset($this->children[$key]);
            return $this;
        }
        public function setMessage(\Model\Admin\Message $message = null)
        {
            if (!$message) 
            {
                $message = \Mage::getModel('Model\admin\message');
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
        public function createBlock($classname)
        {   
            return \Mage::getBlock($classname);
        }
    
}
?>