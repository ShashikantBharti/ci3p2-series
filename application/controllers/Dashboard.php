<?php 
/**
 * Dashboard Controller
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
 * Dashboard Controller
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
class Dashboard extends CI_Controller
{

    /**
     * Constructor for User class
     */
    public function __construct()
    {
        parent::__construct();
        $this->_isLoggedIn();
        $this->load->model('UsersModel');
    }

    /**
     * Method to check if user is logged in or not.
     * 
     * @return void
     */
    private function _isLoggedIn()
    {
        if (!$this->session->userdata('authenticated')) {
            $this->session->set_flashdata('message', 'You are <strong>not logged in</strong>!');
            $this->session->set_flashdata('className', 'alert-danger');
            redirect('users/login');
        }
    }

    /**
     * Sign Up Method.
     * 
     * @return void
     */
    public function index()
    {
        $data['title'] = "Dashboard";

        $id = $this->session->userdata('id');
        $data['user'] = $this->UsersModel->getUser($id);

        $this->load->view('header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('footer', $data);
       
    }

}

?>