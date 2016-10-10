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
/**
 * Class Request
 * @package Framework
 */
class Request
{
    private static $_instance;
    private $config;
    private $requestUri;
    private $requestMethod;
    private $requestParameters;
    private $files;


    private function __construct()
    {
        $this->config = Config::getConfigByName('request');
        $this->requestMethod = $this->filterMethod();
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->requestParameters = $this->filterParameters();
        $this->files = $this->filterFiles();
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Request();
        }
        return self::$_instance;
    }

    private final function __clone()
    {
    }


    /** Collect and filter request parameters located at @param $parameters (if given) or $_REQUEST
     *
     * @param array $parameters parameters to filter
     * @return array of filtered parameters
     */
    private function filterParameters($parameters = null)
    {
        if (isset($parameters))//@TODO add filtering
        {
            return $parameters;
        }

        return $_REQUEST;
    }

    /**Filter files given in $files or superglobal array $_FILES
     *
     * @param array $files files to filter
     * @return array of filtered files
     */
    private function filterFiles($files = null)
    {
        if (isset($files)) { //@TODO filtering
            return $files;
        }
        return $_FILES;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function getRequestParameters()
    {
        return $this->requestParameters;
    }

    /**
     * @param mixed $requestParameters
     */
    public function setRequestParameters($requestParameters)
    {
        $this->requestParameters = $requestParameters;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

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

    /**
     * Check if the request http_method is one of the listed in config
     * @return string htttp method of request
     * @return null if current http request method use is not supported
     */
    public function filterMethod()
    {
        if (in_array($_SERVER['REQUEST_METHOD'], $this->config['valid_http_methods'])) {
            return $_SERVER['REQUEST_METHOD'];
        } else {
            return null;//@TODO: return response with 500 code or throw exception;
        }
    }

}
