<?php

it('performs sums', function () {
    $result = sum(1, 2);

    expect($result)->toBe(3);
 });
