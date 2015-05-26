<?php

class App_Plugins_SetCidade extends Zend_Controller_Plugin_Abstract {

    // o preDispatch � chamado antes de uma a��o ser despachada pelo dispatcher
    // com isso, usamos o nosso objeto request e extraimos o nome do m�dulo
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        if ($request->getParam(cidade) == null) {
            $this->_setarCidade($request->getModuleName(), $request->getControllerName(), $request->getActionName(), $request->getParams());
        }
    }

    // Dispensa comentarios
    protected function _setarCidade($module, $controller, $action, $parametros) {
        /* $this->getRequest()->setModuleName($module);
          $this->getRequest()->setControllerName($controller);
          $this->getRequest()->setActionName($action);
          $this->getRequest()->setParam('cidade', 'recife'); */

        if ($module == 'default' && $controller != 'login') {
            if ($controller == 'index') {
                $this->_response->setRedirect('recife');
            } else {
                if ($action == 'index') {
                    $this->_response->setRedirect('recife/' . $controller . '/');
                } else {
                    $this->_response->setRedirect('recife/' . $controller . '/' . $action . '/');
                    //$this->_response->setRedirect('/nada');
                }
            }
        }
    }

}
