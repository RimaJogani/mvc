<?php 
namespace Model\Admin;

\Mage::loadFileByClassName('Model\Admin\Session');
/**
 * 
 */
class Filter extends Session
{
	
	public function setFilters($filters)
	{
		$this->start();
		$this->setNamespace('filter');
		foreach ($filters as $key => $filter) {
			$_SESSION[$key] = $filter;
		}
		//print_r($_SESSION[$key]);
	}
	public function getFilter($key)
	{
		if(!array_key_exists($key,$_SESSION))
		{
			return null;
		}

		return $_SESSION[$key];
	}
}

?>