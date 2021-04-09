<?php

namespace Controller\Core;
\Mage::loadFileByClassName('controller\core\Abstracts');
class Admin extends Abstracts
{

   
        protected $layout = null;
        protected $message = null;

   
        public function setLayout(\Block\Core\layout $layout = null)    
        {
            if (!$layout) 
            {

                $layout = \Mage::getBlock('block\admin\layout');
               
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
       
        public function getMessage()
        {
            if (!$this->message) 
            {
                $this->setMessage();
            }
            return $this->message;
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
       



        
}


?>