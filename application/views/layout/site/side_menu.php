<?php
$user_data = get_loggedin_user();
$join_tables = $where = array(); 
$where[] = array( TRUE, 'id', $user_data['user_id']);
$fields = '*'; 
$user_datas = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array');
?>
<div class="col-md-4 col-sm-12 col-xs-12">
				      <div class="my_acc_sidebar">
                <div class="acc_sidebar_header">
                  <!--<img src="<?php //echo base_url(); ?>assets/site/images/my-account/doc-img.png" alt="Doctor Image"/>-->				  
				  <!-- Profile User Image -->
				  <div class="profile">
					<?php 
					$attributes = array('class' => 'change-profile-img','id' => 'profile-image','method'=>'post');				
						echo form_open_multipart('register', $attributes); ?>
						<div class="profile-avatar-wrap"> 
						<span class="edit-photo">Icons</span>
						<?php if($user_datas['image']!=""){ ?>
							<img id="profile-avatar" alt="Image for Profile" src="<?php echo base_url(); ?>appdata/profile_image/<?php echo $user_datas['image']; ?>"> 
						<?php }else{ ?>
							<img id="profile-avatar" alt="Image for Profile" src="<?php echo base_url(); ?>assets/site/images/photo-upload.jpg"> 
						<?php } ?>
							
						</div>
						<input type="file" id="profile-uploader" name="image" class="uploader">
						 <?php echo form_close();  ?>
					</div>
				  <!-- Profile User Image -->
                  <h2 class="acc_doc_name"><?php echo $user_datas['first_name'].' '.$user_datas['last_name']; ?></h2>
                  <h6 class="doc_designation"><?php echo $user_datas['designation']; ?></h6>
                </div>
                <div class="my_acc_menu">
				<?php $page = $this->router->fetch_class(); ?>
                  <ul>
                      <li class="<?php if($page == 'profile'){ echo 'active';} ?>"><a href="<?php echo base_url('my-profile'); ?>" title="My Profile">My Profile</a></li>
                      <li class="<?php if($page == 'course'){ echo 'active';} ?>"><a href="<?php echo base_url('my-courses'); ?>" title="My Courses">My Courses</a></li>
                      <li class="<?php if($page == 'purchase'){ echo 'active';} ?>"><a href="<?php echo base_url('my-purchase'); ?>" title="My Purchases">My Purchases</a></li>
                      <li class="<?php if($page == 'change_password'){ echo 'active';} ?>"><a href="<?php echo base_url('change-password'); ?>" title="Change Password">Change Password</a></li>
                      <li><a href="<?php echo base_url('logout'); ?>" title="Logout">Logout</a></li>
                  </ul>
                </div>
              </div>
			  </div>