<?php

ini_set('display_errors', 1);
error_reporting(-1);

require __DIR__ . '/../vendor/autoload.php';

Zend\Mvc\Application::init(require __DIR__ . '/../config/application.config.php')->run();