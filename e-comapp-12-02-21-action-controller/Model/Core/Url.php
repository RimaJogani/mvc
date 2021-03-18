<?php
namespace Model\Core;


class Url
{
    protected $request = null;
    public function __construct()
    {
        
    }
   
    public function getUrl($controllerName=null ,$actionName=null,$params=[],$resetparams=false)
    {
        $final=$_GET;
        if($resetparams)
        {
            $final=[];
        }
        
        if($controllerName==null )
        {
            $controllerName=$_GET['c'];
        }
        if($actionName==null)
        {
            $actionName=$_GET['a'];
        }

        $final['c']=$controllerName;
        $final['a']=$actionName;
        $final = array_merge($final,$params);
        $queryString=http_build_query($final);
        unset($final);
        
        return "http://localhost/new_cycr/e-comapp-12-02-21-action-controller/index.php?{$queryString}";
        exit();
    }

    public function baseUrl($subUrl = Null){
        $url="http://localhost/new_cycr/e-comapp-12-02-21-action-controller/";
        if($subUrl){
            $url.=$subUrl;
        }
        return $url;
    }


}

?>