<?php 
/**
 * News Controller
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
 * News Controller
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
class News extends CI_Controller
{

    /**
     * Load Default Things.
     */
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('news', 'hindi');

        $this->load->model('NewsModel');
    }

    /**
     * Index Method
     * 
     * @return void
     */
    public function index()
    {
        $data['title'] = $this->lang->line('news_title');

        // Set Session Data
        // $this->session->set_userdata('email', 'surya@gmail.com');

        $arr = array(
            'id'=>1001,
            'name'=>'Shashikant Bharti',
            'mobile'=>'7080281021',
            'email'=>'surya.indian321@gmail.com'
        );

        $this->session->set_userdata($arr);

        // Unset Session
        // $this->session->unset_userdata('email');
        // $this->session->unset_userdata('name');

        // Destroy Session
        // $this->session->sess_destroy();

        // Flash Data : Show only once
        $this->session->set_flashdata('message', 'Record Saved Successfully!');

        // Session Data : Mark as Flash : Also delete from session.
        $this->session->mark_as_flash('name');

        // Set Temp Data : 
        $this->session->set_tempdata('DOB', '15-09-1997', 10);
        // $this->session->set_tempdata($arr, null, 10);

        // mark as temp : 
        $this->session->mark_as_temp('email', 5);
        
        $data['users'] = array('Ram', 'Shyam', 'Rahul');
        $data['allNews'] = $this->NewsModel->allNews();
        $this->load->view('/news/index', $data);
    }

    /**
     * Details Method
     * 
     * @return void
     */
    public function details()
    {
        $this->load->view('/news/details');
    }


}

?>