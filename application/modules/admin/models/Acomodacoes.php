<?php



class Admin_Model_Acomodacoes extends Zend_Db_Table_Abstract

{

    protected $_name = 'quarto';

    protected $_primary = 'ID';

    

    public function getConteudo($id) {
    	
    	try {
    		$select = $this->select()
    						->from(array('q'=>'quarto'),array('nome'=>'q.nome','id'=>'q.id'))
    						->join(array('c'=>'conteudo_quarto'), 'q.ID = c.id_quarto', array('descricao'=>'c.descricao','id_conteudo'=>'c.id'))
    						->where('q.ID=?', $id)
    						->setIntegrityCheck(false);
    
    		$conteudo = $this->fetchAll($select)->toArray();
    		
    		
    		return $conteudo;
    	} catch (Exception $e) {
    		
    		throw $e;
    	}
    }
    public function getGaleria($id) {
    	 
    	try {
    		$select = $this->select()
    		->from(array('q'=>'quarto'),array('nome'=>'q.nome','id'=>'q.id'))
    		->join(array('g'=>'galeria_quarto'), 'q.ID = g.id_quarto', array('imagem'=>'g.imagem','id_galeria'=>'g.id','destaque'=>'g.destaque','video'=>'g.video','imagem_video'=>'g.imagem_video'))
    		->where('q.ID=?', $id)
    		->setIntegrityCheck(false);
    
    		$conteudo = $this->fetchAll($select)->toArray();
    
    
    		return $conteudo;
    	} catch (Exception $e) {
    
    		throw $e;
    	}
    }
    public function getItem($id) {
    
    	try {
    		$select = $this->select()
    		->from(array('q'=>'quarto'),array('nome'=>'q.nome','id'=>'q.id'))
    		->join(array('i'=>'item_quarto'), 'q.ID = i.id_quarto', array('nome_item'=>'i.nome','id_item'=>'i.id'))
    		->where('q.ID=?', $id)
    		->setIntegrityCheck(false);
    
    		$conteudo = $this->fetchAll($select)->toArray();
    
    
    		return $conteudo;
    	} catch (Exception $e) {
    
    		throw $e;
    	}
    }
    public function getPreco($id) {


    	
    	try {
    		$select = $this->select()
    		->from(array('q'=>'quarto'),array('nome'=>'q.nome','id'=>'q.id'))
    		->join(array('p'=>'preco_quarto'), 'q.ID = p.id_quarto', array('estacao_baixa'=>'p.estacao_baixa',
    																		'mes_baixa'=>'p.mes_baixa',
    																		'dbl_baixa'=>'p.dbl_baixa',
    																		'tpl_baixa'=>'p.tpl_baixa',
    																		'id_preco'=>'p.id',
    																		'estacao_alta'=>'p.estacao_alta',
														    				'mes_alta'=>'p.mes_alta',
														    				'dbl_alta'=>'p.dbl_alta',
														    				'tpl_alta'=>'p.tpl_alta',
														    				'estacao_media'=>'p.estacao_media',
														    				'mes_media'=>'p.mes_media',
    																		'dbl_media'=>'p.dbl_media',
    																		'tpl_media'=>'p.tpl_media'))
    		->where('q.ID=?', $id)
    		->setIntegrityCheck(false);
    		$conteudo = $this->fetchAll($select)->toArray();
    
    
    		return $conteudo;
    	} catch (Exception $e) {
    
    		throw $e;
    	}
    }

    public function create($data) {
    	
    	try {
    			$id = $this->insert($data);
    			if ($id > 0) {
    
    				$item = $this->getByid($id);

    				return $item;
    			} else {
    				return array("error" => 'Erro ao inserir');
    			}
    		
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function getByidConteudo($idConteudo) {
    	try {
    		$select = $this->select()
    		->from(array('q'=>'quarto'),array('nome'=>'q.nome','id'=>'q.id'))
    		->join(array('c'=>'conteudo_quarto'), 'q.ID = c.id_quarto', array('descricao'=>'c.descricao','id_conteudo'=>'c.id'))
    		->where('c.id=?', $idConteudo)
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
    public function getByidgaleria($idGaleria) {
    	try {
    		$select = $this->select()
    		->from(array('q'=>'quarto'),array('nome'=>'q.nome','id'=>'q.id'))
    		->join(array('g'=>'galeria_quarto'), 'q.ID = g.id_quarto', array('imagem'=>'g.imagem','id_galeria'=>'g.id','destaque'=>'g.destaque','video'=>'g.video','imagem_video'=>'g.imagem_video'))
    		->where('g.id=?', $idGaleria)
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
    public function getByidpreco($id) {
    	try {
    		$select = $this->select()
    		->from(array('q'=>'quarto'),array('nome'=>'q.nome','id'=>'q.id'))
    		->join(array('p'=>'preco_quarto'), 'q.ID = p.id_quarto', array('estacao_baixa'=>'p.estacao_baixa',
    																		'mes_baixa'=>'p.mes_baixa',
    																		'dbl_baixa'=>'p.dbl_baixa',
    																		'tpl_baixa'=>'p.tpl_baixa',
    																		'id_preco'=>'p.id',
    																		'estacao_alta'=>'p.estacao_alta',
														    				'mes_alta'=>'p.mes_alta',
														    				'dbl_alta'=>'p.dbl_alta',
														    				'tpl_alta'=>'p.tpl_alta',
														    				'estacao_media'=>'p.estacao_media',
														    				'mes_media'=>'p.mes_media',
    																		'dbl_media'=>'p.dbl_media',
    																		'tpl_media'=>'p.tpl_media',
    																		'id_quarto'=>'p.id_quarto'))
    		->where('q.id=?', $id)
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
  
    public function remover($id) {
    	try {
    		$base = new Zend_Controller_Request_Http();  
    		
    		$item = $this->getByid($id);
    		$where = $this->getAdapter()->quoteInto("id = $id");
    		$count = $this->delete($where);
    		if($count){
    			unlink($item[0]['imagem']);
    		}
    
    		return $count;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function saveConteudo(array $data) {
    	try {
    		
    		$id = $data['id'];
    		unset($data['id']);
    		$cont = new Admin_Model_ConteudoQuarto();
    		$where = $cont->getAdapter()->quoteInto('id = ?', $id);
    
    		$return = $cont->update($data, $where);
    
    		if ($return > 0) {
    			$conteudo = $this->getByidConteudo($id);
    			return $conteudo;
    		} else {
    			return true;
    		}
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function saveItem($nome, $id) {
    	try {
    		$item = new Admin_Model_ItemQuarto();
    		$teste = $item->insert(array('nome'=>$nome,'id_quarto'=>$id)); 
    		
    		
    		return $teste;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function removerItem($id) {
    	try {
    		$item = new Admin_Model_ItemQuarto();
    		$where = $item->getAdapter()->quoteInto("id = ?",array('id'=>$id));
    		$count = $item->delete($where);
    
    		return $count;
    	} catch (Exception $e) {
    		throw $e;
    	}
    }
    public function editGaleria(array $data, $imgAntiga = null, $imgAntigaVideo = null) {
    	try {
    		$_galeria = new Admin_Model_GaleriaQuarto();
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
    
    public function editPreco(array $data) {
    	try {
    		$_preco = new Admin_Model_PrecoQuarto();
    		$id = $data['id'];
    		$idQuarto = $data['id_quarto'];
    		unset($data['id_quarto']);
    		unset($data['id']);
    
    		$where = $_preco->getAdapter()->quoteInto('id = ?', $id);
    
    		$return = $_preco->update($data, $where);
    
    		if ($return > 0) {
    			$conteudo = $this->getByidpreco($idQuarto);
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
    		$_galeria = new Admin_Model_GaleriaQuarto();
    		
    		$item = $this->getByidgaleria($id);
    		
    		$where = $_galeria->getAdapter()->quoteInto('id =?', $id);
    		$count = $_galeria->update(array('imagem'=>'','imagem_video'=>'','video'=>'','destaque'=>0),$where);
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



