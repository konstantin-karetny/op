<?php

namespace Op\Core;

class PHPType extends Proto
{
    protected $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }

    public function isScalar(): bool
    {
        return is_scalar($this->out());
    }

    public function out()
    {
        return $this->subject;
    }

    public function set(Cmd $type): bool
    {
        if (!$this->isScalar()) {
            return '';
        }
        $res = $this->out();
        settype($res, $type);
        return $res;
    }
}
