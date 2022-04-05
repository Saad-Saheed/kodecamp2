<?php
namespace App\Http\Request;
use App\Http\Request\Request;

class Router{
    private $request;
    private $supportedHttpMethods = [
        'GET',
        'POST'
    ];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function __call($name, $args)
    {
        list($route, $action) = $args;

        if(!in_array(strtoupper($name), $this->supportedHttpMethods)){
            $this->invalidMethodHandler();
        }

        // if callback function is passed
       if(is_callable($action)){
            $this->{strtolower($name)}[$this->formatRoute($route)] = $action;
        }

        // if controller and method is passed
        if(is_string($action)){

            $actionArr = explode('@', $action);
            $controllerString = "App\\Http\\Controllers\\{$actionArr[0]}";
            $controller = new $controllerString();
            $method = $controller->{$actionArr[1]}();

            $this->{strtolower($name)}[$this->formatRoute($route)] = function ($request) use ($method)
            {
                return $method;
            };
        }
    }

    public function formatRoute($route)
    {
        $result = rtrim($route, '/');
        return $result === '' ? '/' : $result;
    }

    private function invalidMethodHandler()
    {
       die("<h3 align='center'>{$this->request->serverProtocol}: 405 Method Not Allowed</h3>");
    }

    private function defaultRequestHandler()
    {
        die("<h3 align='center'>{$this->request->serverProtocol}: 404 Not Found</h3>");
    }

    public function resolve()
    {
        $methodDictionary = $this->{strtolower($this->request->requestMethod)} ?? [];
        $formatedRoute = $this->formatRoute($this->request->requestUri);
        $method =null;

        if(array_key_exists($formatedRoute, $methodDictionary)){
            $method = $methodDictionary[$formatedRoute];  
            echo call_user_func_array($method, array($this->request));          
        }elseif(is_null($method)){
            $this->defaultRequestHandler();
        }    
    }

    function __destruct()
    {
        $this->resolve();
    }
}