<?php
namespace Controller\Core;

class Front{

		public static function init(){
			
				$request=\Mage::getController('Model\Core\Request');
				$controllerName=$request->getControllerName();
				$actionName=$request->getActionName()."Action";
				
				$controllerClassName=self::prepareClassName('Controller\Admin',$controllerName);
				
				$controller=\Mage::getController($controllerClassName);
				
				$controller->$actionName();
				
				
				
		}
		public static function prepareClassName($key,$namespace){

		$className = $key.' '.$namespace;
		$className = str_replace('_', ' ', $className);
		$className = ucwords($className);
		$className = str_replace(' ', '\\', $className);
		//echo $className;
		return $className;
	}
}


?>