<?php

namespace  Model\Core;
class Adapter{

	private $config=[
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'onlineapp'

		];
	private $connect=null;
	public function __construct()
	{
		$this->connection();
	}

	public function connection() 
	{
		$connection = new \mysqli($this->config['host'],$this->config['username'],$this->config['password'],$this->config['database']);
		$this->setConnect($connection);
	}

	//function for set connection
	public function setConnect(\mysqli $conn = null)
	{

		$this->connect = $conn;
		return $this;
	}

	//function for get connection variable
	public function getConnect() 
	{
		if(!$this->connect)
		{
			$this->setConnect();

		}
		return $this->connect;
	}

	public function isConnected()
	{
			if(!$this->getConnect())
			{
				
				return false;
			}
			return true;
	}

	public function fetchAll($query)
	{
			
			if(!$this->isConnected())
			{
				 $this->getConnection();

			}
			$result = $this->getConnect()->query($query);
			$rows = $result->fetch_all(MYSQLI_ASSOC);
			return $rows;
	}

	public function fetchRow($query)
    {
		
        if(!$this->isConnected())
        {
            $this->getConnection();
        }
			//echo $query;
        	$result = $this->getConnect()->query($query);
        	//print_r($result);
			if($result->num_rows>0)
			{
				
				return $result->fetch_assoc();
			}
    }
    
    public function fetchPair($query)
    {
    	if (!$this->isConnected()) 
    	{
            $this->connection();
        }

        $result= $this->getConnect()->query($query);
        $rows = $result->fetch_all();
        $column1=array_column($rows,0);
        $column2=array_column($rows,1);
        return array_combine($column1, $column2);

    }

	public function insert($query)
	{

		if (!$this->isConnected())
		{
            $this->connection();
        }
		
			$result = $this->getConnect()->query($query);
			if ($result) 
			{
				return $this->getConnect()->insert_id;	
			}
			return $result;
	}
	public function update($query)
    {
		
		if (!$this->isConnected())
		{
            $this->connection();
        }
		//echo $query;
		if(!$this->getConnect()->query($query))
		{
			
            return false;
        }
		return true;
    }

	public function delete($query)
    {
		if (!$this->isConnected())
		{
            $this->connection();
        }
		
		  if(!$this->getConnect()->query($query))
		{
			
            return false;
        }
		return true;
    }

    public function query($query)
    {
    	return $this->getConnect()->query($query);
    }



}


?>