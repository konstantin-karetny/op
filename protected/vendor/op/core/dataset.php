<?php

namespace Op\Core;

class DataSet extends Type\Arr
{
    public function getArr(Type\Cmd $key): self
    {
        return static::init($this->value($key));
    }

    public function getCmd(Type\Cmd $key): Type\Cmd
    {
        return Type\Cmd::init($this->value($key));
    }
}
