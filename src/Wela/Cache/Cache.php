<?php

namespace Wela\Cache;

use \Gregwar\Cache\Cache as GregwarCache;

class Cache
{
    protected $cache;

    public function __construct()
    {
        $this->cache = new GregwarCache();
        $this->cache->setCacheDirectory('./cache');
    }

    public function create($fileName, $data, $exp = 1800)
    {
        return $this->cache->getOrCreate($fileName, [
            'max-age' => $exp
        ], function() use($data) {
            return $data;
        });
    }
}