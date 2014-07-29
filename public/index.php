<?php

require __DIR__ . '/../bootstrap.php';

Zend\Mvc\Application::init(require __DIR__ . '/../config/application.config.php')->run();