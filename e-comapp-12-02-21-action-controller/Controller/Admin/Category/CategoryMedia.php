<?php

namespace Controller\Admin\Category;
\Mage::loadFileByClassName("Controller\Core\Admin");

class CategoryMedia extends \Controller\Core\Admin
{

    public function saveAction()
    {

        try 
        {
           
            $fileName = $_FILES['image']['name'];
            $fileTmp = $_FILES['image']['tmp_name'];
            $newName = rand(1000,9999)."-".$fileName;


            move_uploaded_file($fileTmp, "./skin/admin/images/category/{$this->getRequest()->getGet('id')}".$newName);
                
            $categoryId = $this->getRequest()->getGet('id');
            $categoryMedia = \Mage::getModel("Model\category\categorymedia");
            $categoryMedia->categoryId = $categoryId;
            $categoryMedia->imageName = $newName;

            if($categoryMedia->save())
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
      
        $this->redirect('form', 'category', null, false);
    }

	public function checkAction()
    {
        try 
        {
            
            
            $imageData = $this->getRequest()->getPost('image');
            // echo "<pre>";
            // print_r($imageData);
            // die();
            if(!$imageData)
            {
                throw new Exception("No Product Found To Update Or Delete !!", 1);
            }

            $icon = "";
            $base = "";
            if (array_key_exists('icon', $imageData)) 
            {
                $icon = $imageData['icon'];
                unset($imageData['icon']);
            }
            

            if (array_key_exists('base', $imageData)) 
            {
                $base = $imageData['base'];
                unset($imageData['base']);
            }
            
            //echo $icon." ".$banner." " .$base;
                foreach ($imageData as $key => &$value) 
                {   
                    print_r($key);
                    print_r($value);
                    if (array_key_exists('remove', $value)) 
                    {
                        unset($value['remove']);
                    }
                    if ($key == $base) 
                    {
                        $value['base'] = 1;
                    }
                    if ($key == $icon) 
                    {
                        $value['icon'] = 1;
                    }
                    
                    if (!array_key_exists('base', $value)) 
                    {
                        $value['base'] = 0;
                    }
                    if (!array_key_exists('icon', $value)) 
                    {
                        $value['icon'] = 0;
                    }
                    if (!array_key_exists('banner', $value)) 
                    {
                        $value['banner'] = 0;
                    }
                    else 
                    {
                        $value['banner'] = 1;
                    }
                    
                
                    $values = array_values($value);
                    $fields = array_keys($value);
                    print_r($values);
                    print_r($fields);
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
                    echo $query = "UPDATE `categorymedia` SET {$final} WHERE `categorymediaId` = '{$key}'";
                    
                    $upModel =\Mage::getModel('model\category\categorymedia');
                    if ($upModel->update($query))  
                    {
                        $this->getMessage()->setSuccess("Product Images update For Product !!");
                    }
                    else
                    {
                        $this->getMessage()->setSuccess("Unable To Update Product Image !!");
                    }
                }
              
        } 
        catch (Exception $e) 
        {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('form', 'category', null, false);
    }


    public function deleteAction()
    {
        try
        {

                echo "<pre>";
                $imageData = $this->getRequest()->getPost('image');
               // print_r($imageData);
                $keys = [];
                foreach ($imageData as $key => $value) 
                {

                    if (array_key_exists('remove', $value)) 
                    {

                        $delModel = \Mage::getModel('model\category\categorymedia');
                        $keys[] = $key;

                    }
                   
                }
                $query = "delete from categorymedia where categoryMediaId IN (" . implode(',', $keys) . ")";
                
                $unlickQuery="select  * from categorymedia where categoryMediaId IN (" . implode(',', $keys) . ")";
            
                $delModel = \Mage::getModel('model\category\categorymedia');
                $selectData=$delModel->fetchAll($unlickQuery);
                
                foreach ($selectData->getData() as $key => $value) 
                {
                    
                    echo $imgName=$value->imageName;

                    unlink("./skin/admin/images/category/{$value->categoryId}" . $imgName);
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
        $this->redirect('form', 'category', null, false);

    }
    public function statusAction()
    {
        try
        {
          
          $categoryMedia=\Mage::getModel('model\Category\categoryMedia');
          $categoryId = $this->getRequest()->getGet('categoryId');
          $categoryMedia->categoryMediaId=$this->getRequest()->getGet('id');

          $categoryMedia->status=$this->getRequest()->getGet('status');
          
          if($categoryMedia->status())
          {
              $this->getMessage()->setSuccess("status update Successfully.");
             
          }
          else
          {
              $this->getMessage()->setSuccess("Unable to status update.");
          }
          $this->redirect('form','Category',['tabs' => 'Media','id' => $categoryId]);
        

        }
        catch(Exception $e)
        {

          $this->getMessage()->setFailure($e->getMessage());
          $this->redirect('gridHtml',null,null,true);
        }
    }
	

}
?>