<script>
var disable_right_click =1;
</script>
<section class="patnote-section1">
	<div class="container">
		<h1>Patient Note Practice</h1>
		<div class="row">
			<button name="stopTimer" class="stopTimer" id="stopTimer" value="stop" style="display:none;"></button>
			<form name="patient_note_correction_form" id="patient_note_correction_form" class="patient_note_correction_form" action="<?php echo base_url('site/patient_note_practise/patient_note_submit'); ?>" method="POST">
			<div class="patnote-menu col-md-12 col-sm-12 col-xs-12">
				<ul>
					<li class="current"><a href="#tabs-1" title="Patient Note">Patient Note</a></li>
					<li><a href="#tabs-2" title="Examinee Instrctions">Examine Instructions</a></li>
				</ul>
			</div>	
			<div class="patient-blocks">
				<!-- 1 -->
				<div id="tabs-1" class="patient-tab patient-note">
					<div class="clock-drag clockTimer">
						<div class="patnote-times">	
							<p><span>&nbsp;</span> <i id="countdown-time" class="up-timer">00:00</i></p>
							<span id='countdown-msg' class="patnote-txt"></span>
						</div>
					</div>
					<div class="patient-note-practise-div">
					<div class="patnote-top col-md-12 col-sm-12 col-xs-12">
						<h2><span>Examinee Name</span> Jane Doe</h2>
						
						<div class="patnote-tme">
							<div class="left col-md-8 col-sm-8 col-xs-12">	
								<p><span>USMLE ID</span> <i>0-123-456-7</i></p>
							</div>
							<div class="right col-md-4 col-sm-4 col-xs-12">	
								<p><span>Badge ID</span> <i>2</i></p>
							</div>
							<div class="left col-md-8 col-sm-8 col-xs-12">	
								<p><span>Room Number</span> <i>01</i></p>
							</div>
							<div class="right col-md-4 col-sm-4 col-xs-12">	
								<p><span>Encounter</span> <i>1</i></p>
							</div>
						</div>
					</div>
					<div class="patnote-comment col-md-12 col-sm-12 col-xs-12">
						<?php echo $patient_note_practise['patientnotecorrection.history_content']; ?>
						<textarea class="" id="text_hc" name="text_hc" cols="70" rows="7" maxrows="15" maxchars="950" spellcheck="false" style="font-family: Courier New; font-size: 12pt; overflow: auto; line-height: 19px;" wrap="virtual"></textarea>
						<div class="left col-md-6 col-sm-12 col-xs-12">	
							<div class="process"><span class="progress-percent" id="progress-percent_hc" style="width:0%;"></span></div>									
						</div>
						<div class="mid col-md-1 col-sm-3 col-xs-3"><p>950</p></div>
						<div class="mid1 col-md-2 col-sm-3 col-xs-3"><p>Lines : <span id="lineCount_hc">1</span> / 15</p></div>
						<div class="right col-md-3 col-sm-6 col-xs-6"><p>Characters : <span id="charCount_hc">0</span> / 950</p></div>
					</div>
					<div class="patnote-comment col-md-12 col-sm-12 col-xs-12">
						<?php echo $patient_note_practise['patientnotecorrection.physical_examination_content']; ?>
						<textarea class="" id="text_pe" name="text_pe" cols="70" rows="7" maxrows="15" maxchars="950" spellcheck="false" style="font-family: Courier New; font-size: 12pt; overflow: auto; line-height: 19px;" wrap="virtual"></textarea>
						<div class="left col-md-6 col-sm-12 col-xs-12">	
							<div class="process"><span class="progress-percent" id="progress-percent_pe" style="width:0%;"></span></div>									
						</div>
						<div class="mid col-md-1 col-sm-3 col-xs-3"><p>950</p></div>
						<div class="mid1 col-md-2 col-sm-3 col-xs-3"><p>Lines : <span id="lineCount_pe">1</span> / 15</p></div>
						<div class="right col-md-3 col-sm-6 col-xs-6"><p>Characters : <span id="charCount_pe">0</span> / 950</p></div>
					</div>
					<div class="patnote-diagnostic">
						<div class="col-md-12 col-sm-12 col-xs-12">	
							<?php echo $patient_note_practise['patientnotecorrection.data_intepretation_content']; ?>
							<div class="blocks block_1">
								<div class="list list_1">
									<div class="col-md-12 col-sm-3 col-xs-3">
										<h4>Diagnosis #<span class="changeNo">1</span></h4>
										<input name='diag_title_1' id="diag_title_1" class="diag_title" type="text" value="" autocomplete="off"/>
									</div>											
									<div class="col-md-6 col-sm-3 col-xs-3 his_fin_1">
										<h4>History Finding(s)</h4>
										<input name="his_fin_1_1" id="his_find_1_1" class="his_fin" type="text" value="" autocomplete="off"/>
										<input name="his_fin_1_2" id="his_find_1_2" class="his_fin" type="text" value="" autocomplete="off"/>
										<input name="his_fin_1_3" id="his_find_1_3" class="his_fin" type="text" value="" autocomplete="off"/>
									</div>											
									<div class="col-md-6 col-sm-3 col-xs-3 phy_ex_1">
										<h4>Physical Exam Finding(s)</h4>
										<input name="phy_ex_1_1" id="phy_ex_1_1" class="phy_ex" type="text" value="" autocomplete="off"/>
										<input name="phy_ex_1_2" id="phy_ex_1_2" class="phy_ex" type="text" value="" autocomplete="off"/>
										<input name="phy_ex_1_3" id="phy_ex_1_3" class="phy_ex" type="text" value="" autocomplete="off"/>
									</div>
								</div>										
							</div>
						</div>
						<div class="list-updown col-md-12 col-sm-3 col-xs-3">
							<a href="javascript:void(0);" title="Up" class="list-up moveType1"><i>Up</i></a>									
							<a href="javascript:void(0);" title="Add a Row" class="list-addrow addNewRow addBtn_1" data-rowId = '1' data-rowCount='3'>Add a Row</a>
						</div>
					</div>
					<div class="patnote-diagnostic">
						<div class="col-md-12 col-sm-12 col-xs-12">									
							<div class="blocks block_2">
								<div class="list list_2">
									<div class="col-md-12 col-sm-3 col-xs-3">
										<h4>Diagnosis #<span class="changeNo">2</span></h4>
										<input name='diag_title_2' id="diag_title_2" class="diag_title" type="text" value="" autocomplete="off"/>
									</div>											
									<div class="col-md-6 col-sm-3 col-xs-3 his_fin_2">
										<h4>History Finding(s)</h4>
										<input name="his_fin_2_1" id="his_find_2_1" class="his_fin" type="text" value="" autocomplete="off"/>
										<input name="his_fin_2_2" id="his_find_2_2" class="his_fin" type="text" value="" autocomplete="off"/>
										<input name="his_fin_2_3" id="his_find_2_3" class="his_fin" type="text" value="" autocomplete="off"/>
									</div>											
									<div class="col-md-6 col-sm-3 col-xs-3 phy_ex_2">
										<h4>Physical Exam Finding(s)</h4>
										<input name="phy_ex_2_1" id="phy_ex_2_1" class="phy_ex" type="text" value="" autocomplete="off"/>
										<input name="phy_ex_2_2" id="phy_ex_2_2" class="phy_ex" type="text" value="" autocomplete="off"/>
										<input name="phy_ex_2_3" id="phy_ex_2_3" class="phy_ex" type="text" value="" autocomplete="off"/>
									</div>
								</div>										
							</div>
						</div>
						<div class="list-updown col-md-12 col-sm-3 col-xs-3">
							<a href="javascript:void(0);" title="Up" class="list-up moveType1"><i>Up</i></a>									
							<a href="javascript:void(0);" title="Add a Row" class="list-addrow addNewRow addBtn_2" data-rowId = '2' data-rowCount='3'>Add a Row</a>									
						</div>
						<div class="list-updown col-md-12 col-sm-3 col-xs-3">				
							<a href="javascript:void(0);" title="Down" class="list-down moveType2"><i>Down</i></a>
						</div>
					</div>
					<div class="patnote-diagnostic">
						<div class="col-md-12 col-sm-12 col-xs-12">										
							<div class="blocks block_3">
								<div class="list list_3">
									<div class="col-md-12 col-sm-3 col-xs-3">
										<h4>Diagnosis #<span class="changeNo">3</span></h4>
										<input name='diag_title_3' id="diag_title_3" class="diag_title" type="text" value="" autocomplete="off"/>
									</div>											
									<div class="col-md-6 col-sm-3 col-xs-3 his_fin_3">
										<h4>History Finding(s)</h4>
										<input name="his_fin_3_1" id="his_find_3_1" class="his_fin" type="text" value="" autocomplete="off"/>
										<input name="his_fin_3_2" id="his_find_3_2" class="his_fin" type="text" value="" autocomplete="off"/>
										<input name="his_fin_3_3" id="his_find_3_3" class="his_fin" type="text" value="" autocomplete="off"/>
									</div>											
									<div class="col-md-6 col-sm-3 col-xs-3 phy_ex_3">
										<h4>Physical Exam Finding(s)</h4>
										<input name="phy_ex_3_1" id="phy_ex_3_1" class="phy_ex" type="text" value="" autocomplete="off" />
										<input name="phy_ex_3_2" id="phy_ex_3_2" class="phy_ex" type="text" value="" autocomplete="off"/>
										<input name="phy_ex_3_3" id="phy_ex_3_3" class="phy_ex" type="text" value="" autocomplete="off"/>
									</div>
								</div>										
							</div>
						</div>
						<div class="list-updown col-md-12 col-sm-3 col-xs-3">
							<a href="javascript:void(0);" title="Up" class="list-up moveType2"><i>Up</i></a>									
							<a href="javascript:void(0);" title="Add a Row" class="list-addrow addNewRow addBtn_3" data-rowId = '3' data-rowCount='3'>Add a Row</a>
						</div>
					</div>							
					<div class="patnote-diagnostic last">
						<div class="col-md-12 col-sm-12 col-xs-12">										
							<div class="blocks">
								<div class="list">
									<div class="col-md-12 col-sm-3 col-xs-3 addDiag-div">
										<h4>Diagnostic Study/Studies</h4>
										<input name="diag_stud_1" id="diag_stud_1" class="diag_stud" type="text" value="" autocomplete="off"/>
										<input name="diag_stud_2" id="diag_stud_2" class="diag_stud" type="text" value="" autocomplete="off"/>
										<input name="diag_stud_3" id="diag_stud_3" class="diag_stud" type="text" value="" autocomplete="off"/>
									</div>	
								</div>										
							</div>
							<div class="list-updown col-md-12 col-sm-3 col-xs-3">
								<a href="javascript:void(0);" title="Add a Row" class="list-addrow addDiag" data-rowCount='3'>Add a Row</a>
							</div>
						</div>
					</div>

					<div class="patnote-btns">
						<div class="btns-block">
							<input type="hidden" name="timer_started" id="timer_started" value="0">
							<input type="hidden" name="form_submitted" id="form_submitted" value="0" />
							<input type="submit" name="submit" id="submit" class="submit" value="Submit" />
							<!--<input type="reset" name="reset" id="reset" class="cancel" value="Cancel" />-->
						</div>
					</div>
				</div>
				<div class="patient-note-timeout-div" style="display:none;">
					<div class='tab2_content'>
						<?php echo $patient_note_practise['patientnotecorrection.timeout_content']; ?>
					</div>
				</div>
				</div>

				

				<!-- 1 -->						
				<!-- 2 -->
				<div id="tabs-2" class="patient-tab examinsts">
					<?php echo $patient_note_practise['patientnotecorrection.examine_instruction_content']; ?>
				</div>
				<!-- 2 -->
			</div>
		</form>
		</div>
	</div>
	<div id = "dialog-box-min"></div>
</section>
<script>
var count_dwn_timeout = "<?php echo $patient_note_practise['patientnotecorrection.durationtime'].':00'; ?>";
var original_dwn_timeout = "<?php echo $patient_note_practise['patientnotecorrection.originaldurationtime'].':00'; ?>";

$(document).ready(function() {
	
	//$("body").addClass("patient_note_fixed_dialog");
	
	 $('.up-timer').countimer({
			autoStart : false,
			 useHours : false,
			 enableEvents: true,
			 initMinutes : 0,
			 initSeconds: 0
		}).on('minute', function(evt, time){
				
				if(time.displayedMode.formatted == '08:00'){
					$("#countdown-time").css("color",'red');
					$('.up-timer').countimer('stop');
					$("#dialog-box-min").dialog("open");					 
					$("#dialog-box-min").html("You Have 2 Minutes Left !!");
					$("body").addClass("patient_note_fixed_dialog");
				}
				if(time.displayedMode.formatted == original_dwn_timeout){
					$('.up-timer').countimer('stop');
					$("#dialog-box").dialog("open");					 
					$("#dialog-box").html("The Time Limit of the Exam is Reached.Do you Still Want to Continue?");
					$("body").addClass("patient_note_fixed_dialog");
				}
				if(time.displayedMode.formatted == count_dwn_timeout){
					$("body").removeClass("patient_note_fixed_dialog");
					patient_note_submit();
				}
				
		});
	$('#text_hc,#text_pe,.diag_title,.his_fin,.phy_ex,.diag_stud').livequery("keyup",function(e){
		var keyCode = e.keyCode || e.which; 
		if(keyCode != 9 && keyCode != 20 && keyCode != 16 && keyCode != 17 && keyCode != 36 && keyCode != 145 && keyCode != 44 && keyCode != 45 && keyCode != 33 && keyCode != 34 && keyCode != 144 && keyCode != 27){
			if($('#timer_started').val() == 0){
				$('.up-timer').countimer('start');
				$('#timer_started').val(1);
			}
		}
	});
	
	$( "#dialog-box" ).dialog({
       autoOpen: false, 
	   dialogClass: 'patient_note_dialog',
       modal: true,
	   close: function( event, ui ) {
		   $('.up-timer').countimer('resume');
			$(this).dialog("close");		
			$("body").removeClass("patient_note_fixed_dialog");			
			return false;
	   },
       buttons: {
          "Submit & Save": function(){
          		$(this).dialog("close");
				$("body").removeClass("patient_note_fixed_dialog");	
          		$("#patient_note_correction_form #form_submitted").val('2');
				patient_note_submit();
          	},
          "Continue":function(){
					$('.up-timer').countimer('resume');
          			$(this).dialog("close");
					$("body").removeClass("patient_note_fixed_dialog");	
          			return false;
          	},
       },
    });
	
	$( "#dialog-box-min" ).dialog({
       autoOpen: false, 
	   dialogClass: 'patient_note_dialog_min',
       modal: true,
	   close: function( event, ui ) {
		   $('.up-timer').countimer('resume');
			$(this).dialog("close");		
			$("body").removeClass("patient_note_fixed_dialog");			
			return false;
	   },
       buttons: {
          "Continue":function(){
					$('.up-timer').countimer('resume');
          			$(this).dialog("close");
					$("body").removeClass("patient_note_fixed_dialog");					
          			return false;
          	},
       },
    });
	
	function patient_note_submit(){

		var val_exists = 0;

		setTimeout(function(){
			//$("#stopTimer").trigger('click');
			$('.up-timer').countimer('stop');
			$("#countdown-time").html('00:00');
        	$("#countdown-msg").html('');
        	$(".clockTimer").hide();
		},1000);

		var form_submitted = $("#patient_note_correction_form #form_submitted").val();

		$("#patient_note_correction_form input[type=text]").each(function(){
			if($(this).val()){
				val_exists = 1;
			}
		});

		$("#patient_note_correction_form textarea").each(function(){
			if($(this).val()){
				val_exists = 1;
			}
		});
		

		if(val_exists != 0 && ((form_submitted == 0) || (form_submitted == 2))){

	    	var $this = $('#patient_note_correction_form');

	    	var addBtn_1 = $('.addBtn_1').attr('data-rowcount');
	    	var addBtn_2 = $('.addBtn_2').attr('data-rowcount');
	    	var addBtn_3 = $('.addBtn_3').attr('data-rowcount');
	    	var addDiag = $('.addDiag').attr('data-rowcount');

			var url = $this.attr('action');
			var data = $this.serialize();

			data = data+'&rowCnt1='+addBtn_1+'&rowCnt2='+addBtn_2+'&rowCnt3='+addBtn_3+'&rowCnt4='+addDiag;

			$.ajax({
				type:'POST',
				url:url,
				data:data,
				success:function(res){
					var data = JSON.parse(res);
					if(data.status == 'success'){
						$(".patient-note-practise-div").fadeOut(500);
						$(".tab2_content").html(data.msg);
	    				$(".patient-note-timeout-div").fadeIn(500);
						
						
					}else{
						$(".patient-note-practise-div").fadeOut(500);
						$(".tab2_content").html(data.msg);
	    				$(".patient-note-timeout-div").fadeIn(500);
					}
					
					setTimeout(function(){  }, 1000);
					$('html,body').animate({
					scrollTop: $("#patient_note_correction_form").offset().top},'slow');
					},
			});

		}else{
			$(".patient-note-practise-div").fadeOut(500);
			$(".tab2_content").html('Details Submitted Successfully');
	    	$(".patient-note-timeout-div").fadeIn(500);
		}
    }
	
	
	
	// Patient-note-examinee Clock 
	var addRow = $( ".patnote-btns" );
	var adVal =  parseInt(addRow.offset().top);	
	$(window).scroll(function(){
	  var topVal = $(window).scrollTop() + 200 ;
	  if( (adVal - 150) > topVal ) {
		$(".clock-drag").stop().animate({
			"top": ($(window).scrollTop() + 200 ) + "px"
		}, "slow" );
	  } 
	});
	
	 
	
});
</script>


