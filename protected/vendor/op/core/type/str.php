<?php

namespace Op\Core\Type;

class Str extends Type
{
    protected
        $string;

    public static function init($string = null)
    {
        return parent::init($string);
    }

    public function __construct($string = '')
    {
        $this->set($string);
    }

    public function __toString(): string
    {
        return $this->out();
    }

    public function concat(Str $string): Str
    {
        $this->set(static::init($this . $string));
        return $this;
    }

    public function concatLeft(Str $string): Str
    {
        $this->set(static::init($string . $this));
        return $this;
    }

    public function getType(): Cmd
    {
        return Cmd::init('str');
    }

    public function out(): string
    {
        return $this->string;
    }

    protected function convert($string): string
    {
        if (!is_scalar($string)) {
            return '';
        }
        settype($string, 'string');
        return $string;
    }

    protected function set($string)
    {
        $this->string = $this->convert($string);
    }
}
