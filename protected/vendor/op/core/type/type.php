<?php

namespace Op\Core\Type;

abstract class Type extends \Op\Core\Proto
{
    abstract public function __construct($subject = null);

    abstract public function getType(): Cmd;

    abstract public function out();

    abstract protected function convert($subject);

    abstract protected function set($subject);
}
