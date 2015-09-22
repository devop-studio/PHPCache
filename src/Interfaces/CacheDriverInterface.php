<?php

namespace Millennium\Cache\Interfaces;

interface CacheDriverInterface
{

    public function fetch($key);

    public function store($key, $data);

    public function remove($key);
}
