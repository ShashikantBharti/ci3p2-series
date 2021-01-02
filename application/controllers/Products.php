<?php 
/**
 * Pages Controller
 * 
 * PHP Version 7
 * 
 * @category   CodeIgniter3
 * @package    CEDCOSS
 * @subpackage CodeIgniter3
 * @author     Shashikant Bharti <surya.indian321@gmail.com>
 * @license    https://cedcoss.com/ <CEDCOSS 2020>
 * @link       http://localhost/training/ci3p2/
 * @since      Version 1.0
 */

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Class Pages
 * 
 * PHP Version 7
 * 
 * @category   CodeIgniter3
 * @package    CEDCOSS
 * @subpackage CodeIgniter3
 * @author     Shashikant Bharti <surya.indian321@gmail.com>
 * @license    https://cedcoss.com/ <CEDCOSS 2020>
 * @link       http://localhost/training/ci3p2/
 * @since      Version 1.0
 */
class Products extends CI_Controller
{
    /**
     * Constructor for Product
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductsModel');
    }

    /**
     * Index method for products
     * 
     * @return page
     */
    public function index()
    {
        $data['title'] = 'Products';

        $this->load->view('header', $data);
        $this->load->view('products/index', $data);
        $this->load->view('footer', $data);
    }

    /**
     * Ajax Method for pagination.
     * 
     * @return void
     */
    public function indexAjax($offset = null)
    {
        $search = array(
            'searchKey' => trim($this->input->post('search'))
        );

        $limit = 4;
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = site_url('products/indexAjax/');
        $config['total_rows'] = $this->ProductsModel->getProducts($limit, $offset, $search, $count = true);
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="" class="current_page page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['first_open_tag'] = '<li class="page-item">';
        $config['first_close_tag'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_open_tag'] = '<li class="page-item">';
        $config['last_close_tag'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['title'] = 'Products List';

        $data['products'] = $this->ProductsModel->getProducts($limit, $offset, $search, $count = false);
        $data['pagelinks'] = $this->pagination->create_links();

        $this->load->view('products/indexAjax', $data);
    }
}

?>