<?php 
$connect = new PDO("mysql:host=localhost;dbname=online bookstore", "root", "");
class Product_filter extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('product_filter_model');
 }

 function index()
 {
  $data['brand_data'] = $this->product_filter_model->fetch_filter_type('Book_id');
  $data['ram_data'] = $this->product_filter_model->fetch_filter_type('Book_title');
  $data['product_storage'] = $this->product_filter_model->fetch_filter_type('Book_price');
  $this->load->view('product_filter', $data);
 }

 function fetch_data()
 {
  sleep(1);
  $minimum_price = $this->input->post('minimum_price');
  $maximum_price = $this->input->post('maximum_price');
  $brand = $this->input->post('Book_id');
  $ram = $this->input->post('Book_title');
  $storage = $this->input->post('Book_price');
  $this->load->library('pagination');
  $config = array();
  $config['base_url'] = '#';
  $config['total_rows'] = $this->product_filter_model->count_all($minimum_price, $maximum_price, $brand, $ram, $storage);
  $config['per_page'] = 8;
  $config['uri_segment'] = 3;
  $config['use_page_numbers'] = TRUE;
  $config['full_tag_open'] = '<ul class="pagination">';
  $config['full_tag_close'] = '</ul>';
  $config['first_tag_open'] = '<li>';
  $config['first_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_tag_close'] = '</li>';
  $config['next_link'] = '&gt;';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['prev_link'] = '&lt;';
  $config['prev_tag_open'] = '<li>';
  $config['prev_tag_close'] = '</li>';
  $config['cur_tag_open'] = "<li class='active'><a href='#'>";
  $config['cur_tag_close'] = '</a></li>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';
  $config['num_links'] = 3;
  $this->pagination->initialize($config);
  $page = $this->uri->segment(3);
  $start = ($page - 1) * $config['per_page'];
  $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'product_list'   => $this->product_filter_model->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price, $brand, $ram, $storage)
  );
  echo json_encode($output);
 }
  
}
?>

<?php

class Product_filter_model extends CI_Model
{
 function fetch_filter_type($type)
 {
  $this->db->distinct();
  $this->db->select($type);
  $this->db->from('Books');
  $this->db->where('product_status', '1');
  return $this->db->get();
 }

 function make_query($minimum_price, $maximum_price, $brand, $ram, $storage)
 {
  $query = "
  SELECT * FROM books 
  WHERE product_status = '1' 
  ";

  if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
  {
   $query .= "
    AND product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."'
   ";
  }

  if(isset($brand))
  {
   $brand_filter = implode("','", $brand);
   $query .= "
    AND product_brand IN('".$brand_filter."')
   ";
  }

  if(isset($ram))
  {
   $ram_filter = implode("','", $ram);
   $query .= "
    AND product_ram IN('".$ram_filter."')
   ";
  }

  if(isset($storage))
  {
   $storage_filter = implode("','", $storage);
   $query .= "
    AND product_storage IN('".$storage_filter."')
   ";
  }
  return $query;
 }

 function count_all($minimum_price, $maximum_price, $brand, $ram, $storage)
 {
  $query = $this->make_query($minimum_price, $maximum_price, $brand, $ram, $storage);
  $data = $this->db->query($query);
  return $data->num_rows();
 }

 function fetch_data($limit, $start, $minimum_price, $maximum_price, $brand, $ram, $storage)
 {
  $query = $this->make_query($minimum_price, $maximum_price, $brand, $ram, $storage);

  $query .= ' LIMIT '.$start.', ' . $limit;

  $data = $this->db->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   {
    $output .= '
    <div class="col-sm-4 col-lg-3 col-md-3">
     <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
      <img src="'.base_url().'books/'. $row['Book_image'] .'" alt="" class="img-responsive" >
      <p align="center"><strong><a href="#">'. $row['Book_id'] .'</a></strong></p>
      <h4 style="text-align:center;" class="text-danger" >'. $row['Book_price'] .'</h4>
     
      Brand : '. $row['Book_id'] .' <br />
      RAM : '. $row['Book_title'] .' GB<br />
      Storage : '. $row['Book_price'] .' GB </p>
     </div>
    </div>
    ';
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 }
}

?>