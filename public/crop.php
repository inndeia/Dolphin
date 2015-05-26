<?php
if( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	include( 'm2brimagem.class.php' );
	$oImg = new m2brimagem( $_POST['img'] );
	print_r($_POST);
	if( $oImg->valida() == 'OK' )
	{
		$oImg->posicaoCrop( $_POST['x'], $_POST['y'] );
		$oImg->redimensiona( $_POST['w'], $_POST['h'], 'crop' );
		$oImg->grava( $_POST['img'] );
	}
}
