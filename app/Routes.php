<?php declare(strict_types = 1);

return [
    ['GET', '/', ['Vor\Controllers\Index', 'show']],
    // [1-9]+[0-9]* => /^[1-9]+[0-9]*$/ => matches all digits that does not start with 0
    ['GET', '/{page:[1-9]+[0-9]*}', ['Vor\Controllers\Index', 'page']],
    ['GET', '/about', ['Vor\Controllers\About', 'show']],
    ['GET', '/archive', ['Vor\Controllers\Archive', 'show']],
    ['GET', '/article', ['Vor\Controllers\Article', 'show']],
    ['GET', '/article/{page:[1-9]+[0-9]*}', ['Vor\Controllers\Article', 'page']]
];