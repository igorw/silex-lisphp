# Fun with silex and lisphp

Putting the phun back into phunctional programming! This is just a little
experiment trying to use [lisphp](https://github.com/dahlia/lisphp) with the
[silex microframework](http://silex.sensiolabs.org).

Note: You cannot use the lisphp utility due to the missing `require` function.

## Installation

Use [composer](http://getcomposer.org).

## Running from the web

    $ curl http://silex-lisphp.lo
    $ curl http://silex-lisphp.lo/?name=igorw

## Running the tests

    $ phpunit
