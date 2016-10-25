<?php
$people = array(
	'dpto_people_faculty'      => 'Faculty',
	'dpto_people_undergrad'    => 'Undergraduate<br/>students',
	'dpto_people_phd'          => 'PhD<br/>students',
	'dpto_people_rprofessors'  => 'Regents<br/>Professors',
	'dpto_people_staff'        => 'Staff',
	'dpto_people_masters'      => 'MS/MA<br/>students',
	'dpto_people_endowed'      => 'Endowed<br/>positions',
);
$set_people = array();
foreach( $people as $key => $label ){
	
	if ( $value = $this->get_option( $key ) ){
		
		$set_people[] = array( $value , $label );
		
	} // end if
};?>
<div class="dpto-table">
	<div class="dpto-table-row count-<?php echo count( $set_people );?>">
    	<?php foreach( $set_people as $set ):?>
        	<div class="dpto-table-cell">
            	<div class="people-count"><?php echo $set[0];?></div>
                <div class="people-label"><?php echo $set[1];?></div>
            </div>
    	<?php endforeach;?>
    </div>
</div>