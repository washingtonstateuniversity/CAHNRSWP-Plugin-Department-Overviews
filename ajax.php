<?php

require_once 'classes/class-dpto-editor.php'; 

$dpto = new DPTO_Editor();

if ( isset( $_POST['request-item'] ) ){
	
	$dpto->set_options_by_form();
	
	$item_id = sanitize_text_field( $_POST['request-item'] );
	
	echo $dpto->return_item_html( $item_id , true );
	
	die();
	
} // end if
