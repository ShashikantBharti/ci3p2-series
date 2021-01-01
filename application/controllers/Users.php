<?php 
/**
 * User Controller
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
 * User Controller
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
class Users extends CI_Controller
{

    /**
     * Constructor for User class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModel');
    }

    /**
     * Sign Up Method.
     * 
     * @return void
     */
    public function signup()
    {
        $data['title'] = "Sign Up";

        $this->form_validation->set_rules(
            'firstName', 'First Name', 'trim|required|min_length[5]|max_length[12]'
        );
        $this->form_validation->set_rules(
            'lastName', 'Last Name', 'trim|required|min_length[5]|max_length[12]'
        );
        $this->form_validation->set_rules(
            'email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]'
        );
        $this->form_validation->set_rules(
            'mobile', 'Mobile Number', 'required|regex_match[/^[0-9]{10}$/]'
        );
        $this->form_validation->set_rules(
            'password', 'Password', 'required'
        );
        $this->form_validation->set_rules(
            're-password', 'Confirm Password', 'required|matches[password]'
        );

        // Show Validation Message
        $this->form_validation->set_error_delimiters(
            '<div class="invalid-feedback">', '</div>'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('header', $data);
            $this->load->view('users/signup', $data);
            $this->load->view('footer', $data);
        } else {
            $userdata = array(
                'first_name' => $this->input->post('firstName', true),
                'last_name' => $this->input->post('lastName', true),
                'email' => $this->input->post('email', true),
                'mobile' => $this->input->post('mobile', true),
                'password' => md5($this->input->post('password', true))
            );

            $this->UsersModel->save($userdata);

            $this->session->set_flashdata('message', 'Registration successfull!');

            redirect('users/login');
        }
    }

    /**
     * Login Method
     * 
     * @return void
     */
    public function login()
    {
        $data['title'] = 'Login';

        $this->load->view('header', $data);
        $this->load->view('users/login', $data);
        $this->load->view('footer', $data);
    }
}

?>