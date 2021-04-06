<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body padding-top">


		<div class="clearfix"></div>

		<div class="row">
		   <div class="col-md-12">
			   <h3 class="text-center">Dashboard</h3>
	   	   </div>
		</div>
		
		<div class="row">
			 <div class="col-lg-6">
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
                 <a href="<?php echo $order_url; ?>">
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

  		<div class="row">
			
			  <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Statistics
                    </div>
				</div>
				 <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Type</th>
                                        <th>Total Sold Qty</th>
                                        <th>Today Sold Qty</th>
                                        <th>Today Revenue</th>
                                        <th>Yesterday Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
										<td>1</td>
										<td>Cs Handbook ($<?php echo $price_cs_handbook; ?>)</td>
										<td><?php echo $total_cs_handbook; ?></td>
										<td><?php echo $today_purchased_cs_handbook; ?></td>
										<td><?php echo '$'.number_format($today_revenue, 2, '.', ''); ?> </td>
										<td><?php echo ($yesterday_revenue)?'$'.$yesterday_revenue:'$0.00'; ?> </td>
									</tr>
									 <tr>
										<td>2</td>
										<td>Step 1 ($<?php echo $price_step1; ?>)</td>
										<td><?php echo $total_step1; ?></td>
										<td><?php echo $today_purchased_step1; ?></td>
										<td><?php echo '$'.number_format($today_revenue_step1, 2, '.', ''); ?></td>
										<td> <?php echo ($step1_yesterday_revenue)?'$'.$step1_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>3</td>
										<td>Step 2 ($<?php echo $price_step2; ?>)</td>
										<td><?php echo $total_step2; ?></td>
										<td><?php echo $today_purchased_step2; ?></td>
										<td><?php echo '$'.number_format($today_revenue_step2, 2, '.', ''); ?></td>
										<td> <?php echo ($step2_yesterday_revenue)?'$'.$step2_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>4</td>
										<td>Step 3 ($<?php echo $price_step3; ?>)</td>
										<td><?php echo $total_step3; ?></td>
										<td><?php echo $today_purchased_step3; ?></td>
										<td><?php echo '$'.number_format($today_revenue_step3, 2, '.', ''); ?></td>
										<td><?php echo ($step3_yesterday_revenue)?'$'.$step3_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>5</td>
										<td>Step 4 ($<?php echo $price_step4; ?>)</td>
										<td><?php echo $total_step4; ?></td>
										<td><?php echo $today_purchased_step4; ?></td>
										<td><?php echo '$'.number_format($today_revenue_step4, 2, '.', ''); ?></td>
										<td> <?php echo ($step4_yesterday_revenue)?'$'.$step4_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>6</td>
										<td>Step 5 ($<?php echo $price_step5; ?>)</td>
										<td><?php echo $total_step5; ?></td>
										<td><?php echo $today_purchased_step5; ?></td>
										<td><?php echo '$'.number_format($today_revenue_step5, 2, '.', ''); ?></td>
										<td> <?php echo ($step5_yesterday_revenue)?'$'.$step5_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>7</td>
										<td>Step 6 ($<?php echo $price_step6; ?>)</td>
										<td><?php echo $total_step6; ?></td>
										<td><?php echo $today_purchased_step6; ?></td>
										<td><?php echo '$'.number_format($today_revenue_step6, 2, '.', ''); ?></td>
										<td> <?php echo ($step6_yesterday_revenue)?'$'.$step6_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>8</td>
										<td>Step -7 Assesment Prep ($<?php echo $price_assesement_prep; ?>)</td>
										<td><?php echo $total_assesement_prep; ?></td>
										<td><?php echo $today_purchased_assesement_prep; ?></td>
										<td><?php echo '$'.number_format($today_revenue_assesement_prep, 2, '.', ''); ?></td>
										<td> <?php echo ($package_assesement_prep_yesterday_revenue)?'$'.$package_assesement_prep_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>9</td>
										<td>Combo - 15 Days ($<?php echo $price_15_days; ?>)</td>
										<td><?php echo $total_15_days; ?></td>
										<td><?php echo $today_purchased_15_days; ?></td>
										<td><?php echo '$'.number_format($today_revenue_15_days, 2, '.', ''); ?></td>
										<td> <?php echo ($package_15_days_yesterday_revenue)?'$'.$package_15_days_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>10</td>
										<td>Combo - 30 Days ($<?php echo $price_30_days; ?>)</td>
										<td><?php echo $total_30_days; ?></td>
										<td><?php echo $today_purchased_30_days; ?></td>
										<td><?php echo '$'.number_format($today_revenue_30_days, 2, '.', ''); ?></td>
										<td> <?php echo ($package_30_days_yesterday_revenue)?'$'.$package_30_days_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>11</td>
										<td>Combo - 60 Days ($<?php echo $price_60_days; ?>)</td>
										<td><?php echo $total_60_days; ?></td>
										<td><?php echo $today_purchased_60_days; ?></td>
										<td><?php echo '$'.number_format($today_revenue_60_days, 2, '.', ''); ?></td>
										<td> <?php echo ($package_60_days_yesterday_revenue)?'$'.$package_60_days_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>12</td>
										<td>Combo - 90 Days ($<?php echo $price_90_days; ?>)</td>
										<td><?php echo $total_90_days; ?></td>
										<td><?php echo $today_purchased_90_days; ?></td>
										<td><?php echo '$'.number_format($today_revenue_90_days, 2, '.', ''); ?></td>
										<td> <?php echo ($package_90_days_yesterday_revenue)?'$'.$package_90_days_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>13</td>
										<td>Silver ($<?php echo $price_silver; ?>)</td>
										<td><?php echo $total_silver; ?></td>
										<td><?php echo $today_purchased_silver; ?></td>
										<td><?php echo '$'.number_format($today_revenue_silver, 2, '.', ''); ?></td>
										<td> <?php echo ($package_silver_yesterday_revenue)?'$'.$package_silver_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>14</td>
										<td>Gold ($<?php echo $price_gold; ?>)</td>
										<td><?php echo $total_gold; ?></td>
										<td><?php echo $today_purchased_gold; ?></td>
										<td><?php echo '$'.number_format($today_revenue_gold, 2, '.', ''); ?></td>
										<td> <?php echo ($package_gold_yesterday_revenue)?'$'.$package_gold_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>15</td>
										<td>Diamond ($<?php echo $price_diamond; ?>)</td>
										<td><?php echo $total_diamond; ?></td>
										<td><?php echo $today_purchased_diamond; ?></td>
										<td><?php echo '$'.number_format($today_revenue_diamond, 2, '.', ''); ?></td>
										<td> <?php echo ($package_diamond_yesterday_revenue)?'$'.$package_diamond_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									
									<tr>
										<td>16</td>
										<td>Platinum ($<?php echo $price_platinum; ?>)</td>
										<td><?php echo $total_platinum; ?></td>
										<td><?php echo $today_purchased_platinum; ?></td>
										<td><?php echo '$'.number_format($today_revenue_platinum, 2, '.', ''); ?></td>
										<td> <?php echo ($package_platinum_yesterday_revenue)?'$'.$package_platinum_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>17</td>
										<td>RRC ($<?php echo $price_rrc; ?>)</td>
										<td><?php echo $total_rrc; ?></td>
										<td><?php echo $today_purchased_rrc; ?></td>
										<td><?php echo '$'.number_format($today_revenue_rrc, 2, '.', ''); ?></td>
										<td> <?php echo ($package_rrc_yesterday_revenue)?'$'.$package_rrc_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>18</td>
										<td>CCC ($<?php echo $price_ccc; ?>)</td>
										<td><?php echo $total_ccc; ?></td>
										<td><?php echo $today_purchased_ccc; ?></td>
										<td><?php echo '$'.number_format($today_revenue_ccc, 2, '.', ''); ?></td>
										<td> <?php echo ($package_ccc_yesterday_revenue)?'$'.$package_ccc_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>19</td>
										<td>Online Exam ($<?php echo $price_online; ?>)</td>
										<td><?php echo $total_online; ?></td>
										<td><?php echo $today_purchased_online; ?></td>
										<td><?php echo '$'.number_format($today_revenue_online, 2, '.', ''); ?></td>
										<td><?php echo ($package_online_yesterday_revenue)?'$'.$package_online_yesterday_revenue:'$0.00'; ?></td>
									</tr>
									<tr>
										<td>20</td>
										<td>Live Exam (<?php echo $price_live_exam; ?>)</td>
										<td><?php echo $total_live_exam; ?></td>
										<td><?php echo $today_purchased_live_exam; ?></td>
										<td><?php echo '$'.number_format($today_revenue_live_exam, 2, '.', ''); ?></td>
										<td><?php echo ($yesterday_revenue_live_exam)?'$'.$yesterday_revenue_live_exam:'$0.00'; ?></td>
									</tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
					 </div>
                <!-- /.panel -->
				
			
        </div>
        <!-- Row End -->

          <div class="clearfix"></div>
		   
          <div class="row">


            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Latest Registered Users
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($latest_users)){ ?>
                                    <?php $count = 0; ?>
                                    <?php foreach($latest_users as $users){ ?>
                                    <tr>
                                        <td><?php echo ++$count; ?></td>
                                        <td><?php echo $users['first_name']; ?></td>
                                        <td><?php echo $users['email_id']; ?></td>
                                        <td><?php echo $users['phone_no']; ?></td>
                                        <td><?php echo $users['created']; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php }else{ ?>
                                        <tr>No Users Registered Yet</tr>
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
                                        <th>User Email</th>
                                        <th>Order ID</th>
										<th>Name</th>
                                        <th>Amount</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($latest_orders)){ ?>
                                    <?php $count = 0; ?>
                                    <?php foreach($latest_orders as $orders){ ?>
                                    <tr>
                                        <td><?php echo ++$count; ?></td>
                                        <td><?php echo $orders['user_email']; ?></td>
                                        <td><?php echo $orders['order_id']; ?></td>
                                        <td><?php echo $orders['product_name']; ?></td>
                                        <td><?php echo '$'.$orders['price']; ?></td>
                                        <td><?php echo $orders['created']; ?></td>
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
    


