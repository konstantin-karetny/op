<?php

namespace Ada\Core;

class Input extends Proto
{
    protected static
        $instance;

    protected
        $input,
        $router;

    public static function init(Input $input = null, bool $cached = true)
    {
        return
            static::$instance && $cached
                ? static::$instance
                : static::$instance = new static($input);
    }
}
