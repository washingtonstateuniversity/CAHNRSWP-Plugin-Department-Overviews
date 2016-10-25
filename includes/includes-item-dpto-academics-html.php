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
<div id="item-dpto-academics" class="dpto-item">
	<?php if ( $this->do_check_options( array( 'dpto_academics_grad_ch','dpto_academics_undergrad_ch' ) ) ):?><div class="chart-wrapper"><canvas id="adcademics-chart" width="200" height="300"></canvas><strong>AY Student Credit Hours</strong></div><?php endif;?>
	<div class="list-header grad">Graduate</div>
    Master of Science/Art
    <ul>
    	<?php foreach( $grad_programs as $gp ): if ( ! empty( $gp ) ):?>
        	<li><?php echo $gp;?></li>
        <?php endif; endforeach;?>
    </ul>
    Doctor of Philosophy
    <ul>
    	<?php foreach( $phd_programs as $pdp ): if ( ! empty( $pdp ) ):?>
        	<li><?php echo $pdp;?></li>
        <?php endif; endforeach;?>
    </ul>
    <div class="list-header undergrad">Undergraduate</div>
	<ul>
    	<?php foreach( $undergrad_programs as $ugp ): if ( ! empty( $ugp ) ):?>
        	<li><?php echo $ugp;?></li>
        <?php endif; endforeach;?>
    </ul>
	
</div>
                        <?php if ( $grad_ch || $undergrad_ch ):?>
                            <script>
							var ctx = document.getElementById("adcademics-chart").getContext("2d");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["2011", "2012", "2013", "2014", "2015"],
        datasets: [{
            label: 'Graduate',
			data: [<?php echo implode( ',' , $grad_ch );?> ],
            //data: [12, 19, 3, 5, 2],
            backgroundColor: [
                '#b5babe',
                '#b5babe',
                '#b5babe',
                '#b5babe',
                '#b5babe'
            ]
        },{
            label: 'Undergraduate',
            data: [<?php echo implode( ',' , $undergrad_ch );?>],
            backgroundColor: [
                '#981e32',
                '#981e32',
                '#981e32',
                '#981e32',
                '#981e32'
            ]
        }
		]
    },
    options: {
		barThickness: 5,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
				stacked:true,
            }],
			xAxes: [{
          		stacked: true,
     		}],
        },
		legend: {
            display: false
         },
         tooltips: {
            enabled: false
         }
    }
});
</script>
<?php endif;?>