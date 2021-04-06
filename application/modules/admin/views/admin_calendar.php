 <!-- Main Content -->
<div class="container-fluid">
    <div class="side-body">
		<div class="page-title"></div>
			<div class="row">
				<div class="col-xs-12">
					<div class="card custom-card">
						<div class="card-header">
							<div class="card-title">
								<div class="title"><?php echo $page_title; ?></div>
							</div>
							<div class="back pull-right">
								<a title="Back" href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/dashboard">Back</a>
							</div>
						</div>
                    	<div class="card-body">
                    		<!-- Flash Message -->
							<?php if($this->session->flashdata('flash_failure_message')){ ?>
							<div class="alert alert-danger" role="alert">
								 <strong>Warning!</strong> <?php echo $this->session->flashdata('flash_failure_message'); ?>
								 <?php $this->session->unmark_flash('flash_failure_message'); ?>
							</div> 
							<?php } if($this->session->flashdata('flash_success_message')){ ?>
							<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								 <strong>Done!</strong> <?php echo $this->session->flashdata('flash_success_message'); ?>
								 <?php $this->session->unmark_flash('flash_success_message'); ?>
							</div> 
							<?php } ?>
                            <style>
                            .fc-content{
                                white-space: normal!important;
                            }
                            .fc-time{
                                display:block;
                            }
                            </style>


                            <div id="calendar"></div>
                    		
                            <?php

                            foreach($timeslot_list as $value){
                                $get_title = $value['timeslot_name'].' '.$value['batch_name'].' Class-'.$value['class_id'];
                                $get_start = $value['date_time'];
                                $get_end = $get_start;
                                $get_constraint = $value['id'];
                                if($value['is_complete']){
                                    $get_color = '#4b9e9e';
                                }else if($value['is_users_booked']){
                                    $get_color = '#f7ee4e';
                                }else{
                                    $get_color = '#78fb00';
                                }
                                
                                $get_id = $value['id'];
                                $get_rendering = 'background';

                                $cal_arr[] = array(
                                                'title'=>$get_title,
                                                'start'=>$get_start,
                                                'end'=>$get_end,
                                                'constraint'=>$get_constraint,
                                                'id'=>$get_id,
                                                'color'=>$get_color
                                            );
                                /*
                                $cal_arr[] = array(
                                                'id'=>$get_id,
                                                'start'=>$get_start1,
                                                'end'=>$get_end1,
                                                'rendering'=>$get_rendering
                                            );
                                */

                            }

                            if(!empty($cal_arr)){
                                $json_arr = array_values($cal_arr);
                                $date_json = json_encode($json_arr);
                            }else{
                                $json_arr = '';
                                $date_json = json_encode(array());
                            }                                
                                //print("<pre>");print_r(json_decode($date_json));print("</pre>");die;
                            ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    var eventList=<?php echo $date_json; ?>;

    $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			//right: 'listYear,month,agendaWeek,agendaDay,basicWeek,basicDay'
			right: 'listYear,month'
		},
        editable: true,
        events: eventList,
		defaultView: 'month',
        eventRender: function(event, element){
            var id = '';

            var loadNext = "";
            element.prepend( "<span class='closeon display_none'>X</span>" );
            element.find(".closeon").click(function(){
                alert('clicked');         
            });
        },
        eventClick: function(calEvent, jsEvent, view) {
            if(calEvent.id){
                window.open(base_url+'admin/admin_timeslot/view/'+calEvent.id,'_blank');
            }
        },
        displayEventTime:true,
		//timeFormat: 'h(:mm)t',
		timeFormat: 'h:mm a',
    });

});
</script>


