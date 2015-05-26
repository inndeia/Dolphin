<?php
class Admin_Model_User extends Zend_Db_Table_Abstract
{
   	protected $_name = 'usuario';    protected $_primary = 'id';
   
	public function verificarEmail($email) {
    	$where = $this->getAdapter()->quoteInto('email = ?', $email);
    	$select =  $this->fetchAll($where);
    	if (count($select)>0){
    		return true;
    	} else {
    		return false;
    	}
    }    public function getAll() {    	try {    		$select = $this->select()    						->from(array('u'=>'usuario'))    						->join(array('p' => 'perfil'),'p.id = u.perfil_id',array('nome'))    						->where('u.status = 1')    						->setIntegrityCheck(false);    		$users = $this->fetchAll($select)->toArray();    		    		$users = $this->standardizeReturn($users);    		    		    		return $users;    	} catch (Exception $e) {    		throw $e;    	}    }    private function standardizeReturn($rs, $returnZero = false, $showPass = false) {        	try {    		foreach ($rs as &$user) {    			//retirar o password do usuario    			if (!$showPass) {    				unset($user['senha']);    			}    		}        		if ($returnZero) {    			return $rs[0];    		} else {    			return $rs;    		}    	} catch (Exception $e) {    		throw $e;    	}    }    public function create($dataUser) {    	    	try {        		if (!$this->verificarEmail($dataUser['email'])) {    			$idUser = $this->insert($dataUser);        			if ($idUser > 0) {        				//$this->sendWelcomeEmail($dataUser['email'], $dataUser['nome_completo'], $dataUser['senha']);    				$user = $this->getByid($idUser);    				unset($user['senha']);    				return $user;    			} else {    				return array("error" => 'Erro ao inserir usuário');    			}    		} else {    			    			return array("error" => 'Email ja cadastrado!');    		}    	} catch (Exception $e) {    		throw $e;    	}    }    public function getByid($idUser) {        	try {    		$select = $this->select();    		$select->where('usuario.id = ?', $idUser);    		$select->where('usuario.status = 1');    		$users = $this->fetchAll($select)->toArray();        		if (count($users) > 0) {    			return $this->standardizeReturn($users, true);    		} else {    			return null;    		}    	} catch (Exception $e) {    		throw $e;    	}    }        public function remover($id) {    	try {        		$where = $this->getAdapter()->quoteInto("id = $id");    		$count = $this->delete($where);    		    		return $count;    	} catch (Exception $e) {    		throw $e;    	}    }    public function save(array $dataUser) {    	try {        		$idUser = $dataUser['id'];    		unset($dataUser['id']);        		$where = $this->getAdapter()->quoteInto('id = ?', $idUser);        		$return = $this->update($dataUser, $where);        		if ($return > 0) {    			$user = $this->getByid($idUser);    			unset($user['senha']);    			return $user;    		} else {    			return true;    		}    	} catch (Exception $e) {    		throw $e;    	}    }
}

