<?php
/**
 * Created by PhpStorm.
 * User: anqu
 * Date: 24.09.16
 * Time: 8:21
 */

namespace Framework\Response;


class JSONResponse extends Response
{
    public function __construct($data, $code = 200)
    {
        $this->code = $code;
        $this->contentType = 'application/json';
        $this->init($data);
    }

    public function setContent($content)
    {
        $this->content = json_encode($content);
    }
}