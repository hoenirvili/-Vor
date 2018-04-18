<?php declare(strict_types = 1);

// [1-9]+[0-9]* => /^[1-9]+[0-9]*$/ 
// => matches all digits that does not start with 0
return [
    ['GET', '/', ['Vor\Controllers\Index', 'show']],
    // ['GET', '/{page:[1-9]+[0-9]*}', ['Vor\Controllers\Index', 'page']],
    ['GET', '/about', ['Vor\Controllers\About', 'show']],
    ['GET', '/archive', ['Vor\Controllers\Archive', 'show']],
    ['GET', '/archive/{page:[1-9]+[0-9]*}',['Vor\Controllers\Archive','page']],
    ['GET', '/article', ['Vor\Controllers\Article', 'show']],
    ['GET', '/article/{page:[1-9]+[0-9]*}', ['Vor\Controllers\Article', 'page']],
    ['GET', '/login', ['Vor\Controllers\Login', 'show']],
    ['GET', '/tag/{name}/{page:[1-9]+[0-9]*}', ['Vor\Controllers\Index', 'byTag']],
    ['POST', '/login', ['Vor\Controllers\Login', 'enter']],
];