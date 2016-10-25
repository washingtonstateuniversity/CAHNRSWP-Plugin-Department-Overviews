<?php

$request_url = 'http://134.121.225.236/api/pdf/cahnrs-api-pdf/?';
	
$access_key = 'wT7oB64w0w0Tn12UyVOEB6XF7sMU48KN';

$filename = str_replace( array( '\'', ' ' , '&' ) , '-' , get_bloginfo( 'name' ) );

$source_url = get_bloginfo( 'url') . '?render-pdf=true';

$json = file_get_contents( $request_url . 'src=' . $source_url . '&filename=' . $filename . '&access-key=' . $access_key );
		
$pdf = json_decode( $json , true );

if ( ! empty( $pdf['file'] ) ){
			
	$output = file_get_contents( $pdf['file'] );
	
	header("Content-type: application/pdf");
	header('Content-disposition: inline;filename=' . $pdf['file_name'] );
	
	echo $output;
	
} // end if







