<?php

namespace Block\Admin\Cart;


\Mage::loadFileByClassName("Block\Core\Template");

class Grid extends \Block\Core\Template
{
    
    protected $cart = null;
    protected $items = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/cart/grid.php');
    }

       
    public function setCart(\Model\Cart $cart)
    {
       
        $this->cart=$cart;
        return $this;

    }
    public function getCart()
    {
        if(!$this->cart)
        {
            throw new \Exception("Cart is not set");
            
        }
        return $this->cart;
    }

    /*public function getItems()
    {
        if($this->items)
        {
            return \Mage::getModel('model\Cart')->getItems();
        }
    }*/


}


?>