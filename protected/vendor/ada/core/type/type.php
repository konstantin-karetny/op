<?php

namespace Ada\Core\Type;

abstract class Type extends \Ada\Core\Proto
{
    protected
        $core;

    public static function init()
    {
        return parent::init(...func_get_args());
    }

    public function __construct($core = null)
    {
        $this->core = $core;
    }

    public function res()
    {
        return $this->core;
    }

    public function getName(): Cmd
    {
        return Cmd::init(substr(strrchr(get_class($this), '\\'), 1));
    }
}
