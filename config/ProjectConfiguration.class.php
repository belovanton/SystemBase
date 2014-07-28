<?php

//if(in_array($_SERVER['HTTP_HOST'], array('localhost', '127.0.0.1', 'mask.ru'))){
    require_once(dirname(__FILE__) . '/phpConsole.php');
    PhpConsole::start(true, true, dirname(__FILE__));
//}

require_once dirname(__FILE__).'/../plugins/trueofficeMegaPlugin/config/autoload.php';

class ProjectConfiguration extends sfProjectConfiguration
{
	public function setup()
	{
		mb_internal_encoding('UTF-8');
		mb_regex_encoding('UTF-8');
		$this->enableAllPluginsExcept(array('sfPropelPlugin', 'tfMegaPropelPlugin'));
		umask(0);
		header('X-UA-Compatible: IE=8', true);

		$this->dispatcher->connect('response.filter_content', array('HTMLCleanerFilter', 'filterResponseContent'));
		$this->dispatcher->connect('response.filter_content', array('ExtDataInjector', 'filterResponseContent'));
		
//		if( PHP_SAPI == 'cli' )
//		{
//		  $this->enablePlugins('sfJwtPhpUnitPlugin');
//		}

	}

	public function configureDoctrine(Doctrine_Manager $manager) {
		$manager->setAttribute(Doctrine_Core::ATTR_TBLNAME_FORMAT, 'ms_%s');
		$manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
		$manager->setAttribute(Doctrine::ATTR_DEFAULT_COLUMN_OPTIONS, array('notnull' => true));
		$manager->setAttribute(Doctrine::ATTR_DEFAULT_TABLE_TYPE, 'InnoDB');
		$manager->setAttribute(Doctrine::ATTR_DEFAULT_TABLE_CHARSET, 'utf8');
		$manager->setAttribute(Doctrine::ATTR_DEFAULT_TABLE_COLLATE, 'utf8_general_ci');
		$manager->setAttribute(Doctrine_Core::ATTR_QUERY_CLASS, 'Doctrine_Secured_Query');
		sfConfig::set('doctrine_model_builder_options', array(
			'baseClassName' => 'tfGuardedRecord'
		));
  }
}
