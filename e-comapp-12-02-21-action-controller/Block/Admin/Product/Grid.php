<?php
namespace Block\Admin\Product;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{
    
        public function prepareCollection()
        {
            $product=\Mage::getModel('Model\Product');
            $query="select p.*,b.brandName 
                    from `product` As p, `brand` As b
                    where p.brandId = b.brandId";
            $products=$product->fetchAll($query);
             
            $this->setCollections($products);

            return $this;

        }

        
        public function prepareColumns()
        {
            $this->addColumn('productId',[

                'field' => 'productId',
                'label' => 'Product Id',
                'type' => 'number'
            ]);
            $this->addColumn('brandName',[

                'field' => 'brandName',
                'label' => 'Brand Name',
                'type' => 'text'
            ]);
            $this->addColumn('name',[

                'field' => 'productName',
                'label' => 'Product Name',
                'type' => 'text'
            ]);

            $this->addColumn('price',[

                'field' => 'productPrice',
                'label' => 'Price',
                'type' => 'decimal'
            ]);


            $this->addColumn('discount',[

                'field' => 'productDiscount',
                'label' => 'Discount',
                'type' => 'number'
            ]);

            $this->addColumn('Quantity',[

                'field' => 'productQty',
                'label' => 'Quantity',
                'type' => 'number'
            ]);
            $this->addColumn('status',[

                'field' => 'status',
                'label' => 'Status',
                'type' => 'number'
            ]);

            $this->addColumn('createdDate',[

                'field' => 'createDate',
                'label' => 'CreatedDate',
                'type' => 'number'
            ]);

            return $this;
            
        }
        
        public function prepareActions()
        {
           
            $this->addActions('edit',[

                'label' => 'Edit',
                'method' => 'getEditUrl',
                'class' => 'btn btn-warning',
                'ajax' => true
            ]);
             

             $this->addActions('delete',[

                'label' => 'Delete',
                'method' => 'getDeleteUrl',
                'class' => 'btn btn-danger',
                'ajax' => true
            ]);

             $this->addActions('addtocart',[

                'label' => 'Add To Cart',
                'method' => 'getAddItemToCartUrl',
                'class' => 'btn btn-primary',
                'ajax' => true
            ]);
              return $this;
            
        }
        

        
        public function prepareStatus()
        {
            $this->addStatus('1',[

                'label' => 'Enable',
                'method' => 'getStatusUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);
             $this->addStatus('0',[

                'label' => 'Disable',
                'method' => 'getStatusUrl',
                'class' => 'btn btn-danger',
                'ajax' => true
            ]);
             
              return $this;

            
        }
        
        
        public function prepareButtons()
        {
            $this->addButton('addnew',[

                'label' => 'Add Product',
                'method' => 'getAddnewUrl',
                'class' => 'btn btn-success',
                'ajax' => true
            ]);

            return $this;
        }


        public function getStatusUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('product','status',['id'=>$row->productId,'status'=>$row->status])}";
            }
            $url = $this->getUrl('product','status',['id'=>$row->productId,'status'=>$row->status]); 
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getEditUrl($row, $ajax)
        {
          
            if (!$ajax) {
                return "{$this->getUrl('product','form',['id'=>$row->productId])}";
            }
            $url = $this->getUrl('product','form',['id'=>$row->productId]);
        return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getDeleteUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('product','delete', ['id' => $row->productId])}";
            }
            $url=$this->getUrl('product','delete', ['id' => $row->productId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }
       
       

        public function getAddnewUrl($ajax)
        {
            $url= $this->getUrl('product','form');
            return "mage.setUrl('{$url}').resetParams().load()";
        }

        public function getTitle()
        {
            return 'Manage Products';
        }

        public function getAddItemToCartUrl($row, $ajax)
        {
            if (!$ajax) {
                return "{$this->getUrl('cart','addToCart', ['id' => $row->productId])}";
            }
            $url=$this->getUrl('cart','addToCart', ['id' => $row->productId]);
            return "mage.setUrl('{$url}').resetParams().load()";
        }

}



        

       

?>