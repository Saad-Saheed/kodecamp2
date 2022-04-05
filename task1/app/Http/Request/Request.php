<?php
namespace App\Http\Request;
use App\Http\Request\Interfaces\RequestInterface;

class Request implements RequestInterface{

    public function __construct() {
        $this->selfBootsrap();
    }

    public function selfBootsrap()
    {
       
        foreach($_SERVER as $key => $value){
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    public function getBody()
    {
        if($this->requestMethod === 'POST'){
            $body = [];
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return $body;
        }

        if($this->requestMethod === 'GET'){
            return;
        }
    }

    private function toCamelCase($string)
    {
        $result = strtolower($string);
        preg_match_all('/_[a-z]/',$result, $matches);

        foreach($matches[0] as $match){
            $replaced = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $replaced, $result);
        }

        return $result;

    }
}