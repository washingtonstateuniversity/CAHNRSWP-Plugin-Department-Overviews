<?php
	$discovery = $this->get_option('dpto_research_discovery');
	if ( ! is_array( $discovery ) ) $discovery = array();
	
	$ch_labels = array( '2011','2012','2013','2014','2015');
	
	$trans = $this->get_option('dpto_research_transitional');
	if ( ! is_array( $trans ) ) $trans = array();
	
?>
<?php wp_editor( $this->get_option('dpto_research_content') , 'dpto_research_content' , array( 'textarea_rows' => 12 ) ); ?>
<div class="row fifths-layout">
	<div class="row-title">Discovery</div>
    <?php foreach( $ch_labels as $label ):?>
    <div class="column">
    	<div class="field">
        	<label><?php echo $label;?></label>
            <input type="text" name="dpto_research_discovery[<?php echo $label;?>]" value="<?php if ( ! empty( $discovery[ $label ] ) ) echo $discovery[ $label ]; ?>" />
        </div>
    </div>
    <?php endforeach;?>
</div>
<div class="row fifths-layout">
	<div class="row-title">Translational</div>
	<?php foreach( $ch_labels as $label ):?>
    <div class="column">
    	<div class="field">
        	<label><?php echo $label;?></label>
            <input type="text" name="dpto_research_transitional[<?php echo $label;?>]" value="<?php if ( ! empty( $trans[ $label ] ) ) echo $trans[ $label ]; ?>" />
        </div>
    </div>
    <?php endforeach;?>
</div>