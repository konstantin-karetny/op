<?php

namespace Op\Core;

class Proto
{
    protected $config;

    public static function init()
    {
        return new static(...func_get_args());
    }

    public function getConfig(): DataSet
    {
        return $this->config = $this->config ?: DataSet::init();
    }
}
