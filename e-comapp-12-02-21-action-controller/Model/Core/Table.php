<?php
namespace Model\Core;
class Table{

    protected $data=[];
	protected $adapter=null;
    protected $primaryKey = Null;
	protected $tableName =null;
	protected $originalData = [];

    public function __construct()
    {
		
	}

    public function getPrimaryKey()
    {
		return $this->primaryKey;
	}
	public function setPrimaryKey($primaryKey)
	{
		$this->primaryKey=$primaryKey;
		return $this;
	}
	public function getTableName()
	{
		return $this->tableName;
	}
	public function setTableName($tableName)
	{
		$this->tableName=$tableName;
		return $this;
	}

	public function __set($key , $value)
	{

		$this->data[$key]=$value;
		return $this;

	}

	public function __get($key)
	{
		if(array_key_exists($key,$this->data))
		{
			return $this->data[$key];
		}
		if(array_key_exists($key,$this->originalData))
		{
			return $this->originalData[$key];
		}
			
		return null;

	}

	public function setOriginalData($originalData)
	{
		
		$this->originalData=$originalData;
		return $this;
	}

	public function getOriginalData()
	{
		return $this->originalData;
	}


	public function setData(array $data)
	{
		
		$this->data=array_merge($this->data,$data);
		return $this;
	}

	public function getData()
	{
		return $this->data;
	}

	public function resetData()
	{
		$this->data = [];
		return $this;
	}

	public function setAdapter()
	{
		$this->adapter=\Mage::getModel('Model\Core\Adapter');
		return $this;
	}

	public function getAdapter()
	{
		if(!$this->adapter)
		{
			$this->setAdapter();
		}
		return $this->adapter;
	}

	public function save()
	{
		/*echo '<pre>';
		print_r($this);die();*/
		$id = $this->{$this->getPrimaryKey()};

		if(array_key_exists($this->getPrimaryKey(),$this->getData()))
		{
			unset($this->data[$this->getPrimaryKey()]);
		}
		//$id = $this->{$this->getPrimaryKey()};
		//print_r($this->{$this->getPrimaryKey()});
		if(!$this->data)
		{
			return false;
		}
		 
		if($id)
		{
				//echo 'update';
	            $value= array_values($this->data);
	            $filed = array_keys($this->data);
	            $final = null;

	            for ($i=0; $i < count($filed); $i++) 
	            {
					if ($filed[$i] == $this->getPrimaryKey()) 
					{
						$id = $value[$i];
						continue;
					}
					$final = $final."`".$filed[$i]."`='".$value[$i]."',";
				}
				$final = rtrim($final,",");
		            
		       	$query ="UPDATE `{$this->getTableName()}` SET {$final} WHERE `{$this->getPrimaryKey()}` = '{$id}'";
		        return $this->update($query);
					
		}
		else
		{
			
			foreach($this->getData() as $key => $value)
			{
				$values[]="'".$value."'";
				$keys[]="`".$key."`";
			}
			
			$values=implode(',',$values);
			$keys=implode(',',$keys);
			$query="insert into `{$this->getTableName()}` ({$keys}) values ({$values}) ";
			$id = $this->insert($query);
			
						
		}
		$this->load($id);
		return $this;

		
	}
	public function insert($query)
	{
		$row=$this->getAdapter()->insert($query);
		if(!$row)
		{
			return false;
		}
		return $row;
	}

	
	public function update($query)
	{
		$row=$this->getAdapter()->update($query);
		if(!$row)
		{
			return false;
		}
		return $row;
	}

	public function load($id)
	{
		$query="select * from `{$this->getTableName()}` where `{$this->getPrimaryKey()}`=".$id;
	    return $this->fetchRow($query);
		
	}
	

	public function fetchRow($query)
	{
		$row=$this->getAdapter()->fetchRow($query);
		if(!$row)
		{
			return false;
		}
		$this->setOriginalData($row);
		$this->resetData();
		return $this;
	}

	public function delete($id=null,$query=null)
	{ 	
		if(!$query)
		{

		 	$query="delete from {$this->getTableName()} where {$this->getPrimaryKey()}='$id'";
		}
		return $this->getAdapter()->delete($query);
		
	}

	public function fetchAll($query = Null)
	{

		//echo $query;
		if(!$query)
		{
			 $query="select * from `{$this->getTableName()}`";
		}
		$rows= $this->getAdapter()->fetchAll($query);
		if(!$rows)
		{
			return false;
		}
		foreach($rows as $key => $value)
		{
			$row=new $this;
			$rowArray[]=$row->setOriginalData($value);
		}
		$collection = get_class($this).'\collection';
		
        $collection = \Mage::getModel($collection);
        //echo 11;
        
        $collection->setData($rowArray);
        //print_r($collection);
        unset($rowArray);

        return $collection;

	}

	public function status()
	{
		
		foreach($this->getData() as $key =>$value) 
		{
			$values[]=$value;
		}
		if($values[1] == '1')
		{
			$status=0;
		}
		else
		{
			$status=1;
		}
		$query="update `{$this->getTableName()}` set `status`={$status} where {$this->getPrimaryKey()}={$values[0]} ";
			
		return	$this->update($query);
	}		

}


?>