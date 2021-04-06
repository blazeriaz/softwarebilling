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
                            <?php if(!isset($back_button_hide)){ ?>
                                <div class="back pull-right">
                                    <a title="Back" href="<?php echo SITE_URL().SITE_ADMIN_URI;?>/dashboard">Back</a>
                                </div>
                            <?php } ?>
							
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
                    		<?php  $attributes = array('class' => 'form-horizontal','id' => 'profile_form','enctype'=>'multipart/form-data');				
							echo form_open('', $attributes);?>
							
							<?php foreach($data as $cat_id => $result_set){ ?>
                                    <fieldset>
                                        <legend>
                                            <?php 
                                                if(isset($field_title)){
                                                    echo ucwords($field_title);
                                                }else{
                                                    echo ucwords($categories[$cat_id]);
                                                }
                                            ?>
                                            </legend>

                                        <?php foreach($result_set as $res){ ?>

                                        <?php //pr($res); ?>
                                        <?php
                                            $name = 'data['.$res['site_categories_name'].']['.$res['id'].'][name]';
											$options = $res['options'];
                                            if(isset($_POST['data'][$res['site_categories_name']][$res['id']]['name'])){
                                                $post_val = $_POST['data'][$res['site_categories_name']][$res['id']]['name'];
                                            }else{
                                                $post_val = isset($res['value']) ? $res['value'] : '';
                                            }
                                            $class = "form-control settinginputname";
                                            if(isset($res['include_class']) && $res['include_class']){
                                                $class .= " ".$res['include_class'];
                                            }
                                        ?>

                                            <div class="form-group">
                                                <?php 
                                                    echo form_label($res['label'].' <span class="mandatory">*</span>  ','setting'.$res['id'].'name',array('class'=>'col-sm-2 control-label')); 
                                                ?>

                                                <div class="col-sm-8">

                                                <?php switch($res['type']){
                                                    case 'text':
                                                        if(substr_count($class,'video_url')){
                                                            $placeholder = 'http://';
                                                        }else{
                                                            $placeholder = '';
                                                        }
                                                        echo form_input($name,$post_val,'class="'.$class.'" id="setting'.$res['id'].'name" placeholder="'.$placeholder.'"');
                                                        if(form_error($name)) 
                                                            echo form_label(form_error($name), $name, array("id"=>$name."-error" , "class"=>"error")); 
														if($name=="data[patientnotecorrection][30][name]") 
                                                            echo "<small style='margin-top:4px;float: left;width: 100%;'>Mins (example : 10)</small>"; 
														if($name=="data[personal_coaching][41][name]") 
															echo "<small style='margin-top:4px;float: left;width: 100%;'>".$this->lang->line('youtube_embed_url')."</small>";
                                                    break;
                                                    
                                                    case 'textarea':
                                                        $set_description = $post_val;   
                                                        echo form_textarea($name,$set_description,' class="'.$class.'" id="setting'.$res['id'].'name"'); 
                                                        if(form_error($name)) 
                                                            echo form_label(form_error($name), $name, array("id"=>$name."-error" , "class"=>"error"));
                                                    break;

                                                    case 'password':
                                                        $set_description = $post_val;   
                                                        echo form_password($name,$set_description,' class="'.$class.'" id="setting'.$res['id'].'name"'); 
                                                        if(form_error($name)) 
                                                            echo form_label(form_error($name), $name, array("id"=>$name."-error" , "class"=>"error"));
                                                    break;
													
													case 'select':
														echo form_dropdown($name, json_decode($options,true), $post_val, array('id'=> 'setting'.$res['id'].'name', 'class'=>$class));
                                                        if(form_error($name)) 
                                                            echo form_label(form_error($name), $name, array("id"=>$name."-error" , "class"=>"error")); 
                                                    break;
                                                    ?>

                                                   <?php
                                                   case 'file':

                                                   echo form_upload(array('id' => "image-".$res['id'], 'name' => "image-".$res['id'], 'class' => $class));

                                                    if(form_error("image-".$res['id'])){
                                                        echo form_label(form_error("image-".$res['id']), "image-".$res['id'], array("id"=>"image-".$res['id']."-error" , "class"=>"error"));
                                                    }

                                                    if($post_val != ''){
                                                        $img_src = thumb(FCPATH.$this->config->item('settings_img').$post_val ,'75', '75', 'thumb_img',$maintain_ratio = TRUE);
                                                        $img_prp = array('style'=>'clear: left;float: left;margin-top: 10px;', 'src' => base_url().$this->config->item('settings_img').'thumb_img/'.$img_src, 'alt' => $post_val, 'title' => $post_val);
                                                        echo img($img_prp);
                                                     }else{
                                                        $no_img = array('style'=>'clear: left;float: left;margin-top: 10px;', 'src' => base_url() . 'appdata/thumb/student_avatar/100x100/no-image.png', 'alt' => "No Image", 'title' => "No Image");
                                                        echo img($no_img);
                                                     }
                                                      echo "<input type='hidden' name='image_hidden-".$res['id']."' value='".$post_val."' id='image_hidden-".$res['id']."' class='image_hidden' />";
                                                     break;
                                                    ?>

                                                    <?php } ?>

                                                    </div>
                                                </div>

                                        <?php } ?>
                                    </fieldset>
                            <?php } ?>
                            	
                           	<legend></legend>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default" title="Save">Save</button>
                                </div>
                            </div>
                           
						<?php echo form_close();  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


