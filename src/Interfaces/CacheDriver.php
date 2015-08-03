<?php

namespace Millennium\Interfaces;

interface CacheDriver
{

    public function fetch($key);

    public function store($key, $data);

    public function remove($key);
}
