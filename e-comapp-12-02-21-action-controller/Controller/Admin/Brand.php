<?php
namespace Controller\Admin;

\Mage::loadFileByClassName("Controller\Core\Admin");




class  Brand extends \Controller\Core\Admin
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function gridHtmlAction()
    {
        try
        {
            $grid = \Mage::getBLock('block\Admin\brand\grid')->toHtml();
            $response=[
              
              'element'=>[
              [
                'selector'=>'#ContentGrid',
                'html'=>$grid

              ]
            ]

            ];
            header("content-type: application/json");
            echo json_encode($response);   
        }
        catch(Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect("gridHtml",null,null,true);
        }

    }
    public function saveAction()
    {

        try 
        {
           
            $fileName = $_FILES['image']['name'];
            $fileTmp = $_FILES['image']['tmp_name'];
            $newName = rand(1000,9999)."-".$fileName;


            move_uploaded_file($fileTmp, "./skin/admin/images/brand/".$newName);
                
            
            $brand = \Mage::getModel("Model\brand");
            
            $brand->brandImage = $newName;
            $brand->sortOrder = 0;
            $brand->status = 0;
            $brand->createDate = date("Y-m-d H:i:s");
            if($brand->save())
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
      
        $this->redirect('gridHtml', 'brand', null, false);
    }

    public function statusAction()
    {
        try
        {
          
          $brand=\Mage::getModel('model\brand');
          $brand->brandId=$this->getRequest()->getGet('id');
          $brand->status=$this->getRequest()->getGet('status');
          
          if($brand->status())
          {
              $this->getMessage()->setSuccess("status update Successfully.");
             
          }
          else
          {
              $this->getMessage()->setSuccess("Unable to status update.");
          }
          $this->redirect("gridHtml",null,null,true);
        

        }
        catch(Exception $e)
        {

          $this->getMessage()->setFailure($e->getMessage());
          $this->redirect('gridHtml',null,null,true);
        }
    }
    public function checkAction()
    {
        try 
        {
            $imageData = $this->getRequest()->getPost('image');
           // print_r($imageData);die();
            if(!$imageData)
            {
                throw new Exception("No Product Found To Update Or Delete !!", 1);
            }

                foreach ($imageData as $key => $value) 
                {
                    if (array_key_exists('remove', $value)) 
                    {
                        unset($value['remove']);
                    }
                    $values = array_values($value);
                    $fields = array_keys($value);
                    $final = null;
                    print_r($values);
                    print_r($fields);
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
                    $query = "UPDATE `brand` SET {$final} WHERE `brandId` = '{$key}'";
                    $upModel =\Mage::getModel('model\brand');
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
        $this->redirect('gridHtml','brand', null, false);
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

                        $delModel = \Mage::getModel('model\brand');
                        $keys[] = $key;

                    }
                   
                }
                $query = "delete from brand where brandId IN (" . implode(',', $keys) . ")";
                
               echo $unlickQuery="select  * from brand where brandId IN (" . implode(',', $keys) . ")";
            
                $delModel = \Mage::getModel('model\brand');
                $selectData=$delModel->fetchAll($unlickQuery);
                print_r($selectData);
                foreach ($selectData->getData() as $key => $value) 
                {
                  
                    echo $imgName=$value->brandImage;
                    unlink("./skin/admin/images/brand/" . $imgName);
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
        $this->redirect('gridHtml', null, null, false);

    }


}

?>