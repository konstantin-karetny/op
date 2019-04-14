<?php

namespace Op\Core\Type;

class Cmd extends Str
{
    public function getType(): Cmd
    {
        return Cmd::init('cmd');
    }

    protected function convert($subject): string
    {
        return
            Str::init(parent::convert($subject))
                ->pregReplace('/[^a-z0-9_]/i', '')
                ->lower()
                ->out();
    }
}
