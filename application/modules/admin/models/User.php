<?php
class Admin_Model_User extends Zend_Db_Table_Abstract
{
   	protected $_name = 'usuario';
   
	public function verificarEmail($email) {
    	$where = $this->getAdapter()->quoteInto('email = ?', $email);
    	$select =  $this->fetchAll($where);
    	if (count($select)>0){
    		return true;
    	} else {
    		return false;
    	}
    }
}
