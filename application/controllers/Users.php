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
            'password', 'Password', 'required|min_length[8]'
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

            $this->session->set_flashdata('message', '<strong>Registration</strong> successfull!');
            $this->session->set_flashdata('className', 'alert-success');

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
        if ($this->session->userdata('authenticated')) {
            redirect('dashboard');
        }
        $data['title'] = 'Login';

        $this->form_validation->set_rules(
            'email', 'Email ID', 'trim|required|valid_email'
        );
        $this->form_validation->set_rules(
            'password', 'Password', 'required'
        );

        // Show Validation Message
        $this->form_validation->set_error_delimiters(
            '<div class="invalid-feedback">', '</div>'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('header', $data);
            $this->load->view('users/login', $data);
            $this->load->view('footer', $data);
        } else {
            
            $email = $this->security->xss_clean($this->input->post('email', true));
            $password = md5($this->security->xss_clean($this->input->post('password', true)));
            

            $user = $this->UsersModel->login($email, $password);

            if ($user) {
                $userdata = array(
                    'id' => $user->id,
                    'firstName' => $user->first_name,
                    'lastName' => $user->last_name,
                    'email' => $user->email,
                    'mobile' => $user->mobile,
                    'authenticated' => true
                );

                $this->session->set_userdata($userdata);

                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<strong>Email ID</strong> or <strong>Password</strong> is Incorrect!');
                $this->session->set_flashdata('className', 'alert-danger');
                redirect('users/login');
            }

        }
    }

    /**
     * Logout function 
     * 
     * @return void
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('users/login');
    }

    /**
     * Upload file method
     * 
     * @return void
     */
    public function upload()
    {

        $this->_isLoggedIn();
        $data['title'] = 'Upload File';

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('userFile')) {
            if (isset($_FILES['userFile'])) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $data['error'] = '';
            }

            $this->load->view('header', $data);
            $this->load->view('users/upload', $data);
            $this->load->view('footer', $data);
        } else {
            $id = $this->session->userdata('id');

            $user = $this->UsersModel->getUser($id);

            if ($user->profile_photo and file_exists('uploads/'.$user->profile_photo)) {
                unlink('uploads/'.$user->profile_photo);
            }

            $uploaddata = $this->upload->data();
            $filename = $uploaddata['file_name'];

            $userdata = array(
                'profile_photo' => $filename
            );

            $this->UsersModel->update($id, $userdata);

            $this->session->set_flashdata('message', 'File <strong>uploaded</strong> successfully!');
            $this->session->set_flashdata('className', 'alert-success');
            redirect('dashboard');
        }
    }
}

?>