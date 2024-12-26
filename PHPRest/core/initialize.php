<?php
defined('DS') ?
    null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ?
    null : define('SITE_ROOT', DS . 'xampp' . DS . 'htdocs' . DS . 'PHPRest');
defined('INC_PATH') ?
    null : define('INC_PATH', SITE_ROOT . DS . 'includes'); //wamp64/www/phprest/includes
defined('CORE_PATH') ?
    null : define('CORE_PATH', SITE_ROOT . DS . 'core'); //wamp64/www/phprest/core

require_once(INC_PATH . DS . 'config.php');
require_once(CORE_PATH . DS . 'paciente.php');
