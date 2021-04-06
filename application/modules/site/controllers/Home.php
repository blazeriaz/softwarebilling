<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller
{
	  	function __construct()
  		{
			
    		parent::__construct();
			$this->load->library('form_validation');
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model'); 
			$this->load->helper('thumb_helper');
			redirect('admin/dashboard');
		}

		/******** Admin login function *******/
		public function index()
		{
			
			$data['page_title']  = 'home page';

			// Slider
			$cond[] = array(TRUE, 'site_reference_id', 1 ); 
			$cond[] = array(TRUE, 'status', 1 ); 
			$slider = $this->base_model->get_records('banner_management','*', $cond, 'result_array','sort_order','asc');
			$data['slider'] = $slider;

			//About Author
			$about_author = get_site_settings_category('cs_handbook');
			foreach($about_author as $author_detail){
				$author[$author_detail['name']] = $author_detail['value'];
			}
			$data['about_author'] = $author;
			
			//pr($author);
			//cs_product
			
			//Cs Handbook
			$where = array();  
			$where[] = array( TRUE, 'pr.slug', 'cs-handbook' );
			$fields = "*";
			$join_tables[] = array('product_attributes as pa','pa.product_id = pr.id');
			$cs_product = $this->base_model->get_advance_list('product pr', $join_tables, $fields, $where, 'row_array', 'pr.id', 'desc', 'pr.id');
			$data['cs_product'] = $cs_product;
			
			//pr($cs_product);
			
			//Online Tutorial Step Settings
			$step = get_site_settings_category('step');
			foreach($step as $step_val){
				$online_tutorial[$step_val['name']] = $step_val['value'];
			}
			$data['online_tutorial'] = $online_tutorial;

			//Online Tutorial Steps List
			$where = array();
			$join_tables= array();
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
			$where[] = array( TRUE, 'pt.slug', 'online-video-tutorials' );
			$fields = "p.id,p.name,p.price,p.slug,p.valid_days,pa.content_one,pa.content_two,pa.image,pa.video_url";
			$online_step_list = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'result_array', 'p.name', 'asc', 'p.id');
			$data['online_step_list'] = $online_step_list;

			//Combo Packages Min Price
			$where = array();
			$join_tables= array();
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
			$where[] = array( TRUE, 'pt.slug', 'combo-package' );
			$fields = "p.id,p.name,min(p.price) as price,p.slug";
			$combo_packages = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array', 'p.price', 'asc', '');
			$data['combo_packages'] = $combo_packages;
			//pr($data['combo_packages']);die;

			//Assesment
			$where = array();
			$join_tables= array();
			$where[] = array( TRUE, 'pr.slug', 'assesement-preparation' );
			$fields = "*";
			$join_tables[] = array('product_attributes as pa','pa.product_id = pr.id');
			$asses_preparation = $this->base_model->get_advance_list('product pr', $join_tables, $fields, $where, 'row_array', 'pr.id', 'desc', 'pr.id');
			$data['assesement_preparation'] = $asses_preparation;
			
			//Combo Plan
			$where = array();
			$join_tables= array();
			$where[] = array( TRUE, 'pt.slug', 'combo-plan' );
			$fields = "*";
			$join_tables[] = array('product_attributes as pa','pa.product_id = pr.id');
			$join_tables[] = array('product_type as pt','pt.id = pr.product_type_id');
			$combo_plan = $this->base_model->get_advance_list('product pr', $join_tables, $fields, $where, 'result_array', 'pr.id', 'Asc', 'pr.id');
			$data['combo_plans'] = $combo_plan;
			
			//Testimonial Video
			/*$cond = array();
			$cond[] = array(TRUE, 'type', 'VIDEO' ); 
			//$cond[] = array(TRUE, 'slug', 'online-video-tutorial-coaching' ); 
			$cond[] = array(TRUE, 'status', 1 );
			$testimonial = $this->base_model->get_records('testimonial','*', $cond, 'result_array','id','desc','',5,0);
			$data['testimonials'] = $testimonial;*/
			
			//Testimonial Video
			$where = $join_tables = array();			
			$where[] = array(TRUE, 't.type', 'VIDEO' ); 
			$where[] = array(TRUE, 'tc.slug', 'online-video-tutorial-coaching' ); 
			$fields = "*";
			$join_tables[] = array('testimonial_categories as tc','t.category_id = tc.id');
			$testimonial = $this->base_model->get_advance_list('testimonial t', $join_tables, $fields, $where, 'result_array', 't.id', 'desc', 't.id',5,0);
			$data['testimonials'] = $testimonial;

			$this->load->helper('frontend_helper');
			$this->load->helper('profile_helper');
			$this->load->helper('function_helper');
			
			$this->load->view(SITE_LAYOUT_HOME_PATH, $data); 
				
		}

		public function valid_email($email){
			if($email){
				if(preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)){
					return true;
				}else{
					$this->form_validation->set_message('valid_email', 'Please enter valid email address.');
					return false;
				}
			}
		}

		public function send_sample_email(){

			$email_id = $this->input->post('sample_email_id');
			$this->form_validation->set_rules('sample_email_id','Email ID','trim|required|callback_valid_email');
			$this->form_validation->set_error_delimiters('', '');
			if ($this->form_validation->run()){

				$insert_array = array(
									'email' => $email_id,
									'created' => date('Y-m-d H:i:s')
								);
				$this->base_model->insert('users_free_sample',$insert_array);

				$this->load->helper('frontend_helper');
				$this->load->helper('profile_helper');
				$this->load->helper('function_helper');

				$user_name = 'Guest';
				$url = "<a href='".base_url().'free-samples'."' id='free_sample_link'>URL</a>";

				if(is_loggedin()){
					$user_data = get_loggedin_user();
					$user_name = $user_data['username'];
				}

				$site_name = get_site_settings('site.name','value');

				//Send Email							
				$email_config_data = array(
								'[SITE_NAME]' => $site_name,
							   	'[LOGO]' => base_url().'/'.$this->config->item("logo_mail"),
							   	'[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>",
								'[USERNAME]'=> $user_name,
							   	'[URL]' => $url,
							   );
				$to_email = $email_id;
				$from_email = get_site_settings('emailtemplate.from_email','value');
				$template = 'USER FREE SAMPLES';

				$this->load->library('email_template');
				$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);

				if($res){
					$result = array(
							'status' => 'success',
							'msg' => 'Mail sent successfully',
						);
				}else{
					$result = array(
							'status' => 'error',
							'msg' => 'Unable to send mail',
						);
				}

			}else{

				$result = array(
							'status' => 'error',
							'msg' => validation_errors(),
						);

			}

			echo json_encode($result);die;

		}

		public function csbook_viewer(){
			$data['title'] = "Target USMLE CS HANDBOOK - 2nd  July 2016";
			$data['ebook'] = base_url().'assets/ebook/web/pdf/USMLE_CS_HANDBOOK_02062016.pdf';
			$this->load->view(SITE_LAYOUT_WEBVIEWER, $data); 
		}

		public function download_free_samples(){
			$free_sample = get_site_settings('cs_handbook.handbook','value');
			//$free_sample = get_site_settings('site.freesample','value');
			//echo $free_sample;
			$data['title'] = "Target USMLE CS HANDBOOK - 2nd  July 2016";
			$data['ebook'] = base_url().$this->config->item('settings_img').$free_sample;
			//print_r($data['ebook']);
			$this->load->view(SITE_LAYOUT_WEBVIEWER, $data);
		}
		
		
}
