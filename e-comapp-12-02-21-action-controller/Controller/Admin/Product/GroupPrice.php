<?php
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\Core\Admin');
/**
 * 
 */
class GroupPrice extends \Controller\Core\Admin
{
	
	function __construct()
	{
		 parent::__construct();
	}


    public function saveAction()
    {
        try
        {   
                
            $groupData = $this->getRequest()->getPost('groupPrice');
            $productId = $this->getRequest()->getGet('id');
            foreach($groupData['exit'] as $groupId =>$price)
            {
                $grouppriceupdate=\Mage::getModel('Model\product\ProductGroupPrice');
                $query="UPDATE `product_group_price` SET `price`='{$price}' WHERE `customerGroupId`='{$groupId}' AND `productId`='{$productId}' ";
                
                if ($grouppriceupdate->update($query)) 
                {
                    $this->getMessage()->setSuccess("Group Price update For Product !!");
                }
                else
                {
                    $this->getMessage()->setSuccess("Unable To Update Group Price !!");
                }
            }
            foreach($groupData['new'] as $groupId =>$price)
            {
                $groupPrice=\Mage::getModel('Model\product\ProductGroupPrice');
                $groupPrice->customerGroupId=$groupId."<br>";
                $groupPrice->price=$price;
                $groupPrice->productId=$productId;
               
                if ($groupPrice->save()) 
                {

                    
                    $this->getMessage()->setSuccess("Group Price save For Product !!");
                }
                else
                {
                    
                    $this->getMessage()->setSuccess("Unable To save Group Price !!");
                }
            }
        }
        catch(Exception $e)
        {
                
                $this->getMessage()->setFailure($e->getMessage());
                $this->redirect('form','product',null,true);
        }
        $this->redirect('form', 'product', null, false);
    }

}
?>