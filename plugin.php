<?php
/*
Plugin Name: CAHNRS Department Overview
Plugin URI: http://cahnrs.wsu.edu/communications
Description: Store Department Data
Author: cahnrscommunications, Danial Bleile
Author URI: http://cahnrs.wsu.edu/communications
Version: 0.0.1
*/

class CAHNRSWP_Dept_Overview {
	
	/** @var object $instance Current instance */
	private static $instance;
	
	
	/**
	 * Get instance of forms finder
	 */
	public static function get_instance(){
		
		if ( null == self::$instance ){
			
			self::$instance = new self;
			
			self::$instance->init();
			
		} // end if
		
		return self::$instance;
		
	} // end get_instance
	
	
	private function init(){
		
		add_filter( 'template_include' , array( $this , 'filter_template_include' ), 99 );
		
	} // end init
	
	
	public function filter_template_include( $template ){
		
		if ( ! empty( $_POST['depto-ajax-request'] ) ){
			
			$template = plugin_dir_path( __FILE__ ) . '/ajax.php';
			
		}  else if ( ! empty( $_GET['dept-overview-editor'] ) ){
			
			$template = plugin_dir_path( __FILE__ ) . '/editor.php';
			
		} else if ( ! empty( $_GET['pdf-view'] ) ){
			
			$template = plugin_dir_path( __FILE__ ) . '/overview-pdf.php';
			
		} else if ( ! empty( $_GET['render-pdf'] ) ){
			
			$template = plugin_dir_path( __FILE__ ) . '/render-pdf.php';
			
		}// end if// end if
		
		return $template;
		
	} // end filter_template_include
	
} // end CAHNRSWP_Dept_Overview

CAHNRSWP_Dept_Overview::get_instance();
	