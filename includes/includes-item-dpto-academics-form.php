<?php
	$grad_programs = $this->get_option('dpto_academics_pg_grad');
	if ( ! is_array( $grad_programs ) ) $grad_programs = array();
	
	$phd_programs = $this->get_option('dpto_academics_pg_phd');
	if ( ! is_array( $phd_programs ) ) $phd_programs = array();
	
	$undergrad_programs = $this->get_option('dpto_academics_pg_undergrad');
	if ( ! is_array( $undergrad_programs ) ) $undergrad_programs = array();
	
	$grad_ch = $this->get_option('dpto_academics_grad_ch');
	if ( ! is_array( $grad_ch ) ) $grad_ch = array();
	
	$ch_labels = array( '2011','2012','2013','2014','2015');
	
	$undergrad_ch = $this->get_option('dpto_academics_undergrad_ch');
	if ( ! is_array( $undergrad_ch ) ) $undergrad_ch = array();
	
?>
<div class="row half-layout">
	<div class="column column-one">
        <div class="column-title">Master of Science/Art</div>
        <?php for ( $i = 0; $i < 4; $i++ ):?>
        <div class="field">
            <input type="text" name="dpto_academics_pg_grad[]" value="<?php if ( ! empty( $grad_programs[ $i ] ) ) echo $grad_programs[ $i ]; ?>" />
        </div>
        <?php endfor;?>
    	
        <div class="column-title">Doctor of Philosophy</div>
        <?php for ( $i = 0; $i < 3; $i++ ):?>
        <div class="field">
            <input type="text" name="dpto_academics_pg_phd[]" value="<?php if ( ! empty( $phd_programs[ $i ] ) ) echo $phd_programs[ $i ]; ?>" />
        </div>
        <?php endfor;?>
    </div>
    <div class="column column-two">
    	<div class="column-title">Undergraduate Education</div>
    	<?php for ( $i = 0; $i < 6; $i++ ):?>
        <div class="field">
            <input type="text" name="dpto_academics_pg_undergrad[]" value="<?php if ( ! empty( $undergrad_programs[ $i ] ) ) echo $undergrad_programs[ $i ]; ?>" />
        </div>
        <?php endfor;?>
    </div>
</div>
<div class="row-breaker"><hr/></div>
<div class="row fifths-layout">
	<div class="row-title">Graduate Credit Hours</div>
    <?php foreach( $ch_labels as $label ):?>
    <div class="column">
    	<div class="field">
        	<label><?php echo $label;?></label>
            <input type="text" name="dpto_academics_grad_ch[<?php echo $label;?>]" value="<?php if ( ! empty( $grad_ch[ $label ] ) ) echo $grad_ch[ $label ]; ?>" />
        </div>
    </div>
    <?php endforeach;?>
</div>
<div class="row fifths-layout">
	<div class="row-title">Undergraduate Credit Hours</div>
	<?php foreach( $ch_labels as $label ):?>
    <div class="column">
    	<div class="field">
        	<label><?php echo $label;?></label>
            <input type="text" name="dpto_academics_undergrad_ch[<?php echo $label;?>]" value="<?php if ( ! empty( $undergrad_ch[ $label ] ) ) echo $undergrad_ch[ $label ]; ?>" />
        </div>
    </div>
    <?php endforeach;?>
</div>