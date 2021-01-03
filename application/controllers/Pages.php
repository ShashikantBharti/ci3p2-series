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
class Pages extends CI_Controller
{

    /**
     * Constructor for Page controller
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PageModel');
    }
    /**
     * View Method.
     * 
     * @param $page Name of Page
     * 
     * @return void
     */
    public function view($page)
    {
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);

        $this->load->view('header', $data);
        $this->load->view('/pages/'.$page, $data);
        $this->load->view('footer', $data);
    }

    /**
     * Index Method.
     * 
     * @param $page Name of Page
     * 
     * @return void
     */
    public function index($page = 'index')
    {
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);

        $this->load->view('header', $data);
        $this->load->view('/pages/'.$page, $data);
        $this->load->view('footer', $data);
    }
    /**
     * Index Method.
     * 
     * @return page
     */
    public function contact()
    {
        $data['title'] = 'Contact';

        $this->load->view('header', $data);
        $this->load->view('/pages/contact', $data);
        $this->load->view('footer', $data);
    }
    /**
     * Method to save contact form data.
     * 
     * @return void
     */
    public function contactSubmit()
    {
        $data['title'] = 'Contact';
        $this->form_validation->set_rules(
            'name', 'Name', 'trim|required'
        );
        $this->form_validation->set_rules(
            'email', 'Email', 'trim|required|valid_email'
        );
        $this->form_validation->set_rules(
            'mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]'
        );
        $this->form_validation->set_rules(
            'message', 'Message', 'trim|required'
        );

        // $this->form_validation->set_error_delimiters(
        //     '<div class="invalid-feedback">', '</div>'
        // );

        if ($this->form_validation->run() == false) {
            $response = array(
                'status'=>'error',
                'message' => validation_errors()
            );
        } else {
            $contactData = array(
                'name'=>$this->input->post('name', true),
                'email'=>$this->input->post('email', true),
                'mobile'=>$this->input->post('mobile', true),
                'message'=>$this->input->post('message', true)
            );

            $this->PageModel->insertContactData($contactData);

            $response = array(
                'status'=>'success',
                'message' => 'Message sent <strong>successfully!</strong>'
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }
}

?>