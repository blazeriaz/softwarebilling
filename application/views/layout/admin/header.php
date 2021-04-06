<!-- Fonts -->
<script>
    var base_url = "<?php echo base_url(); ?>";
    var ADMIN_DATE_FORMAT_JS = "<?php echo ADMIN_DATE_FORMAT_JS; ?>";    
    
    <?php
    $allowTimes = $this->config->item('allowed_times');
    $time = "[";
    foreach($allowTimes as $val=>$label){
      $time .= "'".$val."',";
    }
    $time = rtrim($time,',');
    $time = $time."]";
    ?>
    var allowedTimes = <?php echo $time; ?>;
</script>
 <!--link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'-->
 <!-- CSS Libs -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/bootstrap.min.css'; ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/font-awesome.min.css'; ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/animate.min.css'; ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/bootstrap-switch.min.css'; ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/bootstrap-slider.min.css'; ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/checkbox3.min.css'; ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/jquery.dataTables.min.css';?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/dataTables.bootstrap.css'; ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/select2.min.css'; ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/bootstrap-select.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/jquery.datetimepicker.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/jquery.fancybox.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/jquery.jscrollpane.css'; ?>">
   
 <!-- CSS App -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/style.css'; ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/flat-blue.css'; ?>">
 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/themes/css/custom.css'; ?>">
  
  <!-- Custom CSS -->
  <?php
  	if(isset($css)&&!empty($css)){
  		foreach($css as $css){
  			echo "<link rel='stylesheet' type='text/css' href='".base_url().$css."'>";
  		}
  	}
  ?>
  
  <script type="text/javascript" src="<?php echo base_url().'assets/themes/js/jquery.min.js'; ?>"></script>
  
  
  
  <!-- charts -->
  
  <!--<script type="text/javascript" src="<?php echo base_url().'assets/themes/js/amcharts.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/themes/js/pie.js';?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/themes/js/serial.js';?>"></script>-->
  
  


	
  

