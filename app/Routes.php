<?php declare(strict_types = 1);

return [
    ['GET', '/', ['Vor\Controllers\Index', 'show']],
    ['GET', '/{page:\d+}', ['Vor\Controllers\Index', 'page']],
    ['GET', '/about', ['Vor\Controllers\About', 'show']]
];