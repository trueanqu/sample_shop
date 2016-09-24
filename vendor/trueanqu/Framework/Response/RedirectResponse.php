<?php
/**
 * Created by PhpStorm.
 * User: anqu
 * Date: 24.09.16
 * Time: 9:03
 */

namespace Framework\Response;


class RedirectResponse extends Response
{
    public function __construct($link, $code = 301)
    {
        $this->setHeader('Location', $link);
        $this->code = $code;
    }
}