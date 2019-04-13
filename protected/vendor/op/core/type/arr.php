<?php

namespace Ada\Core\Type;

class Arr extends Type
{
    public static function init(array $array = [])
    {
        return parent::init($array);
    }

    public function __construct(array $array = [])
    {
        parent::__construct($array);
    }

    public function res(): array
    {
        return parent::res();
    }

    public function val(Cmd $key)
    {
        return $this->res()[$key->res()];
    }
}
