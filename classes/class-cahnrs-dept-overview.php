<?php

class CAHNRS_Dept_Overview {
	
	private $slug = 'department_overview';
	
	
	public function get_slug(){ return $this->slug; }
	
	
	public function do_init(){
		
		add_action( 'init' , array( $this , 'do_register_post_type' ) );
		
	} // end do_init
	
	
	public function do_register_post_type(){
		
		$args = array(
		  	'public' => true,
		  	'label'  => 'Dept. Overviews'
		);
		
		register_post_type( $this->get_slug(), $args );
		
	} // end do_register_post_type

	
	
}