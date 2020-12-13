<?php

declare(strict_types=1);

namespace Enjoys\Http;

use HttpSoft\ServerRequest\ServerNormalizerInterface;
use HttpSoft\ServerRequest\ServerRequestCreator;

/**
 * Class ServerRequest
 *
 * @author Enjoys
 */
class ServerRequest implements ServerRequestInterface
{

    protected \Psr\Http\Message\ServerRequestInterface $request;
    private array $query = [];

    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface|null $request
     * @param ServerNormalizerInterface|null $normalizer
     */
    public function __construct(
            ?\Psr\Http\Message\ServerRequestInterface $request = null,
            ?ServerNormalizerInterface $normalizer = null
    )
    {
        $this->request = $request ?? ServerRequestCreator::create($normalizer);
        $this->query = $this->request->getQueryParams();
    }

    /**
     * 
     * @return \Psr\Http\Message\ServerRequestInterface
     */
    public function getRequest(): \Psr\Http\Message\ServerRequestInterface
    {
        return $this->request;
    }

    /**
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    public function get(?string $key = null, $default = null)
    {
        if ($key === null) {
            return $this->query;
        }
        if (array_key_exists($key, $this->query)) {
            return $this->query[$key];
        }
        return $default;
    }

    /**
     * 
     * @param array $params
     * @return void
     */
    public function addQuery(array $params = []): void
    {
        foreach ($params as $key => $value) {
            $this->query[$key] = $value;
        }
    }

    /**
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    public function post(?string $key = null, $default = null)
    {
        if ($key === null) {
            return $this->request->getParsedBody();
        }
        if (array_key_exists($key, $this->request->getParsedBody())) {
            return $this->request->getParsedBody()[$key];
        }
        return $default;
    }

    /**
     *
     * @param string|null $key
     * @return mixed
     */
    public function server(?string $key = null)
    {
        if ($key === null) {
            return $this->request->getServerParams();
        }
        if (array_key_exists($key, $this->request->getServerParams())) {
            return $this->request->getServerParams()[$key];
        }

        return null;
    }

    /**
     *
     * @param string|null $key
     * @return mixed
     */
    public function files(?string $key = null)
    {
        if ($key === null) {
            return $this->request->getUploadedFiles();
        }
        if (array_key_exists($key, $this->request->getUploadedFiles())) {
            return $this->request->getUploadedFiles()[$key];
        }
        return null;
    }

    /**
     * 
     * @return string
     */
    public function getMethod(): string
    {

        return $this->request->getMethod();
    }
}
