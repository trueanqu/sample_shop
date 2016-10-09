<?php
/**
 * Created by PhpStorm.
 * User: anqu
 * Date: 19.09.16
 * Time: 12:13
 */

namespace Framework;


/**
 * Class Request gathering and filtering data from the superglobal arrays
 * @package Framework
 */
class Request extends Singleton
{
    private $requestUri;
    private $requestMethod;
    private $config;

    /**
     * @return string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    private function __construct()
    {
        $this->config = Config::getConfigByName('request');
        $this->requestMethod = $this->filterMethod();
        $this->requestUri = $this->filterUri();
    }


    /**
     * Filter uri if it isn't corresponding rule (uri_filter) given in configuration file
     * @return string request uri
     * @return null if request uri is not valid
     */
    public function filterUri()
    {
        if(preg_match($this->config['uri_filter'], $_SERVER['REQUEST_URI'])) // deleted (\/[a-z]+)? for '/edit'-like suffixes
            return $_SERVER['REQUEST_URI'];
        else
            return null;//@TODO: handle exception

    }

    /**
     * Check if the request http_method is one of the listed in config
     * @return string htttp method of request
     * @return null if current http request method use is not supported
     */
    public function filterMethod()
    {
        if(in_array($_SERVER['REQUEST_METHOD'],$this->config['valid_http_methods']))
        {
            return $_SERVER['REQUEST_METHOD'];
        } else {
            return null;//@TODO: return response with 500 code or throw exception;
        }
    }

    protected static function createInstance()
    {
        return new Request();
    }
}
