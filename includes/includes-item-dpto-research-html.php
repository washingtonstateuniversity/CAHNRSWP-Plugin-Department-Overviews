<?php
	
	$discovery = $this->get_option('dpto_research_discovery');
	if ( ! is_array( $discovery ) ) $discovery = array();
	
	$ch_labels = array( '2011','2012','2013','2014','2015');
	
	$trans = $this->get_option('dpto_research_transitional');
	if ( ! is_array( $trans ) ) $trans = array();
	 
?>
<div id="item-dpto-research" class="dpto-item">
	<?php if ( $discovery || $trans ):?><div class="chart-wrapper"><canvas id="research-chart" width="200" height="300"></canvas><strong>Expenditures</strong></div><?php endif;?>
    <?php echo apply_filters( 'the_content' , $this->get_option( 'dpto_research_content' ) ); ?>
</div>
                        <?php if ( $discovery || $trans ):?>
                            <script>
							Chart.defaults.global.legend.position = 'bottom';
							Chart.defaults.global.legend.labels.boxWidth = 10;
							var ctx = document.getElementById("research-chart").getContext("2d");
var researchChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["2011", "2012", "2013", "2014", "2015"],
        datasets: [{
            label: 'Discovery',
			data: [<?php echo implode( ',' , $discovery );?> ],
            //data: [12, 19, 3, 5, 2],
            backgroundColor: [
                '#b5babe',
                '#b5babe',
                '#b5babe',
                '#b5babe',
                '#b5babe'
            ]
        },{
            label: 'Translational',
            data: [<?php echo implode( ',' , $trans );?>],
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
    }
});
</script>
<?php endif;?>