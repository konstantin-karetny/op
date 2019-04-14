<?php

namespace Op\Core\Type;

class Str extends Type
{
    protected $string;

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

    public function isCharsOnly(): bool
    {
        return ctype_alpha($this);
    }

    public function lower(): Str
    {
        $this->set(strtolower($this));
        return $this;
    }

    public function pregReplace(
            $pattern,
            $replacement,
        int $limit  = -1,
        int &$count = null
    ): Str
    {
        $this->set(
            preg_replace(
                $pattern,
                $replacement,
                $this,
                $limit,
                $count
            )
        );
        return $this;
    }

    public function pos(string $needle, int $offset = 0): int
    {
        $res = strpos($this, $needle, $offset);
        return $res === false ? -1 : $res;
    }

    public function out(): string
    {
        return $this->string;
    }

    protected function convert($subject): string
    {
        die(var_dump($subject));
        return \Op\Core\PHPType::init($subject)->set(Cmd::init('string'));
    }

    protected function set($subject)
    {
        $this->string = $this->convert($subject);
    }
}
