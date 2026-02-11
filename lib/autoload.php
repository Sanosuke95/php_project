<?php

const ALIAS = [
    'Core' => 'Core',
    'Lib' => 'lib',
    'App' => 'src'
];

spl_autoload_register(function ($class) {
    $namespace = explode("\\", $class);
    if (in_array($namespace[0], array_keys(ALIAS))) {
        $namespace[0] = ALIAS[$namespace[0]];
    } else {
        throw new Exception("Alias non existant");
    }

    $filepath = dirname(__DIR__) . '/' . implode('/', $namespace) . '.php';
    require $filepath;
});
