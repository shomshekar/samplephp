<?php

use Core\Container;

test('it can resolve something out of the container', function () {
    // expect(true)->toBeTrue();
    // arrange /> act /> assert/except

    $container = new Container();

    $container->bind('foo', function(){
        return 'bar';
    });

    $result = $container->resolve('foo');

    expect($result)->toEqual('bar');

});
