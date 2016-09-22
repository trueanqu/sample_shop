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
        return filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_ENCODED, FILTER_FLAG_ENCODE_HIGH);
    }

    /**
     * @return bool
     */
    public function filterMethod()
    {
        $validMethods = array ('GET','POST', 'PUT', 'DELETE');
        if(in_array($_SERVER['REQUEST_METHOD'],$validMethods))
        {
            return $_SERVER['REQUEST_METHOD'];
        } else {
            //TODO: return response with 500 code or throw exception;
        }
    }
}
