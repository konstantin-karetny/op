<?php

namespace Ada\Core;

class App extends Proto
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

    protected function __construct(Input $input = null)
    {
        $this->input  = $input ?: Input::init();
        $this->router = Router::init($this->getInput());
    }

    public function exec(): bool
    {
        die(var_dump(__METHOD__));
    }

    public function getInput(): Input
    {
        return $this->input;
    }

    public function getRouter(): Router
    {
        return $this->router;
    }
}
