<?php wp_editor( $this->get_option('dpto_service_content') , 'dpto_service_content' , array( 'textarea_rows' => 12 ) );?>
<div class="row half-layout">
	<div class="column column-one">
    	<div class="field">
        	<label>Volunteers #</label>
            <input type="text" name="dpto_service_volunteers" value="<?php echo $this->get_option('dpto_service_volunteers');?>" />
        </div>
    </div>
    <div class="column column-two">
    	<div class="field">
        	<label>Volunteer Hours #</label>
            <input type="text" name="dpto_service_hours" value="<?php echo $this->get_option('dpto_service_hours');?>" />
        </div>
    </div>
</div>