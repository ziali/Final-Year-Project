<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/* Represents the number of image upload fields per product. Is declared as global for extensibility. */
	var $upload_image = array("1","2","3", "4", "5", "6", "7");

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		/* call the is_loggedin() method before doing anything else, to check
	       whether the user is allowed to be here (i.e. they are logged in) or not. */
		$this->is_loggedin();
	}
	
	public function index()
	{
		$this->load->view('admin/admin_panel');
	}

	public function is_loggedin()
	{
		$check_login = $this->session->userdata('is_loggedin');
		
		if(!isset($check_login) || $check_login != 1)
		{
			redirect('login');
		}
	}
	
	public function search_products()
	{
		$val = $this->input->post('search_field');
		$res = $this->admin_model->search($val);
		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url() . 'admin/search_products/';
		$config['total_rows'] = $this->admin_model->search_total_rows($val);
		$config['per_page'] = 10;
		$config['num_links'] = 10;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
		$config['full_tag_close'] = '</ul>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
				
		$this->pagination->initialize($config);
		if($this->uri->segment(3) != 0 || $this->uri->segment(3) == "")
		{
			$offset = $this->uri->segment(3);
		}
		else
		{
			$offset = 0;
		}

		$data['search_results'] = $this->admin_model->search($val, $config['per_page'], $offset);
		
		$this->load->view('admin/search_page',$data);
	}
	
	public function load_edit_page()
	{
		$this->load->helper('form');
		$id = $this->uri->segment(3);
		
		$data['product_details'] = $this->admin_model->getProduct($id);
		$data['categories1'] = $this->admin_model->getSubcategories('1');
		$data['categories2'] = $this->admin_model->getSubcategories('2');
		$data['categories3'] = $this->admin_model->getSubcategories('3');
		$data['categories4'] = $this->admin_model->getSubcategories('4');
		$data['categories5'] = $this->admin_model->getSubcategories('5');
		$data['categories6'] = $this->admin_model->getSubcategories('6');
		$data['categories7'] = $this->admin_model->getSubcategories('7');
		$data['categories8'] = $this->admin_model->getSubcategories('8');
		$data['categories9'] = $this->admin_model->getSubcategories('9');
		$data['categories10'] = $this->admin_model->getSubcategories('10');
		
		$this->load->view('admin/edit', $data);
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		
		$res = $this->admin_model->delete_product($id);
		
		if($res == FALSE)
		{
			$this->session->set_flashdata('error_delete', 'Product not deleted. We gots an issue.');
			redirect('admin/index');
		}
		else
		{
			$this->session->set_flashdata('success_delete', 'Product deleted successfully.');
			redirect('admin/index');
		}
	}
	
	/* Called by ajax post request via add_page.php to see if the desired title exists already */
	public function checkAvailability()
	{
		echo $this->admin_model->checkTitleAvailability($this->input->post('title'));
	}
	
	public function add_products_page()
	{
		//get each categories subcategory and place them in their own variable
		$data['categories1'] = $this->admin_model->getSubcategories('1');
		$data['categories2'] = $this->admin_model->getSubcategories('2');
		$data['categories3'] = $this->admin_model->getSubcategories('3');
		$data['categories4'] = $this->admin_model->getSubcategories('4');
		$data['categories5'] = $this->admin_model->getSubcategories('5');
		$data['categories6'] = $this->admin_model->getSubcategories('6');
		$data['categories7'] = $this->admin_model->getSubcategories('7');
		$data['categories8'] = $this->admin_model->getSubcategories('8');
		$data['categories9'] = $this->admin_model->getSubcategories('9');
		$data['categories10'] = $this->admin_model->getSubcategories('10');
		$data['categories11'] = $this->admin_model->getSubcategories('11');
		//$data['error'] = '';
		$this->load->view('admin/add_page',$data);
	}
	
	/* Get all categories available and load them into the add_categories page */
	public function add_categories_page()
	{
		$data['main_categories'] = $this->admin_model->getCategories();
		$this->load->view('admin/add_categories', $data);
	}
	
	public function add_subcategories()
	{
		//get input fields values and send off to model
		$cat_id = $this->input->post('main_category');
		$subcat_name = $this->input->post('new_subcategory');
		
		$res = $this->admin_model->createSubcategory($cat_id, $subcat_name);
		if($res)
		{
			redirect('admin/add_categories_page', 'refresh');
		}
		else
		{
			/*to show this message instead of the database error, set $db_debug=FALSE 
			in DATABASE.php but leave it to TRUE for now, to see database errors*/
			echo 'That subcategory name already exists. Please think over your decision i.e. do you really need this subcategory.';
		}
	}
													/* *****BEGIN ADD PRODUCT FUNCTIONS***** */
	public function add_book()
	{
	
		$this->form_validation->set_rules('book_name', 'Book Title', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('book_author', 'Book Author', 'trim');
		$this->form_validation->set_rules('book_publisher', 'Book Publisher', 'trim');
		$this->form_validation->set_rules('book_price', 'Book Price', 'trim|required|decimal');
		$this->form_validation->set_rules('book_stock', 'Book Stock', 'trim|required|is_natural');
		$this->form_validation->set_rules('book_description', 'Book Description', 'trim');
		$this->form_validation->set_rules('book_binding', 'Book Binding', 'trim');
		$this->form_validation->set_rules('book_size', 'Book Size', 'trim');
		$this->form_validation->set_rules('book_pages', 'Book Pages', 'trim|is_natural_no_zero');
		$this->form_validation->set_rules('book_language', 'Book Language', 'trim');
		$this->form_validation->set_rules('book_isbn', 'Book ISBN', 'trim|integer');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['validation_error'] = "A Validation error occurred while adding a Book. Please click the <strong>'Add Books'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_book();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
		
			redirect('admin/add_products_page');
		}
	}
	
	public function add_clothes()
	{
		
		$this->form_validation->set_rules('clothes_name', 'Clothing Title', 'trim|required');
		$this->form_validation->set_rules('clothes_brand', 'Clothing Brand', 'trim');
		$this->form_validation->set_rules('clothes_colour', 'Clothing Colour', 'trim|required');
		$this->form_validation->set_rules('clothes_price', 'Clothing Price', 'trim|required|decimal');
		$this->form_validation->set_rules('clothes_stock', 'Clothing Stock', 'trim|required|is_natural');
		$this->form_validation->set_rules('sizes[]', 'Clothing Sizes', 'trim|required');
		$this->form_validation->set_rules('clothes_description', 'Clothing Description', 'trim');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['validation_error'] = "A Validation error occurred while adding Clothing. Please click the <strong>'Add Clothing'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_clothes();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
		
			redirect('admin/add_products_page');
		}
	}
	
	public function add_perfume()
	{
		$this->form_validation->set_rules('perfume_name', 'Perfume Title', 'trim|required');
		$this->form_validation->set_rules('perfume_volume', 'Perfume Volume', 'trim');
		$this->form_validation->set_rules('perfume_brand', 'Perfume Brand', 'trim');
		$this->form_validation->set_rules('perfume_description', 'Perfume Description', 'trim|required');
		$this->form_validation->set_rules('perfume_price', 'Perfume Price', 'trim|required|decimal');
		$this->form_validation->set_rules('perfume_stock', 'Perfume Stock', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['validation_error'] = "A Validation error occurred while adding Perfume. Please click the <strong>'Add Perfumes'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_perfume();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
			
			redirect('admin/add_products_page');
		}
	}
	
	public function add_decor()
	{
		$this->form_validation->set_rules('decor_name', 'Decor Title', 'trim|required');
		$this->form_validation->set_rules('decor_size', 'Decor Size', 'trim');
		$this->form_validation->set_rules('decor_colour', 'Decor Colour', 'trim');
		$this->form_validation->set_rules('decor_price', 'Decor Price', 'trim|required|decimal');
		$this->form_validation->set_rules('decor_description', 'Decor Description', 'trim|required');
		$this->form_validation->set_rules('decor_stock', 'Decor Stock', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['validation_error'] = "A Validation error occurred while adding Decorative Pieces. Please click the <strong>'Add Decorative Pieces'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_decor();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
			
			redirect('admin/add_products_page');
		}
	}
	
	public function add_cd_dvd()
	{
		$this->form_validation->set_rules('cd_dvd_name', 'CD-DVD Title', 'trim|required');
		$this->form_validation->set_rules('cd_dvd_format', 'CD-DVD Format', 'trim|required');
		$this->form_validation->set_rules('cd_dvd_artist', 'CD-DVD Artist', 'trim');
		$this->form_validation->set_rules('cd_dvd_producer', 'CD-DVD Producer', 'trim');
		$this->form_validation->set_rules('cd_dvd_language', 'CD-DVD Language', 'trim|required');
		$this->form_validation->set_rules('cd_dvd_price', 'CD-DVD Price', 'trim|required|decimal');
		$this->form_validation->set_rules('cd_dvd_stock', 'CD-DVD Stock', 'trim|required');
		$this->form_validation->set_rules('cd_dvd_description', 'CD-DVD Description', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['validation_error'] = "A Validation error occurred while adding CD/DVDs. Please click the <strong>'Add CDs-DVDs'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_cd_dvd();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
			
			redirect('admin/add_products_page');
		}
	}
	
	public function add_date_sweet()
	{
	
		$this->form_validation->set_rules('date_sweet_name', 'Date/Sweet Title', 'trim|required');
		$this->form_validation->set_rules('date_sweet_brand', 'Date/Sweet Brand', 'trim');
		$this->form_validation->set_rules('date_sweet_weight', 'Date/Sweet Weight', 'trim');
		$this->form_validation->set_rules('date_sweet_stock', 'Date/Sweet Stock', 'trim|required');
		$this->form_validation->set_rules('date_sweet_price', 'Date/Sweet Price', 'trim|required|decimal');
		$this->form_validation->set_rules('date_sweet_description', 'Date/Sweet Description', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['validation_error'] = "A Validation error occurred while adding Dates/Sweets. Please click the <strong>'Add Dates & Sweets'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_date_sweet();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
			
			redirect('admin/add_products_page');
		}
	}
	
	public function add_electronics()
	{
	
		$this->form_validation->set_rules('electronics_name', 'Electronics Title', 'trim|required');
		$this->form_validation->set_rules('electronics_brand', 'Electronics Brand', 'trim');
		$this->form_validation->set_rules('electronics_size', 'Electronics Size', 'trim');
		$this->form_validation->set_rules('electronics_stock', 'Electronics Stock', 'trim|required');
		$this->form_validation->set_rules('electronics_price', 'Electronics Price', 'trim|required|decimal');
		$this->form_validation->set_rules('electronics_description', 'Electronics Description', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['validation_error'] = "A Validation error occurred while adding Electronics. Please click the <strong>'Add Electronics'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_electronics();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
			
			redirect('admin/add_products_page');
		}
	}
	
	public function add_health_beauty()
	{
		$this->form_validation->set_rules('health_name', 'Health Title', 'trim|required');
		$this->form_validation->set_rules('health_brand', 'Health Brand', 'trim');
		$this->form_validation->set_rules('health_size_vol', 'Health Size', 'trim');
		$this->form_validation->set_rules('health_stock', 'Health Stock', 'trim|required');
		$this->form_validation->set_rules('health_price', 'Health Price', 'trim|required|decimal');
		$this->form_validation->set_rules('health_description', 'Health Description', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['validation_error'] = "A Validation error occurred while adding Health & Beauty. Please click the <strong>'Add Health & Beauty'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_health_beauty();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
			
			redirect('admin/add_products_page');
		}
	}
	
	public function add_children()
	{
	
		$this->form_validation->set_rules('children_name', 'Children Title', 'trim|required');
		$this->form_validation->set_rules('children_brand', 'Children Brand', 'trim');
		$this->form_validation->set_rules('children_size', 'Children Size', 'trim');
		$this->form_validation->set_rules('children_stock', 'Children Stock', 'trim|required');
		$this->form_validation->set_rules('children_price', 'Children Price', 'trim|required|decimal');
		$this->form_validation->set_rules('children_description', 'Children Description', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['validation_error'] = "A Validation error occurred while adding Childrens Products. Please click the <strong>'Add Childrens Products'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_children();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
			
			redirect('admin/add_products_page');
		}
	}
	
	public function add_hajjkit()
	{
		$this->form_validation->set_rules('hajjkit_name', 'Hajj Kit Title', 'trim|required');
		$this->form_validation->set_rules('hajjkit_ihraam_name', 'Ihraam Name', 'trim|required');
		$this->form_validation->set_rules('hajjkit_ihraam_description', 'Ihraam Description', 'trim|required');
		$this->form_validation->set_rules('hajjkit_sleepingbag_name', 'Ihraam Name', 'trim|required');
		$this->form_validation->set_rules('hajjkit_sleepingbag_description', 'Ihraam Description', 'trim|required');
		$this->form_validation->set_rules('hajjkit_belt_name', 'Ihraam Name', 'trim|required');
		$this->form_validation->set_rules('hajjkit_belt_description', 'Ihraam Description', 'trim|required');
		$this->form_validation->set_rules('hajjkit_waterbottle_name', 'Ihraam Name', 'trim');					/*Wudu, waterbottle, clock and pillow not required*/
		$this->form_validation->set_rules('hajjkit_waterbottle_description', 'Ihraam Description', 'trim');		/*because they are minor accessories.*/
		$this->form_validation->set_rules('hajjkit_wudumate_name', 'Ihraam Name', 'trim');
		$this->form_validation->set_rules('hajjkit_wudumate_description', 'Ihraam Description', 'trim');
		$this->form_validation->set_rules('hajjkit_clock_name', 'Ihraam Name', 'trim');
		$this->form_validation->set_rules('hajjkit_clock_description', 'Ihraam Description', 'trim');
		$this->form_validation->set_rules('hajjkit_pillow_name', 'Ihraam Name', 'trim');
		$this->form_validation->set_rules('hajjkit_pillow_description', 'Ihraam Description', 'trim');
		$this->form_validation->set_rules('hajjkit_stock', 'Hajj Kit Stock', 'trim|required');
		$this->form_validation->set_rules('hajjkit_price', 'Hajj Kit Price', 'trim|required|decimal');
		$this->form_validation->set_rules('hajjkit_package_description', 'Hajj Kit Package Description', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			//Need to carry around data for dropdown subcat list...need to find a better way
			$data['categories1'] = $this->admin_model->getSubcategories('1');
			$data['categories2'] = $this->admin_model->getSubcategories('2');
			$data['categories3'] = $this->admin_model->getSubcategories('3');
			$data['categories4'] = $this->admin_model->getSubcategories('4');
			$data['categories5'] = $this->admin_model->getSubcategories('5');
			$data['categories6'] = $this->admin_model->getSubcategories('6');
			$data['categories7'] = $this->admin_model->getSubcategories('7');
			$data['categories8'] = $this->admin_model->getSubcategories('8');
			$data['categories9'] = $this->admin_model->getSubcategories('9');
			$data['categories10'] = $this->admin_model->getSubcategories('10');
			$data['categories11'] = $this->admin_model->getSubcategories('11');
			$data['validation_error'] = "A Validation error occurred while adding Hajj Kit Products. Please click the <strong>'Hajj Kits'</strong> tab to correct.";
			$this->load->view('admin/add_page',$data);
		}
		else
		{
			$get_id = $this->admin_model->add_hajjkit();
			
			$this->load->library('upload');

			/* Upload image for each array index in $upload_image */
			foreach($this->upload_image as $i)
			{
				/* If image 1, 2, 3, etc are set, run the upload */
				if(!empty($_FILES['file'.$i]['name']))
				{
					$config['file_name'] = $get_id . '_' . $i;
					$config['upload_path'] = './images/';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = TRUE;

					$this->upload->initialize($config);
					
					/* Grab the file inputs name in each loop and do upload */
					$input_name = "file" . $i;
					if ( ! $this->upload->do_upload($input_name))
					{
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('admin/add_products_page');
					}
				}
			}
			
			redirect('admin/add_products_page');
		}
	}
													/* *****END ADD PRODUCT FUNCTIONS***** */

													/* *****BEGIN EDIT FUNCTIONS***** */
	public function edit_book()
	{
		$get_id = $this->admin_model->edit_book();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
				
			}
		
		}
		
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');	
	}
	
	public function edit_clothes()
	{
		$get_id = $this->admin_model->edit_clothes();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
			}
		}
	
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');
	}
	
	public function edit_perfume()
	{
		$get_id = $this->admin_model->edit_perfume();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
			}
		}
		
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');
	}
	
	public function edit_decor()
	{
		$get_id = $this->admin_model->edit_decor();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
			}
		}
		
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');
	}
	
	public function edit_cd_dvd()
	{
		$get_id = $this->admin_model->edit_cd_dvd();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
			}
		}
		
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');
	}
	
	public function edit_date_sweet()
	{
		$get_id = $this->admin_model->edit_date_sweet();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
			}
		}
		
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');
	}
	
	public function edit_electronics()
	{
		$get_id = $this->admin_model->edit_electronics();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
			}
		}
		
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');
	}
	
	public function edit_health_beauty()
	{
		$get_id = $this->admin_model->edit_health_beauty();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
			}
		}
		
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');
	}
	
	public function edit_children()
	{
		$get_id = $this->admin_model->edit_children();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
			}
		}
		
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');
	}
	
	public function edit_hajjkit()
	{
		$get_id = $this->admin_model->edit_hajjkit();
		
		$this->load->library('upload');

		/* Upload image for each array index in $upload_image */
		foreach($this->upload_image as $i)
		{
			/* If image 1, 2, 3, etc are set, run the upload */
			if(!empty($_FILES['file'.$i]['name']))
			{
				$config['file_name'] = $get_id . '_' . $i;
				$config['upload_path'] = './images/';
				$config['allowed_types'] = 'jpg';
				$config['overwrite'] = TRUE;

				$this->upload->initialize($config);
				
				/* Grab the file inputs name in each loop and do upload */
				$input_name = "file" . $i;
				if ( ! $this->upload->do_upload($input_name))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('admin/index');
				}
			}
		}
		
		$this->session->set_flashdata('success', "Successfully Updated product number '$get_id'");
		redirect('admin/index');
	}
													/* *****END EDIT FUNCTIONS***** */
}