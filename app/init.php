<?php

define('ROOT', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
define('APP', ROOT.DS.'app');
define('VOR', APP.DS. 'Vor');
define('CONTROLLERS', VOR.DS.'Controllers');
define('CORE', VOR.DS. 'Core');
define('VIEWS', VOR.DS. 'Views');
define('MODELS', VOR.DS. 'Models');
define('TEAMPLATES', VIEWS.DS. 'templates');


require_once ROOT.DS.'vendor'.DS.'autoload.php';