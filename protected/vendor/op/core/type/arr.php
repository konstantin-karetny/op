<?php

namespace Op\Core\Type;

class Arr extends Type
{
    protected $array;

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

    protected function convert($subject): array
    {
        if (!is_array($subject)) {
            return [];
        }
        settype($subject, 'array');
        return  $subject;
    }

    protected function set($subject)
    {
        $this->array = $this->convert($subject);
    }
}
