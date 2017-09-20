<?php declare(strict_types = 1);

return [
    ['GET', '/', ['Vor\Controllers\Index','show']],
    ['GET', '/about', ['Vor\Controllers\About', 'show']]
];