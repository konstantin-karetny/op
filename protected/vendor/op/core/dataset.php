<?php

namespace Ada\Core;

class DataSet extends Type\Arr
{
    public function getCmd(Type\Cmd $name): Type\Cmd
    {
        return Type\Cmd::init((string) $this->val($name));
    }

    public function set(Type\Cmd $name, $value): array
    {

    }
}
