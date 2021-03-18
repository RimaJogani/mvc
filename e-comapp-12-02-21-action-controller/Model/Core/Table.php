<?php
namespace Model\Core;
class Table{

    protected $data=[];
	protected $adapter=null;
    protected $primaryKey = Null;
	protected $tableName =null;

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
		
		if(!array_key_exists($key,$this->data))
		{
			return null;
		}
		return $this->data[$key];

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
		
		if(array_key_exists($this->getPrimaryKey(),$this->getData()))
		{
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
			echo $query="insert into `{$this->getTableName()}` ({$keys}) values ({$values}) ";
			$id= $this->insert($query);
					
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
		$this->data=$row;
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
			$rowArray[]=$row->setData($value);
		}
		$collection = get_class($this).'\collection';
		
        $collection = \Mage::getModel($collection);

        $collection->setData($rowArray);
       
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