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
class ServerRequest implements ServerRequestInterface
{

    protected \Psr\Http\Message\ServerRequestInterface $request;
    private array $query = [];

    public function __construct(?\Psr\Http\Message\ServerRequestInterface $request = null)
    {
        $this->request = $request ?? \HttpSoft\ServerRequest\ServerRequestCreator::create();
        $this->query = $this->request->getQueryParams();
    }

    public function getRequest(): \Psr\Http\Message\ServerRequestInterface
    {
        return $this->request;
    }

    public function get($key = null, $default = null)
    {
        if ($key === null) {
            return $this->query;
        }
        if (array_key_exists($key, $this->query)) {
            return $this->query[$key];
        }
        return $default;
    }

    public function addQuery(array $params = [])
    {
        foreach ($params as $key => $value) {
            $this->query[$key] = $value;
        }
    }

    public function post($key = null, $default = null)
    {
        if ($key === null) {
            return $this->request->getParsedBody();
        }
        if (array_key_exists($key, $this->request->getParsedBody())) {
            return $this->request->getParsedBody()[$key];
        }
        return $default;
    }

    public function server($key = null)
    {
        if ($key === null) {
            return $this->request->getServerParams();
        }
        if (array_key_exists($key, $this->request->getServerParams())) {
            return $this->request->getServerParams()[$key];
        }

        return null;
    }

    public function files($key = null)
    {
        if ($key === null) {
            return $this->request->getUploadedFiles();
        }
        if (array_key_exists($key, $this->request->getUploadedFiles())) {
            return $this->request->getUploadedFiles()[$key];
        }
        return null;
    }

    public function getMethod()
    {

        return $this->request->getMethod();
    }
}
