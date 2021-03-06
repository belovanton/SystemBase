<?php

// this check prevents access to debug front controllers that are deployed by accident to production servers.
// feel free to remove this, extend it or make something more sophisticated.
require dirname(__FILE__).'/../protection.php';

require_once(dirname(__FILE__) . '/../../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('dx', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
