<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body padding-top">


		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-6" align="left">
			   <h3>Dashboard</h3>
	   	   </div>
			<div class="col-md-6" align="right">
			   <h3 id="countdown_timer"></h3>
	   	   </div>		   
		</div>
		
		<div class="row">
			 <div class="col-lg-8">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <a href="<?php echo base_url().SITE_ADMIN_URI.'/users'; ?>">
                     <div class="card blue summary-inline">
                         <div class="card-body">
                             <i class="icon fa fa-users fa-4x"></i>
                             <div class="content">
                                 <div class="title"><?php echo $total_users; ?></div>
                                 <div class="sub-title"><h5>Total Registered Users</h5></div>
                             </div>
                             <div class="clear-both"></div>
                         </div>
                     </div>
                 </a>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <?php 
                    $order_url = base_url().SITE_ADMIN_URI.'/orders';
                    //$order_url = '#';
                ?>
                 <a href="#">
                     <div class="card blue summary-inline">
                         <div class="card-body">
							 <i class="icon fa fa-shopping-cart fa-4x"></i>
                             <div class="content">
                                 <div class="title"><?php echo $total_orders; ?></div>
                                 <div class="sub-title"><h5>Total Orders</h5></div>
                             </div>
                             <div class="clear-both"></div>
                         </div>
                     </div>
                 </a>
              </div>
			 </div>
		</div>

        <div class="clearfix"></div>

  		

          <div class="clearfix"></div>
		   
          <div class="row">
			
			<div id="container" style="width: 75%;">
				<canvas id="canvas"></canvas>
			</div>

        

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Latest Orders
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>                                       
                                        <th>Order ID</th>
										 <th>Store Name</th>
										 <th>GSTIN</th>
                                        <th>Grand Total</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($latest_orders)){ ?>
                                    <?php $count = 0; ?>
                                    <?php foreach($latest_orders as $orders){ ?>
                                    <tr>
                                        <td><?php echo ++$count; ?></td>
                                        <td><?php echo $orders['order_id']; ?></td>
                                        <td><?php echo $orders['store_name']; ?></td>
                                        <td><?php echo $orders['gstin']; ?></td>
                                        <td><?php echo '$'.$orders['grand_total']; ?></td>
                                        <td>
                                        
                                        <?php 
				echo date( ADMIN_DATE_FORMAT, strtotime($orders['created']));?>
                                       </td>
                                    </tr>
                                    <?php } ?>
                                    <?php }else{ ?>
                                        <tr>No Orders Booked Yet</tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->

        </div>
        <!-- Row End -->

						      
    </div>
</div>

<script>
	function startTime() {
		var today = new Date();
		var date = today.getDate();
		var month = today.getMonth()+1;
		var year = today.getFullYear();
		date = checkTime(date);
		month = checkTime(month);
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
		var ampm = h >= 12 ? 'PM' : 'AM';
		var hours = h % 12;
		hours = hours ? hours : 12; // the hour '0' should be '12'
		//var minutes = m < 10 ? '0'+m : m;
		hours = checkTime(hours);
		m = checkTime(m);
		s = checkTime(s);
		document.getElementById('countdown_timer').innerHTML =
		date + "/" + month + "/" + year + " " + hours + ":" + m + ":" + s + " " + ampm;
		//var t = setTimeout(startTime, 500);
	}
	function checkTime(i) {
		if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		return i;
	}
	setInterval(startTime, 500);
	
	jQuery(document).ready(function(){
		
		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var color = Chart.helpers.color;
		var barChartData = {
			
			labels: [<?php echo $months; ?>],
			datasets: [{
				label: 'Sales',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [<?php echo implode(",",$sales_amount_chart); ?>]
			}, {
				label: 'Purchase',
				backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
				borderColor: window.chartColors.blue,
				borderWidth: 1,
				data: [<?php echo implode(",",$purchase_amount_chart); ?>]
			}]

		};

		
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: 'Chart.js Bar Chart'
					}
				}
			});

	});

		

		

		

		

		
	
</script>
    


