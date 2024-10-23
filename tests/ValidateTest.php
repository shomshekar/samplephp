<?php

use Core\Validator;

test('validate a string', function(){
    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
});