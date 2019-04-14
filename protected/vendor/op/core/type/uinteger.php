<?php

namespace Op\Core\Type;

class UInteger extends Integer
{
    public function getType(): Cmd
    {
        return Cmd::init('uinteger');
    }

    protected function convert($subject): int
    {
        $res = parent::convert($subject);
        return
            !is_string($subject)
                ? $res
                : Str::init($subject)->pregReplace('/[^0-9-]/', '')->pos('-') === 0
                    ? $res * -1
                    : $res;
    }
}
