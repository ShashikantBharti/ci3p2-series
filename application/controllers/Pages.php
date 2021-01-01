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
}

?>