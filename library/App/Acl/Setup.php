<?php
class App_Acl_Setup
{
	protected $_acl;
 
    public function __construct()
    {
        $this->_acl = new Zend_Acl();
        $this->_initialize();
    }
 
    protected function _initialize()
    {
        $this->_setupRoles();
        $this->_setupResources();
        $this->_setupPrivileges();
        $this->_saveAcl();
    }
 
    protected function _setupRoles()
    {
    	$this->_acl->addRole( new Zend_Acl_Role('guest'));
        $this->_acl->addRole( new Zend_Acl_Role('admin'), 'guest');
    }
 
    protected function _setupResources()
    {
        $this->_acl->addResource( new Zend_Acl_Resource('auth') );        
        $this->_acl->addResource( new Zend_Acl_Resource('error') );
        $this->_acl->addResource( new Zend_Acl_Resource('index') );
        $this->_acl->addResource( new Zend_Acl_Resource('usuarios') );
        $this->_acl->addResource( new Zend_Acl_Resource('dolphin') );
        $this->_acl->addResource( new Zend_Acl_Resource('gastronomia') );
        $this->_acl->addResource( new Zend_Acl_Resource('servicos') );
        $this->_acl->addResource( new Zend_Acl_Resource('acomodacoes') );
        $this->_acl->addResource( new Zend_Acl_Resource('tarifas') );
        $this->_acl->addResource( new Zend_Acl_Resource('pacotes') );
    }
 
    protected function _setupPrivileges()
    {
    	$this->_acl->allow('guest', 'auth', array('index','login','logout','esqueci-a-senha','loginmobile'));
        $this->_acl->allow( 'admin', 'usuarios', array('index', 'inserir','delete','editar') )
        		->allow('admin','index', array('inserir','delete','editar','index') )
        		->allow('admin','error', array('error','index') )
        		->allow('admin','dolphin', array('index','conteudo','editar-conteudo','salvarimagem','crop','galeria','editar-galeria','remover-galeria','galeria-estrutura','editar-galeria-estrutura','remover-galeria-estrutura') )
        		->allow('admin','gastronomia', array('index','adicionar','editar','remover','galeria','editar-galeria','remover-galeria') )
        		->allow('admin','servicos', array('index','adicionar','editar','remover') )
        		->allow('admin','acomodacoes', array('index','additem','listaitem','removeritem','editar-conteudo','editar-galeria','editar-preco','remover-galeria') )
        		->allow('admin','tarifas', array('index','addpacote','editarpacote','removerpacote','listar-opcionais','editar-opcionais','listar-conteudo','editar-conteudo') )
        		->allow('admin','pacotes', array('index','addpacote','editarpacote','removerpacote','editar-conteudo') );
    }
 
    protected function _saveAcl()
    {
        $registry = Zend_Registry::getInstance();
        $registry->set('acl', $this->_acl);
    }
}