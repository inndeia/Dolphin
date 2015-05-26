<?php

class App_Plugins_SetOpenGraph extends Zend_Controller_Plugin_Abstract
{
   public function preDispatch(Zend_Controller_Request_Abstract $request)
   {
      $layout = Zend_Layout::getMvcInstance();
      $view = $layout->getView();
      
      $_serviceOpenGraph = new OpenGraphService();
      $openGraph = $_serviceOpenGraph->getById(1);
      $view->openGraph = $openGraph;
   }
}