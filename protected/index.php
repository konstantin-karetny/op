<?php

namespace Op\Core;

//require_once 'vendor/autoload.php';
set_include_path(__DIR__ . '/vendor');
spl_autoload_register();



die(var_dump(

    DataSet::init([
        'val1' => 1,
        'val2' => 'as!@#(**fd'
    ])->getCmd(Type\Cmd::init('val2'))

));



Op\Core\App::init()->exec();
