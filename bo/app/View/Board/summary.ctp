<div class="row">
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Monthly report</h3>
        </div>
        <div class="box-body">
          <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
  </div>
  <div class="col-md-8">
  	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Last 12 months</h3>
        </div>
        <div class="box-body">
          <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
  </div>
  <div class="col-md-12">
  	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Daily reservations</h3>
        </div>
        <div class="box-body">
          <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
  </div>
  <div class="col-md-12">
  	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Daily sales</h3>
        </div>
        <div class="box-body">
          <div class="box-body chart-responsive">
              <div class="chart" id="bar2-chart" style="height: 300px;"></div>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
  </div>
  <div class="col-md-12">
  	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Monthly growth</h3>
        </div>
        <div class="box-body">
          <div class="box-body chart-responsive">
              <div class="chart" id="revenue-chart" style="height: 300px;"></div>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
  </div>
</div>
<script type="text/javascript">
	$(function () {
	    "use strict";
	    $.get( "graph/2", function( data ) {
            data = $.parseJSON(data);
            //DONUT CHART
		    var donut = new Morris.Donut({
		      element: 'sales-chart',
		      resize: true,
		      colors: [ "#3c8dbc", "#00a65a", "#DDDF00", "#f56954" ],
		      data: data,
		      hideHover: 'auto'
		    });
        });

        $.get( "graph/3", function( data ) {
            data = $.parseJSON(data);
		
		    // LINE CHART
		    var line = new Morris.Area({
		      element: 'line-chart',
		      resize: true,
		      data: data,
		      xkey: 'y',
		      ykeys: ['item1'],
		      labels: ['Chiffre d\'affaire'],
		      lineColors: ['#3c8dbc'],
		      hideHover: 'auto'
		    });
        });

        $.get( "graph/4", function( data ) {
            data = $.parseJSON(data);

		    //BAR CHART
		    var bar = new Morris.Bar({
		      element: 'bar-chart',
		      resize: true,
		      stacked: true,
		      data: data.count,
		      barColors: ["#3c8dbc", "#00a65a", "#DDDF00", "#f56954"],
		      xkey: 'y',
		      ykeys: ['isseud', 'paid', 'pending'],
		      labels: ['ISSUED', 'PAID', 'PENDING'],
		      hideHover: 'auto'
		    });
		    //BAR CHART
		    var bar = new Morris.Bar({
		      element: 'bar2-chart',
		      resize: true,
		      stacked: true,
		      data: data.sales,
		      barColors: ["#3c8dbc", "#00a65a", "#DDDF00", "#f56954"],
		      xkey: 'y',
		      ykeys: ['ca_isseud', 'ca_paid', 'ca_pending'],
		      labels: ['ISSUED', 'PAID', 'PENDING'],
		      hideHover: 'auto'
		    });
        });

        $.get( "graph/6", function( data ) {
            data = $.parseJSON(data);
            console.log(data);
		    // AREA CHART
		    var area = new Morris.Line({
		      element: 'revenue-chart',
		      resize: true,
		      data: data,
		      xLabels: 'month',
		      xkey: 'y',
		      ykeys: ['item1', 'item2'],
		      labels: ['This Year', 'Last Year'],
		      lineColors: ['#00a65a', '#f56954'],
		      hideHover: 'auto'
		    });
		});
    });
</script>
<?php /* ?>
<div class="pageContentContainer clearfix">
    <!-- Content -->
    <div class="rightNavContent" style="margin-left: 0;padding-left: 0;width: 100%;">
        <div id="listeDiv">
            <div id="nowDealsSummary">
                <div id="nowSalesAndEarnings" style="padding-left: 10px;padding-top: 25px;width: 1060px;margin:auto">
                    <div class="clearfix">
                <div class="grid_12">
                    <div class="module" id="dashboardDailyDeals">
                        <div class="moduleHeader">Monthly report</div>
                        <div class="moduleContent" style="    height: 259px;">
                            <div class="clearfix">
                                <div class="summaryStat centered">
                                    <div class="value" id="dashSold"></div>
                                    sold
                                </div>
                                <div class="summaryStat centered">
                                    <div class="value" id="dashEarned"></div>
                                    earned
                                </div>
                                <div id="piechart" style="width: 365px; height: 250px;padding-top: 50px;"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="grid_19">
                    <div class="module minHeight320" id="dashboardNowDeals">
                        <div class="moduleHeader">Last 12 months</div>
                        <div class="moduleContent">
                            <div class="clearfix">
                                <div id="chart_div" style="width: 600px; height: 250px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="grid_24" style="    width: 1034px;">
                    <div class="module minHeight320" id="dashboardNowDeals">
                        <div class="moduleHeader">Daily reservations </div>
                        <div class="moduleContent">
                            <div class="clearfix">
                                <div id="chart_div2" style="width: 100%; height: 250px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid_24" style="    width: 1034px;">
                    <div class="module minHeight320" id="dashboardNowDeals">
                        <div class="moduleHeader"> Daily sales</div>
                        <div class="moduleContent">
                            <div class="clearfix">
                                <div id="chart_div3" style="width: 100%; height: 250px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid_24" style="    width: 1034px;">
	                <div class="module minHeight320" id="">
	                    <div class="moduleHeader"> Monthly sales</div>
	                    <div class="moduleContent">
	                        <div class="clearfix">
	                            <div id="chart_div4" style="width: 100%; height: 250px;"></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="grid_24" style="    width: 1034px;">
	                <div class="module minHeight320" id="">
	                    <div class="moduleHeader"> Average order value</div>
	                    <div class="moduleContent">
	                        <div class="clearfix">
	                            <div id="chart_div5" style="width: 100%; height: 250px;"></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="grid_24" style="    width: 1034px;">
	                <div class="module minHeight320" id="">
	                    <div class="moduleHeader"> Monthly growth</div>
	                    <div class="moduleContent">
	                        <div class="clearfix">
	                            <div id="chart_div6" style="width: 100%; height: 250px;"></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
            </div>
                </div>
            </div>
        </div>
   
    </div>
</div>
<?php /* ?>
<?php //echo $this->Html->script(array('lib/highcharts')); ?>
    <script type="text/javascript">
        
        

		$.get( "graph/1", function( data ) {
            data = $.parseJSON(data);

            $('#dashSold').html(data.lastCa[0]['count']);

            $('#dashEarned').html(data.lastCa[0]['CA'] + ' DH');

        });

        $.get( "graph/2", function( data ) {
            data = $.parseJSON(data);

            $('#piechart').highcharts({
				colors : [ '#50B432', '#058DC7', '#DDDF00', '#ED561B', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4' ],
				chart : {
					plotBackgroundColor : null,
					plotBorderWidth : null,
					plotShadow : false,
					margin : [ 0, 0, 0, 0 ],
					height : 210
				},
				title : {
					text : ''
				},
				tooltip : {
					pointFormat : '{series.name}: <b>{point.y}</b>'
				},
				plotOptions : {
					pie : {
						dataLabels : {
							enabled : true,
							distance : -40,
							style : {
								fontWeight : 'bold',
								color : 'white',
								textShadow : '0px 1px 2px black'
							}
						}
					}
				},
				series : [ {
					type : 'pie',
					name : 'Value',
					data : eval(data.status)
				} ]
			});

        });

        $.get( "graph/3", function( data ) {
            data = $.parseJSON(data);

            $('#chart_div').highcharts({
				chart: {
					type: 'area'
				},
				title: {
					text: ''
				},
				tooltip : {
					pointFormat : '{series.name}: <b>{point.y} DH</b>'
				},
				legend: {
					enabled: false
				},
				xAxis: {
					categories: eval(data.status2_d)
				},
				plotOptions: {
					area: {
						fillOpacity: 0.5
					}
				},
				credits: {
					enabled: false
				},
				series: [{
					name: 'Sales',
					data: eval(data.status2)
				}]
			});

        });

        $.get( "graph/4", function( data ) {
            data = $.parseJSON(data);

            $('#chart_div2').highcharts({
				colors: ['#50B432', '#ED561B', '#058DC7', '#DDDF00',  '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
				chart: {
					type: 'column'
				},
				title: {
					text: ''
				},
				xAxis: {
					categories: eval(data.datestatus3)
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Reservations'
					},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						}
					}
				},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y}</b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: false,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
						}
					}
				},
				series: [{
							name: 'PAID',
							data: eval(data.status3)
				
						},
						{
							name: 'CANCELED',
							data: eval(data.status33)
				
						},
						{
							name: 'ISSUED',
							data: eval(data.status32)
				
						},
						{
							name: 'PENDING',
							data: eval(data.status31)
				
						}
						]
			});

        });

        $.get( "graph/5", function( data ) {
            data = $.parseJSON(data);

            $('#chart_div3').highcharts({
				colors: ['#50B432', '#ED561B', '#058DC7', '#DDDF00',  '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
				chart: {
					type: 'column'
				},
				title: {
					text: ''
				},
				xAxis: {
					categories: eval(data.datestatus4)
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Sales'
					},
					stackLabels: {
						enabled: true,
						style: {
							//fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						},
						formatter: function() {
							return Math.round((this.total / 1000)) + 'k' ;
						}
					}
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.x +'</b><br/>'+
							this.series.name +': '+ this.y +'<br/>'+
							'Total: '+ this.point.stackTotal;
					}
				},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: false,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
						}
					}
				},
				series: [{
							name: 'PAID',
							data: eval(data.status4)
				
						},
						{
							name: 'CANCELED',
							data: eval(data.status7)
				
						},
						{
							name: 'ISSUED',
							data: eval(data.status6)
				
						},
						{
							name: 'PENDING',
							data: eval(data.status5)
				
						}
						]
			});

			$('#chart_div5').highcharts({
				colors: ['#058DC7'],
				chart: {
					type: 'column'
				},
				title: {
					text: ''
				},
				xAxis: {
					categories: eval(data.average_order_value_x)
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Sales'
					},
					stackLabels: {
						enabled: true,
						style: {
							//fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						},
						formatter: function() {
							return Math.round((this.total / 1000) * 10) / 10 + 'k' ;
						}
					}
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.x +'</b><br/>'+
							this.series.name +': '+ this.y +'<br/>'+
							'Total: '+ this.point.stackTotal;
					}
				},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: false,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
						}
					}
				},
				series: [{
							name: 'Average order value',
							data: eval(data.average_order_value_y)					
						}]
			});

        });

        $.get( "graph/6", function( data ) {
            data = $.parseJSON(data);

            $('#chart_div4').highcharts({
				colors: ['#50B432'],
				chart: {
					type: 'column'
				},
				title: {
					text: ''
				},
				xAxis: {
					categories: eval(data.monthly_sales_y)
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Sales'
					},
					stackLabels: {
						enabled: true,
						style: {
							//fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						},
						formatter: function() {
							return Math.round((this.total / 1000000) * 100) / 100 + 'M' ;
						}
					}
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.x +'</b><br/>'+
							this.series.name +': '+ this.y +'<br/>'+
							'Total: '+ this.point.stackTotal;
					}
				},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: false,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
						}
					}
				},
				series: [{
							name: 'ISSUED',
							data: eval(data.monthly_sales_x)					
						}]
			});

			$('#chart_div6').highcharts({
				colors: ['#50B432','#ED561B'],
				chart: {
					type: 'area'
				},
				title: {
					text: ''
				},
				xAxis: {
					categories: eval(data.monthly_sales_y)
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Growth'
					},
					stackLabels: {
						enabled: true,
						style: {
							//fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						},
						formatter: function() {
							return Math.round((this.total / 1000000) * 100) / 100 + 'M' ;
						}
					}
				},
				tooltip: {
		            shared: true,
		            valueSuffix: ' DH',
					// formatter: function() {
					// 	console.log(this.points);
					// }
		        },
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: false,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
						}
					}
				},
				series: [{
							name: 'This Year',
							data: eval(data.monthly_sales_x)					
						},
						{
							name: 'Last Year',
							data: eval(data.monthly_sales_z)					
						}]
			});

        });
       
      
     
      
    </script>

<?php */ ?>