<?php
	require_once 'classes/class-dpto-editor.php'; 
	$dpto = new DPTO_Editor();
	$dpto->do_check_is_update();
	$dpto->do_set_options_by_wp();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?php echo plugin_dir_url(__FILE__); ?>js/Chart.bundle.js"></script>
<style>
body {
	margin: 0;
	padding: 40px 40px 160px 40px;
	font-family: Verdana, sans-serif;
	position: relative;
	box-sizing: border-box;
	overflow: hidden;
	font-size: 16px;
	position: relative;
	height: 1320px;
	width: 1010px;
	color: #333;
}

p {
	margin: 0;
	padding: 0 0 15px;
}

#dept-overview {
	padding-top: 18px;
}

#dept-overview > header {
	background-color: #981e32;
	color: #fff;
	font-size: 30px; 
	font-weight: bold;
	padding: 10px 20px;
	box-sizing: border-box;
	margin-bottom: 1rem;
	position: relative;
}

.row:after {
	content: '';
	display: block;
	clear: both;
}

.row-title {
	font-size: 0.9rem;
	font-weight: bold;
	padding: 0.5rem 1rem 0.25rem;
	color: #555;
}

.column {
	float: left;
	width: 50%;
	box-sizing: border-box;
}

.single-layout .column {
	float: none;
	width: 100%;
}

.half-layout .column-one { padding-right: 12px;}
.half-layout .column-two { padding-left: 12px;}

.fifths-layout .column { padding: 0 12px; width: 20%;}

.column-title {
	font-size: 0.9rem;
	font-weight: bold;
	padding: 0.5rem 0;
	color: #555;
}

.dpto-table {
	display: table;
	table-layout: fixed;
	width: 100%;
}

.dpto-table-row {
	display: table-row;
}

.dpto-table-cell {
	display: table-cell;
	border-left: 1px solid  #999;
	border-right: 1px solid  #999;
}

.dept-item {
	margin-bottom: 20px;
}

.dept-item.people-item {
	margin-bottom: 0;
}

.dept-item.people-item p {
	padding: 0;
	margin: 0;
}

.item-header-text {
	color: #981e32;
	font-size: 20px;
	padding-bottom: 8px;
}

.people-item .count-1 .dpto-table-cell {width: 100%;}
.people-item .count-2 .dpto-table-cell {width: 50%;}
.people-item .count-3 .dpto-table-cell {width: 33.33%;}
.people-item .count-4 .dpto-table-cell {width: 25%;}
.people-item .count-5 .dpto-table-cell {width: 20%;}
.people-item .count-6 .dpto-table-cell {width: 16.66%;}
.people-item .count-7 .dpto-table-cell {width: 14.28%;}

.people-item {
	position: absolute;
	bottom: 40px;
	left: 40px;
	right: 40px;
}

.people-item .people-count {
	background-color: #ccc;
	font-size: 1.4rem;
	text-align: center;
	padding: 0.75rem 0;
	margin: 0 3px;
}

.people-item .people-label {
	text-align: center;
	padding: 0.75rem 0;
	font-weight: bold;
	font-size: 11px;
}

.chart-wrapper {
	float: right;
	width: 150px;
	margin-left: 8px;
}

.chart-wrapper strong {
	display: block;
	text-align: center;
	font-size: 0.7rem;
	padding: 0 0.5rem;
}

.academics-item {
	margin-left: 1.2rem;
}

.chart-wrapper {
	float: right;
	width: 150px;
	margin-left: 8px;
}

.chart-wrapper strong {
	display: block;
	text-align: center;
	font-size: 0.7rem;
	padding: 0 0.5rem;
}

.academics-item .list-header {
	text-transform: uppercase;
	position: relative;
	padding-bottom: 4px;
}

.academics-item .list-header:before {
	content: '';
	position: absolute;
	top: 3px;
	left: -1.2rem;
	width: 0.75rem;
	height: 0.75rem;
	display: block;
	background-color: #b5babe; 
}

.academics-item .list-header.grad:before {
	background-color: #981e32;
}

.academics-item ul {
	margin-top: 0;
}

.academics-item ul li{
	padding-top: 6px;
}

.service-icon {
	width: 50%;
	float: left;
	color: #333;
	background-position: left center;
	background-size: 50px auto;
	background-repeat: no-repeat;
	padding-left: 60px;
	box-sizing: border-box;
}

.service-icon.vol-count {
	background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/icon-people.png);
}

.service-icon.vol-hours {
	background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/icon-clock.png);
}

.service-icon .title {
	font-size: 1.4rem;
}

.service-icon .subtitle {
	font-size: 0.70rem;
}

.service-icon-wrapper:after {
	content: '';
	clear: both;
	display: block;
}


/*body {
	background-color: #2a3033;
	margin: 0;
	padding: 0 0 6rem;
	font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
	position: relative;
	box-sizing: border-box;
	overflow-x: hidden;
	font-size: 13px;
}

body form > header {
	background-color: #2f5055;
	min-height: 60px;
	margin-bottom: 2rem;
	padding: 0 2rem;
	box-sizing: border-box;
}

body form > header #dept-editor-title{
	color: #ccc;
	font-size: 1.2rem;
	line-height: 60px;
	height: 60px;
}

body form > header > nav {
	position: absolute;
	top: 0;
	right: 2rem;
	border-right: 1px solid #555;
	border-left: 1px solid #333;
}

body form > header > nav:after {
	content: '';
	display: block;
	clear: both;
}

body form > header > nav input,
body form > header > nav a {
	float: left;
	display: block;
	height: 60px;
	line-height: 60px;
	padding: 0 2rem;
	color: #ccc;
	text-transform: uppercase;
	font-size: 1.2rem;
	outline: none;
	border: none;
	background-color: transparent;
	border-left: 1px solid #555;
	border-right: 1px solid #333;
	cursor: pointer;
}

#dept-overview {
	max-width: 800px;
	margin: 0 auto;
	background-color: #fff;
	min-height: 1050px;
	padding: 40px;
	box-sizing: border-box;
}

#dept-overview > header {
	background-color: #981e32;
	color: #fff;
	font-size: 30px; 
	font-weight: bold;
	padding: 10px 20px;
	box-sizing: border-box;
	margin-bottom: 1rem;
	position: relative;
}

.row:after {
	content: '';
	display: block;
	clear: both;
}

.row-title {
	font-size: 0.9rem;
	font-weight: bold;
	padding: 0.5rem 1rem 0.25rem;
	color: #555;
}

.column {
	float: left;
	width: 50%;
	box-sizing: border-box;
}

.single-layout .column {
	float: none;
	width: 100%;
}

.half-layout .column-one { padding-right: 0.5rem;}
.half-layout .column-two { padding-left: 0.5rem;}

.fifths-layout .column { padding: 0 0.5rem; width: 20%;}

.column-title {
	font-size: 0.9rem;
	font-weight: bold;
	padding: 0.5rem 0;
	color: #555;
}

#dept-overview .dept-editor-item {
	position: relative;
	margin-bottom: 1rem;
}

#dept-overview .dept-editor-item .item-header-text {
	color: #981e32;
	font-size: 16px;
}

#dept-overview .dept-editor-item .edit-item-action {
	position: relative;
	cursor: pointer
}

#dept-overview .dept-editor-item.active-item .edit-item-action:before {
	content: '';
	position: absolute;
	background-color: rgba(208,215,236,0.5);
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	border: 1px solid #7C7FB1;
	border-radius: 6px;
}

#dept-overview .dept-editor-item .edit-item-content {
	min-height: 2rem;
	border: 1px dashed #ccc;
	border-radius: 6px;
	padding: 6px;
	box-sizing: border-box;
}


#modal-bg {
	position: fixed;
	width: 100%;
	height: 100%;
	background-color: rgba( 0,0,0,0.8 );
	top: 0;
	left: 0;
	box-sizing: border-box;
	display: none;
}

.dpto-modal {
	position: absolute;
	width: 100%;
	left: 0;
	top: -9999rem;
	border: none;
	outline: none;
	box-sizing: border-box;
	margin: 0;
}

.dpto-modal.active-modal {
	top: 100px;
}


.dpto-modal .modal-frame {
	max-width: 600px;
	margin: 0 auto;
	background-color: #ddd;
	box-sizing: border-box;
	border: 1px solid #ccc;
	border-radius: 4px;
}

.dpto-modal .modal-frame > header {
	min-height: 40px;
	background-color: #464e54;
	color: #fff;
	line-height: 40px;
	padding: 0 1.5rem;
	box-sizing: border-box;
	position: relative;
}

.dpto-modal .modal-frame > header .close-modal-action {
	position: absolute;
	top: 0;
	right: 0;
	width: 40px;
	height: 40px;
}

.dpto-modal .modal-frame .modal-content {
	box-sizing: border-box;
	padding: 1rem 0 0;
}

.dpto-modal .modal-frame > footer {
	text-align: center;
	padding: 1rem 0;
}

.dpto-modal .modal-frame .column {
	padding-left: 1rem;
	padding-right: 1rem;
}

.dpto-button {
	display: inline-block;
	padding: 0.5rem 2rem;
	background-color: #3f6b72;
	color: #fff;
	text-decoration: none;
	text-transform: uppercase;
	font-size: 1rem;
	border-radius: 6px;
}

.field {
	padding: 0.5rem 0;
}

.field label {
	display: block;
	font-weight: bold;
	color: #555;
	font-size: 0.8rem;
}

.field.inline-label label {
	display: inline-block;
	padding-right: 1rem;
}

.field input[type="text"] {
	height: 30px;
	line-height: 30px;
	border: 1px solid #3f6b72;
	outline: none;
	text-indent: 8px;
	font-size: 1rem;
	color: #555;
	border-radius: 4px;
	width: 100%;
}

.field.short-input input[type="text"] {
	width: 70px;
}

.dpto-table {
	display: table;
	table-layout: fixed;
	width: 100%;
}

.dpto-table-row {
	display: table-row;
}

.dpto-table-cell {
	display: table-cell;
	border-left: 1px solid  #999;
	border-right: 1px solid  #999;
}

.people-item .count-1 .dpto-table-cell {width: 100%;}
.people-item .count-2 .dpto-table-cell {width: 50%;}
.people-item .count-3 .dpto-table-cell {width: 33.33%;}
.people-item .count-4 .dpto-table-cell {width: 25%;}
.people-item .count-5 .dpto-table-cell {width: 20%;}
.people-item .count-6 .dpto-table-cell {width: 16.66%;}
.people-item .count-7 .dpto-table-cell {width: 14.28%;}

.people-item .people-count {
	background-color: #ccc;
	font-size: 1.4rem;
	text-align: center;
	padding: 0.25rem 0;
	margin: 0 3px;
}

.people-item .people-label {
	text-align: center;
	padding: 0.25rem 0;
	font-weight: bold;
	font-size: 11px;
}

#item-dpto-academics {
	margin-left: 1.2rem;
}

.chart-wrapper {
	float: right;
	width: 150px;
	margin-left: 8px;
}

.chart-wrapper strong {
	display: block;
	text-align: center;
	font-size: 0.7rem;
	padding: 0 0.5rem;
}

#item-dpto-academics .list-header {
	text-transform: uppercase;
	position: relative;
}

#item-dpto-academics .list-header:before {
	content: '';
	position: absolute;
	top: 3px;
	left: -1.2rem;
	width: 0.75rem;
	height: 0.75rem;
	display: block;
	background-color: #b5babe; 
}

#item-dpto-academics .list-header.grad:before {
	background-color: #981e32;
}

#item-dpto-academics ul {
	margin-top: 0;
}

.service-icon {
	width: 50%;
	float: left;
	color: #333;
	background-position: left center;
	background-size: 50px auto;
	background-repeat: no-repeat;
	padding-left: 60px;
	box-sizing: border-box;
}

.service-icon.vol-count {
	background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/icon-people.png);
}

.service-icon.vol-hours {
	background-image: url(<?php echo plugin_dir_url(__FILE__); ?>images/icon-clock.png);
}

.service-icon .title {
	font-size: 1.4rem;
}

.service-icon .subtitle {
	font-size: 0.70rem;
}

.service-icon-wrapper:after {
	content: '';
	clear: both;
	display: block;
}*/

</style>
</head>

<body>
<div id="dept-overview" class="content-wrapper">
    <header>
        <div class="dept-title"><?php echo $dpto->get_option( 'dpto_title' );?></div>
    </header>
    <div class="inner-content">
        <div class="row half-layout">
            <div class="column column-one">
            	<div class="dept-item">
                    <?php echo $dpto->return_item_html( 'dpto-intro' );?>
                </div>
                <?php if ( $dpto->do_check_options( array('dpto_academics_pg_grad','dpto_academics_pg_phd','dpto_academics_pg_undergrad','dpto_academics_grad_ch' ) ) ):?>
                <div class="dept-item">
                    <div class="item-header-text">Academics</div>
                    <div class="academics-item">
                    <?php echo $dpto->return_item_html( 'dpto-academics' );?>
                    </div>
                </div>
                <?php endif;?>
                <?php if ( $dpto->do_check_options( array('dpto_research_content','dpto_research_discovery' ) ) ):?>
                <div class="dept-item">
                    <div class="item-header-text">Research: Discovery/Translational</div>
                    <?php echo $dpto->return_item_html( 'dpto-research' );?>
                </div>
                <?php endif;?>
            </div>
            <div class="column column-two">
            	<?php if ( $dpto->do_check_options( array('dpto_highlights_content' ) ) ):?>
            	<div class="dept-item">
                    <div class="item-header-text">Highlights</div>
                    <?php echo $dpto->return_item_html( 'dpto-highlights' );?>
                </div>
                <?php endif;?>
                <?php if ( $dpto->do_check_options( array('dpto_scholarship_content' ) ) ):?>
                <div class="dept-item">
                    <div class="item-header-text">Scholarship</div>
                    <?php echo $dpto->return_item_html( 'dpto-scholarship' );?>
                </div>
                <?php endif;?>
                <?php if ( $dpto->do_check_options( array('dpto_service_content','dpto_service_volunteers','dpto_service_hours' ) ) ):?>
                <div class="dept-item">
                    <div class="item-header-text">Service and Outreach</div>
                    <?php echo $dpto->return_item_html( 'dpto-service' );?>
                </div>
                <?php endif;?>
                <?php if ( $dpto->do_check_options( array('dpto_property_content' ) ) ):?>
                <div class="dept-item">
                    <div class="item-header-text">Intellectual Property & Commercialization</div>
                    <?php echo $dpto->return_item_html( 'dpto-property' );?>
                </div>
                <?php endif;?>
                <?php if ( $dpto->do_check_options( array( 'dpto_impacts_content' ) ) ):?>
                <div class="dept-item">
                    <div class="item-header-text">Impacts</div>
                    <?php echo $dpto->return_item_html( 'dpto-impacts' );?>
                </div>
                <?php endif;?>
                <?php if ( $dpto->do_check_options( array( 'dpto_facilities_content' ) ) ):?>
                 <div class="dept-item">
                    <div class="item-header-text">Facilities</div>
                    <?php echo $dpto->return_item_html( 'dpto-facilities' );?>
                </div>
                <?php endif;?>
            </div>
        </div>
        <div class="row single-layout">
            <div class="column column-one">
                <div class="dept-item people-item">
                    <div class="item-header-text">People</div>
                    <div href="#" class="edit-item-action edit-item-content" data-formid="dpto-people">
                    <?php echo $dpto->return_item_html( 'dpto-people' );?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
</body>
</html>

