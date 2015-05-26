<?php

class Default_ReservasController extends Zend_Controller_Action
{

    public function init()
    {
    	
        $this->flashMessenger = $this->_helper->getHelper('FlashMessenger');
        $this->view->messages = $this->flashMessenger->getMessages();
        $this->_modelServico = new Default_Model_Servicos();
        $this->_modelPacote = new Default_Model_Tarifa();
        $this->_modelPacoteId = new Default_Model_Pacote();
    }

    public function indexAction()
    {
    	
        $checkin = $this->_request->getPost('checkin');
        $checkout = $this->_request->getPost('checkout');
        $pessoas = $this->_request->getPost('pessoas');
        $quartos = $this->_request->getPost('quartos');
        
        
        
        $servicos = $this->_modelServico->getAllTituloServico();        
        $servicos = ($servicos) ? $servicos : array();
      
       
        $passeios = $this->_modelServico->getAllTituloPasseio();
        $passeios = ($passeios) ? $passeios : array();
        
        $pacotes = $this->_modelPacote->getAllPacote();
        $pacotes = ($pacotes) ? $pacotes : array();
        
        $this->view->pacotes = $pacotes;
        
        $this->view->passeios = $passeios;
        $this->view->servicos = $servicos;
        $this->view->checkin = $checkin;
        $this->view->checkout = $checkout;
        $this->view->pessoas = $pessoas;
        $this->view->quartos = $quartos;
        
        
    }
    public function enviaremailAction(){
    	if ($this->_request->isPost()) {
    		$reserva = $this->_request->getPost('reserva');
    		$html = new Zend_View();
    		$html->setScriptPath(APPLICATION_PATH . '/assets/templates/');
    		
    		$checkin = '';
    		$checkout = '';
    		$nome = '';
    		$email = '';
    		$telefone = '';
    		$mensagem = '';
    		$pacote = '';
    		$data = '';
    		$servico = '';
    		$passeio = '';
    		$dataRetirada = '';
    		$dataDevolucao = '';
    		$carro = '';
    		$emailEnviar = '';
    		$assunto='';
    		
    		switch ($reserva){
    			case 1:{
    				$checkin = $this->_request->getPost('checkin');
    				$checkout = $this->_request->getPost('checkout');
    				$nome = $this->_request->getPost('nome');
    				$email = $this->_request->getPost('email');
    				$telefone = $this->_request->getPost('telefone');
    				$mensagem = $this->_request->getPost('mensagem');
    				$pacote = $this->_request->getPost('pacotes');
    				$pacote = $this->_modelPacoteId->getByid($pacote);
    				$pacote = $pacote[0]['titulo'];
    				$assunto = 'Pacotes';
    				
    				$html->assign('checkin', $checkin);
    				$html->assign('checkout', $checkout);
    				$html->assign('nome', $nome);
    				$html->assign('email', $email);
    				$html->assign('telefone', $telefone);
    				$html->assign('mensagem', $mensagem);
    				$html->assign('pacote', $pacote);
    				$html->assign('assunto', $assunto);
    				
    				$emailEnviar = 'faleconosco@dolphinhotel.tur.br';
    				break;
    			}
    			case 2:{
    				$data = $this->_request->getPost('data');
    				$nome = $this->_request->getPost('nome');
    				$email = $this->_request->getPost('email');
    				$telefone = $this->_request->getPost('telefone');
    				$mensagem = $this->_request->getPost('mensagem');
    				$servico = $this->_request->getPost('servicos');
    				$servico = $this->_modelServico->getByid($servico);
    				$servico = $servico[0]['titulo'];
    				$assunto = 'Serviços';
    				
    				$html->assign('data', $data);
    				$html->assign('nome', $nome);
    				$html->assign('email', $email);
    				$html->assign('telefone', $telefone);
    				$html->assign('mensagem', $mensagem);
    				$html->assign('servico', $servico);
    				$html->assign('assunto', $assunto);
    				
    				$emailEnviar = 'noronhaprime@gmail.com';
    				break;
    			}	
    			case 3:{
    				$data = $this->_request->getPost('data');
    				$nome = $this->_request->getPost('nome');
    				$email = $this->_request->getPost('email');
    				$telefone = $this->_request->getPost('telefone');
    				$mensagem = $this->_request->getPost('mensagem');
    				$passeio = $this->_request->getPost('passeios');
    				$passeio = $this->_modelServico->getByid($passeio);
    				$passeio = $passeio[0]['titulo'];
    				$assunto = 'Passeios';
    				
    				$html->assign('data', $data);
    				$html->assign('nome', $nome);
    				$html->assign('email', $email);
    				$html->assign('telefone', $telefone);
    				$html->assign('mensagem', $mensagem);
    				$html->assign('passeio', $passeio);
    				$html->assign('assunto', $assunto);
    				
    				$emailEnviar = 'noronhaprime@gmail.com';
    				break;
    			}	
    			case 4:{
    				$dataRetirada = $this->_request->getPost('dataRetirada');
    				$dataDevolucao = $this->_request->getPost('dataDevolucao');
    				$carro = $this->_request->getPost('carro');
    				$nome = $this->_request->getPost('nome');
    				$email = $this->_request->getPost('email');
    				$telefone = $this->_request->getPost('telefone');
    				$mensagem = $this->_request->getPost('mensagem');
    				$assunto = 'Aluguel 4x4';
    				
    				$html->assign('dataRetirada', $dataRetirada);
    				$html->assign('dataDevolucao', $dataDevolucao);
    				$html->assign('carro', $carro);
    				$html->assign('nome', $nome);
    				$html->assign('email', $email);
    				$html->assign('telefone', $telefone);
    				$html->assign('mensagem', $mensagem);
    				$html->assign('assunto', $assunto);
    				
    				$emailEnviar = 'falcao4x4@icloud.com';
    				break;
    			}
    			default:
    				$emailEnviar = 'faleconosco@dolphinhotel.tur.br';
    				break;
    		}
    		    
    		$mail = new Zend_Mail('utf-8');
    		$transport = new Zend_Mail_Transport_Sendmail();
    		
    		// render view
    		$bodyText = $html->render('reservas.phtml');
    		// configurar envio
    		$mail->addTo($emailEnviar);
    	
    		$mail -> setReplyTo ( 'faleconosco@dolphinhotel.tur.br' ,  'Dolphin Hotel' );
    		$mail -> addHeader ( 'MIME-Version' ,  '1.0' );
    		$mail -> addHeader ( 'Content-Transfer-Encoding' ,  '8bit' );
    		$mail -> addHeader ( 'X-Mailer:' ,  'PHP/' . phpversion ());
    		
    		$mail->setSubject('Reservas Dolphin Hotel');
    		$mail->setFrom($emailEnviar, "Dolphin Hotel - Reservas - $assunto");
    		//$mail->addCc("gardeniamontenegro2@hotmail.com","Dolphin Hotel");
    		//$mail->addCc("reservas.dolphinhotel@gmail.com","Dolphin Hotel");
    		$mail->setBodyHtml($bodyText);
    	
    		$mail->send($transport);
    		
    		
    		$this->_redirect('/reservas/index');
    	}
    }


}

