<?php

namespace Controller\Admin\Product;
\Mage::loadFileByClassName("Controller\Core\Admin");

class ProductMedia extends \Controller\Core\Admin
{

    public function saveAction()
    {

        try 
        {
               
                $fileName = $_FILES['image']['name'];
                $fileTmp = $_FILES['image']['tmp_name'];
                $newName = rand(1000,9999)."-".$fileName;


                 move_uploaded_file($fileTmp, "./skin/admin/images/{$this->getRequest()->getGet('id')}".$newName);
                    
                        $productId = $this->getRequest()->getGet('id');
                        $productmedia = \Mage::getModel("Model\product\productmedia");
                        $productmedia->productId = $productId;
                        $productmedia->imageName = $newName;

                       if($productmedia->save())
						{
							$this->getMessage()->setSuccess('Image Upload  successfully.');
						}
                        else
                        {
							$this->getMessage()->setSuccess( $errors);
						}
                   
           
        } 
        catch (Exception $e) 
        {
            $this->getMessage()->setFailed($e->getMessage());
        }
      
        $this->redirect('form', 'product', null, false);
    }

	public function checkAction()
    {
        try 
        {

            if (!$this->getRequest()->getGet('id')) 
            {
                $this->redirect('gridHtml',null, null, true);
            }

            $imageData = $this->getRequest()->getPost('image');
           // print_r($imageData);
            if(!$imageData)
            {
                throw new Exception("No Product Found To Update Or Delete !!", 1);
            }

            $small = "";
            $thumb = "";
            $base = "";

            if (array_key_exists('small', $imageData)) 
            {
                $small = $imageData['small'];
                unset($imageData['small']);
            }
            if (array_key_exists('thumb', $imageData)) 
            {
                $thumb = $imageData['thumb'];
                unset($imageData['thumb']);
            }
            if (array_key_exists('base', $imageData)) 
            {
                $base = $imageData['base'];
                unset($imageData['base']);
            }
            

                foreach ($imageData as $key => $value) 
                {
                    if (array_key_exists('remove', $value)) 
                    {
                        unset($value['remove']);
                    }
                    if ($key == $base) 
                    {
                        $value['base'] = 1;
                    }
                    if ($key == $small) 
                    {
                        $value['small'] = 1;
                    }
                    if ($key == $thumb) 
                    {
                        $value['thumb'] = 1;
                    }
                    if (!array_key_exists('base', $value)) 
                    {
                        $value['base'] = 0;
                    }
                    if (!array_key_exists('small', $value)) 
                    {
                        $value['small'] = 0;
                    }
                }
                if(!array_key_exists('thumb', $value)) 
                {
                    $value['thumb'] = 0;
                }

                if (!array_key_exists('gallery', $value)) 
                {
                    $value['gallery'] = 0;
                }
                else 
                {
                    $value['gallery'] = 1;
                }
                echo 11;
                $values = array_values($value);
                $fields = array_keys($value);
                $final = null;

                for ($i = 0; $i < count($fields); $i++) 
                {
                    if ($fields[$i] == $key) 
                    {
                        $id = $values[$i];
                        continue;
                    }
                    $final = $final . "`" . $fields[$i] . "`='" . $values[$i] . "',";
                }

                $final = rtrim($final, ",");
                $query = "UPDATE `productmedia` SET {$final} WHERE `productmediaId` = '{$key}'";

                $upModel =\Mage::getModel('model\product\productmedia');
                if ($upModel->update($query))  
                {
                    $this->getMessage()->setSuccess("Product Images update For Product !!");
                }
                else
                {
                    $this->getMessage()->setSuccess("Unable To Update Product Image !!");
                }
                
              
        } 
        catch (Exception $e) 
        {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('form', 'product', null, false);
    }


    public function deleteAction()
    {
        try
        {


                $imageData = $this->getRequest()->getPost('image');
                $keys = [];
                foreach ($imageData as $key => $value) 
                {

                    if (array_key_exists('remove', $value)) 
                    {

                        $delModel = \Mage::getModel('model\product\productmedia');
                        $keys[] = $key;

                    }
                   
                }
                $query = "delete from productmedia where productMediaId IN (" . implode(',', $keys) . ")";
                
                $unlickQuery="select  * from productmedia where productMediaId IN (" . implode(',', $keys) . ")";
            
                $delModel = \Mage::getModel('model\product\productmedia');
                $selectData=$delModel->fetchAll($unlickQuery);
                foreach ($selectData->getData() as $key => $value) 
                {
                  
                    $imgName=$value->imageName;
                    unlink("./skin/admin/images/{$value->productId}" . $imgName);
                }
                 
                if($delModel->delete(null,$query))
                {
                   
                    $this->getMessage()->setSuccess("Product Images Delete For Product !!");
                }else{
                    
                    $this->getMessage()->setSuccess("Unable To Delete Product Image !!");
                }
        } 
        catch (Exception $e) 
        {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('form', 'product', null, false);

    }
	

}
?>