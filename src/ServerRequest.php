<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace Enjoys\Http;

/**
 * Class ServerRequest
 *
 * @author Enjoys
 */
class ServerRequest extends \HttpSoft\Message\ServerRequest
{

    public function get($key = null, $default = null)
    {
        if ($key === null) {
            return $this->getQueryParams();
        }

        if (array_key_exists($key, $this->getQueryParams())) {
            return $this->getQueryParams()[$key];
        }
    }

    public function post($key = null, $default = null)
    {
        if ($key === null) {
            return $this->getParsedBody();
        }
        if (array_key_exists($key, $this->getParsedBody())) {
            return $this->getParsedBody()[$key];
        }
        return $default;
    }
}
