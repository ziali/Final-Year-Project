<?php

class Customer_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
		$this->load->helper('date');
    }
	
	function get_subcategories($id)
	{
		$this->db->select('subcat_id,subcat_name');
		$this->db->where('cat_id', $id);
		$res = $this->db->get('subcategories');
		
		$subcategories = array();
		
		foreach($res->result() as $row)
		{
			$subcategories[$row->subcat_id] = $row->subcat_name;
			//$subcategories[$row->cat_id][$row->subcat_id] = $row->subcat_name;
		}
		
		return $subcategories;
	}
	
	function generate_list()
	{
		$list = $this->input->post('search_field');
		
		$this->db->select('title');
		$this->db->from('products');
		$this->db->like('title', $list);
		$res = $this->db->get();
		
		$data = array();
		foreach($res->result() as $row)
		{
			$data[] = $row->title;
		}
		
		return $data;
	}
	
	function get_featured_item($id)
	{
		$this->db->select('product_id, title, price');
		$this->db->from('products');
		$this->db->where('product_id', $id);
		$res = $this->db->get();
		
		return $res->result_array();	
	}
	
	function get_total_rows($id)
	{
		$this->db->select('subcat_id');
		$this->db->from('products');
		$this->db->where('subcat_id', $id);
		$res = $this->db->get();
		return $res->num_rows();
	}
	
	function get_subcat_products($id, $limit, $offset)
	{
		$this->db->select('products.product_id, products.title, products.price, subcategories.subcat_name');
		$this->db->from('products');
		$this->db->where('products.subcat_id', $id);
		$this->db->join('subcategories', 'products.subcat_id = subcategories.subcat_id', 'inner');
		$this->db->limit($limit, $offset);
		$res = $this->db->get();
		
		return $res->result_array();
	}
	
	/*Function to return total rows for search query*/
	function search_query_total_rows($query)
	{	
		$this->db->select('title');
		$this->db->from('products');
		$this->db->like('title', $query);
		$res = $this->db->get();
		return $res->num_rows();
	}
	
	/*Function to return all matching products based on search criteria */
	function get_searched_products($query, $limit, $offset)
	{
		$this->db->select('products.product_id, products.title, products.price');
		$this->db->from('products');
		$this->db->like('title', $query);
		$this->db->limit($limit, $offset);
		$res = $this->db->get();
		
		return $res->result_array();
	}
	
	/*Function to get the number of products ordered by date_added, for new arrivals page*/
	function new_arrivals_total_rows()
	{
		$this->db->select('title');
		$this->db->from('products');
		$this->db->order_by('date_added', 'desc');
		$res = $this->db->get();
		return $res->num_rows();
	}
	
	/*Function to select all products and order them by date, for new arrivals page*/
	function get_latest_products($limit, $offset)
	{
		$this->db->select('products.product_id, products.title, products.price');
		$this->db->from('products');
		$this->db->order_by('date_added', 'desc');
		$this->db->limit($limit, $offset);
		$res = $this->db->get();
		
		return $res->result_array();
	}
	
	/*Function that gets all product details for product_page*/
	function get_product_info($id)
	{
		$this->db->select('products.product_id,
						   products.title,
						   products.description,
						   products.price,
						   products.stock');
		$this->db->from('products');
		$this->db->where('product_id', $id);
		$result = $this->db->get();
		$array1 = $result->result_array();
		
		$this->db->select('name, value');
		$this->db->from('product_attributes');
		$this->db->where('product_id', $id);
		$result2 = $this->db->get();
		$array2 = $result2->result_array();
		
		foreach($array2 as $key => $value)
		{
			//had to create new array and then merge them because indexing array1 only gives out the last available 'size' if
			//the product is a clothing item. need to figure out why, otherwise it creates ambiguous amount of indexes for the view
			$array3[$key] = $value;
		}
		
		return array_merge($array1, $array3);
	}
	
	/*Get back title and price of product to insert into cart*/
	function add_product($id)
	{
		$this->db->select('title, price');
		$this->db->from('products');
		$this->db->where('product_id', $id);
		$this->db->limit(1); //only get back one result
		$res = $this->db->get();
		
		return $res->result_array();
	}
	
	function update_cart()
	{
		$total = $this->cart->total_items();  
		
		$rowid = $this->input->post('rowid');  
		$qty = $this->input->post('qty');  
	  
		for($i=0;$i < $total;$i++)  
		{  
			$data = array(
				  'rowid' => $rowid[$i],
				  'qty'   => $qty[$i]
			   );
			   
			$this->cart->update($data);  
		}  
  
	}
}