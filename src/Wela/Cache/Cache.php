<?php

namespace Wela\Cache;

use \Gregwar\Cache\Cache as GregwarCache;

class Cache
{
    protected $cache;

    public function __construct()
    {
        $this->cache = new GregwarCache();
        $this->cache->setCacheDirectory(dirname(dirname(dirname(__DIR__))).'/cache');
    }

    public function create($fileName, $data, $exp = 2)
    {
        return $this->cache->getOrCreate($fileName, [
            'max-age' => $exp
        ], function() use($data) {
            return $data;
        });
    }

    public function getCache($fileName)
    {
        return $this->cache->get($fileName);
    }

    public function check($fileName)
    {
        return $this->cache->exists($fileName);
    }
}