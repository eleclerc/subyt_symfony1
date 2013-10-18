<?php

require_once realpath(dirname(__FILE__).'/../vendor/symfony-1.4/lib/autoload/sfCoreAutoload.class.php');
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  static protected $zendLoaded = false;
  
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
  }

  static public function registerZend()
  {
    if (self::$zendLoaded) {
      return;
    }
 
    set_include_path(sfConfig::get('sf_root_dir').'/vendor/ZendFramework-1.9/library'.PATH_SEPARATOR.get_include_path());
    require_once 'Zend/Loader/Autoloader.php';
    Zend_Loader_Autoloader::getInstance();
    self::$zendLoaded = true;
  }
}
