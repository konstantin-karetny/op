<?php

namespace Op\Core\Type;

class Cmd extends Str
{
    protected function convert($string): string
    {
        return
            strtolower(
                preg_replace(
                    '/[^a-z0-9_]/i',
                    '',
                    parent::convert($string)
                )
            );
    }

    public function getType(): Cmd
    {
        return Cmd::init('cmd');
    }
}
