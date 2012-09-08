<?php

namespace Igorw;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolver as BaseControllerResolver;

class ControllerResolver extends BaseControllerResolver
{
    public function getArguments(Request $request, $controller)
    {
        return array($request);
    }
}
