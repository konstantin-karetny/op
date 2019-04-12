<?php

namespace Ada\Core\Type;

class Str extends Type
{
    public static function init(string $string = '')
    {
        return parent::init($string);
    }

    public function __construct(string $string = '')
    {
        parent::__construct($string);
    }

    public function __toString(): string
    {
        return $this->res();
    }

    public function concat(Str $string): Str
    {
        $this->core = static::init($this . $string)->res();
        return $this;
    }

    public function res(): string
    {
        return parent::res();
    }
}
