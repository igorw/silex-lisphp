<?php

require __DIR__.'/../vendor/autoload.php';

$file = __DIR__.'/../src/app.lisphp';

$environment = Lisphp_Environment::full();
$scope = new Lisphp_Scope($environment);

$scope['require'] = new Lisphp_Runtime_PHPFunction(function ($file) use ($scope) {
    $program = Lisphp_Program::load(__DIR__.'/../src/'.$file.'.lisphp');
    $program->execute($scope);
});

$program = Lisphp_Program::load($file);
$program->execute($scope);
