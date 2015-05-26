<?php



class Default_Model_Dolphin extends Zend_Db_Table_Abstract

{

    protected $_name = 'dolphin';

    protected $_primary = 'id';

    

    public function getAll() {
    	
    	try {
    		$select = $this->select()
    						->from(array('d'=>'dolphin'))
    						->setIntegrityCheck(false);
    		$conteudo = $this->fetchAll($select)->toArray();
    		
    		
    		return $conteudo;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function getAllGaleria() {
    
    	try {
    		$select = $this->select()
    		->from(array('d'=>'dolphin_galeria'))
    		->setIntegrityCheck(false);
    		$conteudo = $this->fetchAll($select)->toArray();
    
    
    		return $conteudo;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function getAllGaleriaEstrutura() {
    
    	try {
    		$select = $this->select()
    		->from(array('d'=>'dolphin_galeria_estrutura'))
    		->setIntegrityCheck(false);
    		$conteudo = $this->fetchAll($select)->toArray();
    
    
    		return $conteudo;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    
    public function create($dataUser) {
    	
    	try {
    
    		if (!$this->verificarEmail($dataUser['email'])) {
    			$idUser = $this->insert($dataUser);
    
    			if ($idUser > 0) {
    
    				//$this->sendWelcomeEmail($dataUser['email'], $dataUser['nome_completo'], $dataUser['senha']);
    				$user = $this->getByid($idUser);
    				unset($user['senha']);

    				return $user;
    			} else {
    				return array("error" => 'Erro ao inserir usuário');
    			}
    		} else {
    			
    			return array("error" => 'Email ja cadastrado!');
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function getByid($idConteudo) {
    
    	try {
    		$select = $this->select();
    		$select->where('dolphin.id = ?', $idConteudo);
    		$conteudo = $this->fetchAll($select)->toArray();
    
    		if (count($conteudo) > 0) {
    			return $conteudo;
    		} else {
    			return null;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    private function sendWelcomeEmail($email, $name, $password, $appName, $appEmail, $appLogo) {
    	try {
    		//enviar email
    		$html = new Zend_View();
    		$html->setScriptPath(APPLICATION_PATH . '/assets/templates/');
    
    		$html->assign('name', $name);
    		$html->assign('email', $email);
    		$html->assign('password', $password);
    
    		// criando objeto email
    		$mail = new Zend_Mail('utf-8');
    		// render view
    		$bodyText = $html->render('welcome.phtml');
    		// configurar envio
    		$mail->addTo($email);
    		$mail->setSubject('Bem-vindo ao ' . $appName);
    		$mail->setFrom($appEmail, $appName);
    		$mail->setBodyHtml($bodyText);
    		$mail->send();
    
    		return true;
    	} catch (Exception $e) {
    		mail('netoffdf@gmail.com', 'Exception no envio de email de boas vindas', $e->getMessage() . 'OrderID: ' . $idOrdered);
    		throw $e;
    	}
    }
    public function delete($id) {
    	try {
    
    		$where = $this->getAdapter()->quoteInto("id = $id");
    		$data = array('status' => 0);
    		$count = $this->update($data, $where);
    
    		return $count;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function save(array $data) {
    	try {
    
    		$id = $data['id'];
    		unset($data['id']);
    
    		$where = $this->getAdapter()->quoteInto('id = ?', $id);
    
    		$return = $this->update($data, $where);
    
    		if ($return > 0) {
    			$conteudo = $this->getByid($id);
    			return $conteudo;
    		} else {
    			return true;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }

}



