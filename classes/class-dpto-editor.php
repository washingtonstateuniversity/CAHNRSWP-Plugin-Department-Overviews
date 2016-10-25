<?php

class DPTO_Editor {
	
	protected $options = array();
	protected $option_fields = array(
		'dpto_title'                  => 'text',
		'dpto_intro_content'          => 'html',
		'dpto_highlights_content'     => 'html',
		'dpto_scholarship_content'    => 'html',
		'dpto_service_content'        => 'html',
		'dpto_property_content'       => 'html',
		'dpto_impacts_content'        => 'html',
		'dpto_facilities_content'     => 'html',
		'dpto_research_content'       => 'html',
		'dpto_people_faculty'         => 'text',
		'dpto_people_undergrad'       => 'text',
		'dpto_people_phd'             => 'text',
		'dpto_people_rprofessors'     => 'text',
		'dpto_people_staff'           => 'text',
		'dpto_people_masters'         => 'text',
		'dpto_people_endowed'         => 'text',
		'dpto_service_volunteers'     => 'text',
		'dpto_service_hours'          => 'text',
		'dpto_academics_pg_grad'      => 'single-array-text',
		'dpto_academics_pg_phd'       => 'single-array-text',
		'dpto_academics_pg_undergrad' => 'single-array-text',
		'dpto_academics_grad_ch'      => 'single-array-text',
		'dpto_academics_undergrad_ch' => 'single-array-text',
		'dpto_research_discovery'     => 'single-array-text',
		'dpto_research_transitional'  => 'single-array-text',
	);
	
	
	public function get_options(){ return $this->options; }
	public function get_option( $key ) { return $this->return_option( $key ); }
	public function get_option_fields() { return $this->option_fields; }
	
	
	public function set_options( $options ) { $this->options = $options; }
	
	
	public function set_options_by_form(){
		
		$options = $this->return_clean_options();
		
		$this->set_options( $options );
		
	} // end set_options_by_form
	
	
	public function do_set_options_by_wp(){
		
		$options = $this->return_wp_options();
		
		$this->set_options( $options );
		
	} // end set_options_by_wp
	
	
	public function do_check_is_update(){
		
		if ( isset( $_POST['do-update'] ) ){
			
			$options = $this->return_clean_options();
			
			$this->set_options( $options );
			
			$this->do_save();
			
			return true;
			
		} // end if
		
		return false;
		
	} // end do_check_is_update
	
	
	public function do_save(){
		
		$options = $this->get_option_fields();
		
		foreach( $options as $option_key => $type ){
			
			update_option( $option_key , $this->get_option( $option_key ) );
			
		} // end foreach
		
	} // end do_save
	
	public function return_wp_options(){
		
		$options = array();
		
		$option_fields = $this->get_option_fields();
		
		foreach( $option_fields as $option_key => $type ){
			
			$options[ $option_key ] = get_option( $option_key , '' );
			
		} // end foreach
		
		return $options;
		
	} // end return_wp_options
	
	
	public function return_modal_html( $modal_id , $modal_content, $do_update = 'do-update' ){
		
		include plugin_dir_path( dirname( __FILE__ ) ) . '/includes/include-modal.php';
		
	} // end return_modal_html
	
	
	public function return_item_html( $item_id ){
		
		$plugin_url = plugin_dir_path( dirname( __FILE__ ) );
		
		switch ( $item_id ){
			
			case 'dpto-intro':
				$content = $this->get_option( 'dpto_intro_content' );
				$html = apply_filters( 'the_content' , $content );
				break;
			case 'dpto-academics':
				ob_start();
				include $plugin_url . '/includes/includes-item-dpto-academics-html.php';
				$html = ob_get_clean();
				break;
			case 'dpto-research':
				ob_start();
				include $plugin_url . '/includes/includes-item-dpto-research-html.php';
				$html = ob_get_clean();
				break;
			case 'dpto-highlights':
				$content = $this->get_option( 'dpto_highlights_content' );
				$html = apply_filters( 'the_content' , $content );
				break;
			case 'dpto-scholarship':
				$content = $this->get_option( 'dpto_scholarship_content' );
				$html = apply_filters( 'the_content' , $content );
				break;
			case 'dpto-service':
				ob_start();
				include $plugin_url . '/includes/includes-item-dpto-service-html.php';
				$html = ob_get_clean();
				break;
			case 'dpto-property':
				$content = $this->get_option( 'dpto_property_content' );
				$html = apply_filters( 'the_content' , $content );
				break;
			case 'dpto-impacts':
				$content = $this->get_option( 'dpto_impacts_content' );
				$html = apply_filters( 'the_content' , $content );
				break;
			case 'dpto-facilities':
				$content = $this->get_option( 'dpto_facilities_content' );
				$html = apply_filters( 'the_content' , $content );
				break;
			case 'dpto-people':
				ob_start();
				include $plugin_url . '/includes/includes-item-dpto-people-html.php';
				$html = ob_get_clean();
				break;
			default:
				$html = '';
				break;
		}
		
		return $html;
		
	} // end build item
	
	
	public function return_modal_form( $modal_id , $do_wrap = true ){
		
		$plugin_url = plugin_dir_path( dirname( __FILE__ ) );
		
		ob_start();
		
		switch ( $modal_id ){
			
			case 'dpto-intro':
				wp_editor( $this->get_option('dpto_intro_content') , 'dpto_intro_content' , array( 'textarea_rows' => 12 ) );
				break;
			case 'dpto-academics':
				include $plugin_url . '/includes/includes-item-dpto-academics-form.php';
				break;
			case 'dpto-research':
				include $plugin_url . '/includes/includes-item-dpto-research-form.php';
				break;
			case 'dpto-highlights':
				wp_editor( $this->get_option('dpto_highlights_content') , 'dpto_highlights_content' , array( 'textarea_rows' => 12 ) );
				break;
			case 'dpto-scholarship':
				wp_editor( $this->get_option('dpto_scholarship_content') , 'dpto_scholarship_content' , array( 'textarea_rows' => 12 ) );
				break;
			case 'dpto-service':
				include $plugin_url . '/includes/includes-item-dpto-service-form.php';
				break;
			case 'dpto-property':
				wp_editor( $this->get_option('dpto_property_content') , 'dpto_property_content' , array( 'textarea_rows' => 12 ) );
				break;
			case 'dpto-impacts':
				wp_editor( $this->get_option('dpto_impacts_content') , 'dpto_impacts_content' , array( 'textarea_rows' => 12 ) );
				break;
			case 'dpto-facilities':
				wp_editor( $this->get_option('dpto_facilities_content') , 'dpto_facilities_content' , array( 'textarea_rows' => 12 ) );
				break;
			case 'dpto-people':
				include $plugin_url . '/includes/includes-item-dpto-people-form.php';
				break;
			default:
				$html = '';
				break;
		}
		
		$html = ob_get_clean();
		
		if ( $do_wrap ){
			
			$html = $this->return_modal_html( $modal_id , $html );
			
		} // end if
		
		return $html;
		
		
	} // end return_modal_form
	
	
	private function return_option( $key ){
		
		$options = $this->get_options();
		
		if ( array_key_exists( $key , $options ) ){
			
			return $options[ $key ];
			
		}  // end if
		
		return '';
		
	} // end return_option
	
	
	public function return_fields_by_type(){
		
		$option_fields = $this->get_option_fields();
		
		$field_types = array();
		
		foreach( $option_fields as $field => $type ){
			
			if ( empty( $field_types[ $type ] ) ) $field_types[ $type ] = array();
			
			$field_types[ $type ][] = $field;
			
		} // end foreach
		
		return $field_types;
		
	}
	
	
	public function return_clean_options(){
		
		$clean = array();
		
		$fields = $this->return_fields_by_type();
		
		if ( ! empty( $fields['text'] ) ){
			
			foreach( $fields['text'] as $text_field ){
				
				if ( isset( $_POST[ $text_field ] ) ) $clean[ $text_field ] = sanitize_text_field( $_POST[ $text_field ] );
				
			} // end foreach
			
		} // end if
		
		if ( ! empty( $fields['single-array-text'] ) ){
			
			foreach( $fields['single-array-text'] as $text_field ){
				
				if ( isset( $_POST[ $text_field ] ) ) $clean[ $text_field ] = $_POST[ $text_field ];
				
			} // end foreach
			
		} // end if
		
		if ( ! empty( $fields['html'] ) ){
			
			foreach( $fields['html'] as $text_field ){
				
				if ( isset( $_POST[ $text_field ] ) ) $clean[ $text_field ] = wp_kses_post( $_POST[ $text_field ] );
				
			} // end foreach
			
		} // end if
		
		/*if ( isset( $_POST['dpto_intro_content'] ) ) $clean['dpto_intro_content'] = wp_kses_post( $_POST['dpto_intro_content'] );
		
		if ( isset( $_POST['dpto_highlights_content'] ) ) $clean['dpto_highlights_content'] = wp_kses_post( $_POST['dpto_highlights_content'] );
		
		if ( isset( $_POST['dpto_scholarship_content'] ) ) $clean['dpto_scholarship_content'] = wp_kses_post( $_POST['dpto_scholarship_content'] );
		
		if ( isset( $_POST['dpto_service_content'] ) ) $clean['dpto_service_content'] = wp_kses_post( $_POST['dpto_service_content'] );
		
		if ( isset( $_POST['dpto_property_content'] ) ) $clean['dpto_property_content'] = wp_kses_post( $_POST['dpto_property_content'] );
		
		if ( isset( $_POST['dpto_impacts_content'] ) ) $clean['dpto_impacts_content'] = wp_kses_post( $_POST['dpto_impacts_content'] );
		
		if ( isset( $_POST['dpto_facilities_content'] ) ) $clean['dpto_facilities_content'] = wp_kses_post( $_POST['dpto_facilities_content'] );*/
		
		return $clean;
		
		
	} // end clean_options
	
	
}