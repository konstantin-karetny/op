<?php

namespace Op\Core\Type;

class Arr extends Type
{
    protected
        $array;

    public static function init($array = [])
    {
        return parent::init($array);
    }

    public function __construct($array = [])
    {
        $this->set($array);
    }

    public function getType(): Cmd
    {
        return Cmd::init('arr');
    }

    public function out(): array
    {
        return $this->array;
    }

    public function value(Cmd $key)
    {
        return $this->out()[$key->out()];
    }

    protected function convert($array): array
    {
        if (!is_array($array)) {
            return [];
        }
        settype($array, 'array');
        return  $array;
    }

    protected function set($array)
    {
        $this->array = $this->convert($array);
    }
}
