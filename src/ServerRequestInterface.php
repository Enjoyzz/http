<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Enjoys\Http;

/**
 *
 * @author Enjoys
 */
interface ServerRequestInterface
{

    /**
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    public function get(?string $key = null, $default = null);

    /**
     * 
     * @param array $params
     * @return void
     */
    public function addQuery(array $params = []): void;

    /**
     *
     * @param string|null $key
     * @param mixed $default
     * @return mixed
     */
    public function post(?string $key = null, $default = null);

    /**
     *
     * @param string|null $key
     * @return mixed
     */
    public function server(?string $key = null);

    /**
     *
     * @param string|null $key
     * @return mixed
     */
    public function files(?string $key = null);

    /**
     * 
     * @return string
     */
    public function getMethod(): string;
}
