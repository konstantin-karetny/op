<?php

namespace Op\Core\Type;

class Integer extends Type
{
    protected $integer;

    public static function init($integer = 0)
    {
        return parent::init($integer);
    }

    public function __construct($integer = 0)
    {
        $this->set($integer);
    }

    public function getType(): Cmd
    {
        return Cmd::init('integer');
    }

    public function out(): int
    {
        return $this->integer;
    }

    protected function convert($subject): int
    {
        if (!\Op\Core\PHPType::init($subject)->isScalar()) {
            return (int) (bool) $subject;
        }
        if (Str::init($subject)->isCharsOnly()) {
            return 1;
        }
        return (int) Str::init($subject)->pregReplace('/[^0-9]/', '')->out();
    }

    protected function set($subject)
    {
        $this->integer = $this->convert($subject);
    }
}
