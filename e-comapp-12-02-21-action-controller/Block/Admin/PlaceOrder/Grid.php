<?php

namespace Block\Admin\PlaceOrder;


\Mage::loadFileByClassName("Block\Core\Template");

class Grid extends \Block\Core\Template
{
    
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/placeorder/grid.php');
    }

       
    public function getPlaceOrder()
    {
       

            $order=\Mage::getModel('Model\placeOrder');
            $query="SELECT p.orderId,p.total,p.shippingAmount,p.total,c.customerId,c.firstName,c.lastName,c.email,c.contactNo,pay.paymentName,s.shippingName ,pa.address,pa.zipcode,pa.state,pa.country 
            FROM `placeorder` As p, 
            `customer` As c, 
            `payment` As pay, 
            `shipping` As s, 
            `placeorder_address` As pa 
            WHERE p.customerId = c.customerId 
                AND p.paymentId = pay.paymentId 
                AND p.shippingId = s.shippingId 
                AND p.orderId = pa.orderId";
            $orders=$order->fetchAll($query);
            
            
            return $orders;
    }




}


?>