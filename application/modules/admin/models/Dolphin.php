<?php



class Admin_Model_Dolphin extends Zend_Db_Table_Abstract

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
    public function getByid($id) {
    	try {
    		$select = $this->select();
    		$select->where('dolphin.id = ?', $id);
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
    public function getByidgaleria($id) {
    
    	try {
    		
    		$select = $this->select()->from(array('d'=>'dolphin_galeria'))
    								->where('d.id = ?', $id)
    								->setIntegrityCheck(false);
    		
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
    public function getByidgaleriaestrutura($id) {
    
    	try {
    
    		$select = $this->select()->from(array('d'=>'dolphin_galeria_estrutura'))
    		->where('d.id = ?', $id)
    		->setIntegrityCheck(false);
    
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
    public function save(array $data, $imgAntiga = null, $imgAntigaVideo = null) {
    	try {
    
    		$id = $data['id'];
    		unset($data['id']);
    
    		$where = $this->getAdapter()->quoteInto('id = ?', $id);
    
    		$return = $this->update($data, $where);
    
    		if ($return > 0) {
    			if($imgAntiga != null){
    				unlink($imgAntiga);
    			}
    			if($imgAntigaVideo != null){
    				unlink($imgAntigaVideo);
    			}
    			$conteudo = $this->getByid($id);
    			return $conteudo;
    		} else {
    			return true;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function editGaleria(array $data, $imgAntiga = null, $imgAntigaVideo = null) {
    	try {
    		$_galeria = new Admin_Model_DolphinGaleria();
    		$id = $data['id'];
    		unset($data['id']);
    		
    		$where = $_galeria->getAdapter()->quoteInto('id = ?', $id);
    
    		$return = $_galeria->update($data, $where);
    
    		if ($return > 0) {
    			if($imgAntiga != null){
    				unlink($imgAntiga);
    			}
    			if($imgAntigaVideo != null){
    				unlink($imgAntigaVideo);
    			}
    			$conteudo = $this->getByidgaleria($id);
    			return $conteudo;
    		} else {
    			return true;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function editGaleriaEstrutura(array $data, $imgAntiga = null, $imgAntigaVideo = null) {
    	try {
    		$_galeria = new Admin_Model_DolphinGaleriaEstrutura();
    		$id = $data['id'];
    		unset($data['id']);
    
    		$where = $_galeria->getAdapter()->quoteInto('id = ?', $id);
    
    		$return = $_galeria->update($data, $where);
    
    		if ($return > 0) {
    			if($imgAntiga != null){
    				unlink($imgAntiga);
    			}
    			if($imgAntigaVideo != null){
    				unlink($imgAntigaVideo);
    			}
    			$conteudo = $this->getByidgaleriaestrutura($id);
    			return $conteudo;
    		} else {
    			return true;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    
    public function removerGaleria($id) {
    	try {
    		$_galeria = new Admin_Model_DolphinGaleria();
    		$item = $this->getByidgaleria($id);
    		
    		$where = $_galeria->getAdapter()->quoteInto('id =?', $id);
    		$count = $_galeria->update(array('imagem'=>'','imagem_video'=>'','video'=>''),$where);
    		if($count){
    			unlink($item[0]['imagem']);
    			unlink($item[0]['imagem_video']);    			
    		}
    
    		return $count;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function removerGaleriaEstrutura($id) {
    	try {
    		$_galeria = new Admin_Model_DolphinGaleriaEstrutura();
    		$item = $this->getByidgaleriaestrutura($id);
    
    		$where = $_galeria->getAdapter()->quoteInto('id =?', $id);
    		$count = $_galeria->update(array('imagem'=>'','imagem_video'=>'','video'=>''),$where);
    		if($count){
    			unlink($item[0]['imagem']);
    			unlink($item[0]['imagem_video']);
    		}
    
    		return $count;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }

}



