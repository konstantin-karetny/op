<?php

namespace Ada\Core\Type;

class Cmd extends Str
{
    public function __construct(string $string = '')
    {
        parent::__construct(
            strtolower(
                preg_replace('/[^a-z0-9_]/i', '', $string)
            )
        );
    }
}
