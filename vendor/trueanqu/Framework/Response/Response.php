<?php
/**
 * Created by PhpStorm.
 * User: anqu
 * Date: 19.09.16
 * Time: 12:13
 */

namespace Framework\Response;


/**
 * Class Response is designed to accumulate all required data during the app working cycle and to sent the instance of the class in the end of the cycle
 * @package Framework\Response
 */
class Response
{
    protected $headers = [];

    protected $content = '';

    protected $code;

    protected $contentType = 'text/html';

    const STATUS_MSGS = [
        200 => 'OK',
        404 => 'Not Found',
        301 => 'Moved Permanently'
    ];

    public function __construct($data, $code = 200)
    {
        $this->code = $code;
        $this->init($data);
    }

    protected function init($content)
    {
        $this->setHeader('Content-Type', $this->contentType);
        $this->setContent($content);
    }

    /**
     * Send response
     *
     */
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
    }

    public function sendHeaders()
    {
        header("HTTP/1.1 ".$this->code." ".self::STATUS_MSGS[$this->code]);
        if(!empty($this->headers)) {
            foreach($this->headers as $key=>$value){
                header(sprintf('%s: %s', $key, $value));
            }
        }
    }

    public function setHeader($header, $value)
    {
        $this->headers[$header] = $value;
    }

    public function sendContent()
    {
        echo $this->content;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

}