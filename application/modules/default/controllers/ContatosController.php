<?php

class Default_ContatosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	if ($this->_request->isPost()) {
    		
    		$nome = $this->_request->getPost('nome');
	        $email = $this->_request->getPost('email');
	        $telefone = $this->_request->getPost('telefone');
	        $mensagem = $this->_request->getPost('mensagem');
	        $assuntoId = (int)$this->_request->getPost('assunto');
	        $assunto="";
	        $emailEnvio ="";
	        
    		switch ($assuntoId){
    			case 1: {
    				$assunto = "Eventos";
    				$emailEnvio ="reservas.dolphinhotel@gmail.com";
    				break;
    			}
    			case 2: {
    				$assunto = "Orçamentos";
    				$emailEnvio ="reservas.dolphinhotel@gmail.com";
    				break;
    			}
    			case 3: {
    				$assunto = "Dúvidas";
    				$emailEnvio ="reservas.dolphinhotel@gmail.com";
    				break;
    			}
    			case 4: {
    				$assunto = "Reclamações";
    				$emailEnvio ="reservas.dolphinhotel@gmail.com";
    				break;
    			}
    			case 5: {
    				$assunto = "Sugestões";
    				$emailEnvio ="reservas.dolphinhotel@gmail.com";
    				break;
    			}
    			case 6: {
    				$assunto = "Pacotes";
    				$emailEnvio ="reservas.dolphinhotel@gmail.com";
    				break;
    			}
    			case 7: {
    				$assunto = "Trabalhe Conosco";
    				$emailEnvio ="reservas.dolphinhotel@gmail.com";
    				break;
    			}
    			default:
    				$assunto = "Outros";
    				$emailEnvio ="reservas.dolphinhotel@gmail.com";
    				break;    			
    		}
    	
    		
    		$html = new Zend_View();
    		$html->setScriptPath(APPLICATION_PATH . '/assets/templates/');
    		
    	
    		$html->assign('nome', $nome);
    		$html->assign('email', $email);
    		$html->assign('telefone', $telefone);
    		$html->assign('mensagem', $mensagem);
    		$html->assign('assunto', $assunto);
    			
    	
    		$mail = new Zend_Mail('utf-8');
    		$transport = new Zend_Mail_Transport_Sendmail();
    		 
    		// render view
    		$bodyText = $html->render('contatos.phtml');
    		// configurar envio
    		$mail->addTo($emailEnvio);
    	
    		$mail -> setReplyTo ( 'faleconosco@dolphinhotel.tur.br' ,  'Dolphin Hotel' );
    		$mail -> addHeader ( 'MIME-Version' ,  '1.0' );
    		$mail -> addHeader ( 'Content-Transfer-Encoding' ,  '8bit' );
    		$mail -> addHeader ( 'X-Mailer:' ,  'PHP/' . phpversion ());
    		
    		$mail->setSubject('Contato Dolphin Hotel - '.$assunto);
    		$mail->setFrom($emailEnvio, "Dolphin Hotel - Contato");
    	//	$mail->addCc("gardeniamontenegro2@hotmail.com","Dolphin Hotel - Gardenia");
    		$mail->setBodyHtml($bodyText);
    	
    		$mail->send($transport);
    		
    		$this->_redirect('/contatos/index');
    	}
    }
    


}

