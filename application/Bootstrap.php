<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload ()
    {
    	$loader = Zend_Loader_Autoloader::getInstance();
    	$loader->setFallbackAutoloader(true);
    
    }
    
    protected function _initView ()
    {
    	//INICIAR PLUGIN PARA CADA MODULE TER SEU LAYOUT
    	$view = new Zend_View();
    	$view->setEncoding('UTF-8');
    	Zend_Layout::startMvc(
    	array(
    	'layoutPath' => APPLICATION_PATH . '/modules/default/views/scripts',
    	'layout' => 'default', // default deve ser o nome do arquivo. Ex: default.phtml
    	'pluginClass' => 'App_Plugins_SetLayout') //aqui onde acontece a magica
    	);
    }
    protected function _initAcl()
    {
    	$aclSetup = new App_Acl_Setup();
    }

}

