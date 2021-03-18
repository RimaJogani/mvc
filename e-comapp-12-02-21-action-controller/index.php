<?php
//require_once './Controller/Core/Front.php';

class Mage{
	public static function init(){

		self::loadFileByClassName('Controller\Core\front');
		\Controller\Core\Front::init();
	}
	public static function getController($className)
	{
		self::loadFileByClassName($className);
		$className = str_replace('\\', ' ', $className);
		$className = ucwords($className);
		$className = str_replace(' ', '\\', $className);
		//echo $className.'<br>';
		return new $className;
	}
	public static function loadFileByClassName($className)
	{
		$className = str_replace('\\', ' ', $className);
		$className = ucwords($className);
		$className = str_replace(' ', '/', $className);
		$className = $className . '.php';
		//echo $className.'<br>';
		require_once($className);
	}

	

	public static function getModel($className)
	{
		return \Mage::getController($className);
	}

	public static function getBlock($className)
	{
		return \Mage::getController($className);
	}


}
Mage::init();

?>


