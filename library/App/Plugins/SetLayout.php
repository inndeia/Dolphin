<?php
//library/App/Plugins/SetLayout.php
class App_Plugins_SetLayout extends Zend_Layout_Controller_Plugin_Layout
{
    // o preDispatch � chamado antes de uma a��o ser despachada pelo dispatcher
    // com isso, usamos o nosso objeto request e extraimos o nome do m�dulo
    public function preDispatch (Zend_Controller_Request_Abstract $request)
    {
    	if ($request->getModuleName() != null){
    	$this->_setupLayout($request->getModuleName());
    	}
    }
    // Dispensa coment�rios
    protected function _setupLayout ($moduleName)
    {
        $this->getLayout()->setLayoutPath(
        APPLICATION_PATH . '/modules/' . $moduleName . '/views/scripts');
        $this->getLayout()->setLayout($moduleName);
    }
}