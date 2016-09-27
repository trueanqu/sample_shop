<?php
/**
 * Created by PhpStorm.
 * User: anqu
 * Date: 19.09.16
 * Time: 12:13
 */

namespace Framework;


class Request
{
    private $requestUri;
    private $requestMethod;

    public function __construct()
    {
        $this->requestMethod = $this->filterMethod();
        $this->requestUri = $this->filterUri();
    }

    public function filterUri()
    {
        if(preg_match("/^\/[a-z]+((\/([a-z]+|[0-9]+)(\/[a-z]+)?))?$/", $_SERVER['REQUEST_URI']))
            return $_SERVER['REQUEST_URI'];
        else
            return 'invalid uri';//TODO: handle exception
        //return filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_LOW);
    }

    /**
     * @return
     */
    public function filterMethod()
    {
        $validMethods = array ('GET','POST', 'PUT', 'DELETE');
        if(in_array($_SERVER['REQUEST_METHOD'],$validMethods))
        {
            return $_SERVER['REQUEST_METHOD'];
        } else {
            return 'invalid method';//TODO: return response with 500 code or throw exception;
        }
    }
}
