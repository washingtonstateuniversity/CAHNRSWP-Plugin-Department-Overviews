<div id="item-dpto-service" class="dpto-item">
	<?php echo apply_filters( 'the_content' , $this->get_option( 'dpto_service_content' ) ); ?>
    <div class="service-icon-wrapper">
    	<?php if ( $v = $this->get_option('dpto_service_volunteers') ):?>
    	<div class="service-icon vol-count">
        	<div class="title"><?php echo $v;?></div>
            <div class="subtitle">Volunteers</div>
        </div>
        <?php endif; if ( $h = $this->get_option('dpto_service_hours') ):?>
    	<div class="service-icon vol-hours">
        	<div class="title"><?php echo $h;?></div>
            <div class="subtitle">Volunteer Hours</div>
        </div>
        <?php endif;?>
    </div>
</div>