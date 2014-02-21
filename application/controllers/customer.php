<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
		$this->load->library('cart');
	}
	
	public function index()
	{
		$data = $this->getSubcats();
		$data += $this->featured();
		//var_dump($data);
		$this->load->view('home_page',$data);
	}
	
	public function getSubcats()
	{
		$data['subcategory1'] = $this->customer_model->get_subcategories('1');
		$data['subcategory2'] = $this->customer_model->get_subcategories('2');
		$data['subcategory3'] = $this->customer_model->get_subcategories('3');
		$data['subcategory4'] = $this->customer_model->get_subcategories('4');
		$data['subcategory5'] = $this->customer_model->get_subcategories('5');
		$data['subcategory6'] = $this->customer_model->get_subcategories('6');
		$data['subcategory7'] = $this->customer_model->get_subcategories('7');
		$data['subcategory8'] = $this->customer_model->get_subcategories('8');
		$data['subcategory9'] = $this->customer_model->get_subcategories('9');
		$data['subcategory10'] = $this->customer_model->get_subcategories('10');
		$data['subcategory11'] = $this->customer_model->get_subcategories('11');
		return $data;
	}
	
	public function search()
	{
		$query = $this->input->post('search_field');
		$this->load->library('pagination');
		
		$config['base_url'] = base_url() . 'customer/search/';
		$config['total_rows'] = $this->customer_model->search_query_total_rows($query);
		$config['per_page'] = 10;
		$config['num_links'] = 10;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<div class="pagination pagination-large pagination-centered"><ul>';
		$config['full_tag_close'] = '</ul></div>';
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

		$data['products'] = $this->customer_model->get_searched_products($query, $config['per_page'], $offset);
		$data += $this->getSubcats();
		
		$this->load->view('subcat_page', $data);
	}
	
	public function typeahead_list()
	{
		$data = $this->customer_model->generate_list();
		
		echo json_encode($data);
	}
	
	public function featured()
	{
		//pass the ID of the desired product to the model and return the details for main page
		$data['featured_1'] = $this->customer_model->get_featured_item('166');
		$data['featured_2'] = $this->customer_model->get_featured_item('180');
		$data['featured_3'] = $this->customer_model->get_featured_item('163');
		$data['featured_4'] = $this->customer_model->get_featured_item('165');
		$data['featured_5'] = $this->customer_model->get_featured_item('164');
		return $data;
	}
	
	public function subcat_products()
	{
		//get the value from the subcategory anchor tag
		$id = $this->uri->segment(3);
		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url() . 'customer/subcat_products/' . $id . '/';
		$config['total_rows'] = $this->customer_model->get_total_rows($id);
		$config['per_page'] = 5;
		$config['num_links'] = 10;
		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<div class="pagination pagination-large pagination-centered"><ul>';
		$config['full_tag_close'] = '</ul></div>';
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
		if($this->uri->segment(4) != 0 || $this->uri->segment(4) == "")
		{
			$offset = $this->uri->segment(4);
		}
		else
		{
			$offset = 0;
		}
		
		$data['products'] = $this->customer_model->get_subcat_products($id, $config['per_page'], $offset);
		$data += $this->getSubcats();
		
		$this->load->view('subcat_page', $data);
	}
	
	public function product_main()
	{
		$id = $this->uri->segment(3);
		
		$data['product'] = $this->customer_model->get_product_info($id);
		$data += $this->getSubcats();
		
		$this->load->view('product_page', $data);
	}
	
	public function new_arrivals()
	{
		$this->load->library('pagination');
		
		$config['base_url'] = base_url() . 'customer/new_arrivals/';
		$config['total_rows'] = $this->customer_model->new_arrivals_total_rows();
		$config['per_page'] = 15;
		$config['num_links'] = 10;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<div class="pagination pagination-large pagination-centered"><ul>';
		$config['full_tag_close'] = '</ul></div>';
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

		$data['products'] = $this->customer_model->get_latest_products($config['per_page'], $offset);
		$data += $this->getSubcats();
		
		$this->load->view('subcat_page', $data);
	}
	
	public function add_product()
	{
		$product = $this->customer_model->add_product($this->input->post('product_id'));
		
		//added this to allow cart class to accept special characters in key 'name' below
		$this->cart->product_name_rules = '[:print:]';
		
		$insert = array(
			'id' => $this->input->post('product_id'),
			'qty' => 1,
			'price' => $product[0]['price'],
			'name' => $product[0]['title']
		);
		
		//if the product is a clothing item, insert selected size as option of product into cart. Size will only show up in DOM if its a clothing item.
		if($this->input->post('size'))
		{
			//options is expecting an array to be passed. See cart class documentation
			$insert['options'] = array(
				'size' => $this->input->post('size')
			);
		}
		
		$this->cart->insert($insert);
		
		//redirect to view_cart() to load form helper
		redirect('customer/view_cart');
	}
	
	public function view_cart()
	{
		$this->load->helper('form');
		$data = $this->getSubcats();
		$this->load->view('cart_page', $data);
	}
	
	public function delete()
	{
		$this->cart->update(array(
			'rowid' => $this->uri->segment(3),
			'qty' => 0
		));
		
		//redirect to view_cart() to load form helper
		redirect('customer/view_cart');
	}
	
	public function update_cart()
	{  
		$this->customer_model->update_cart();  
		redirect('customer/view_cart');  
	}
	
	public function destroy()
	{
		$this->cart->destroy();
		redirect('customer/view_cart');
	}
}