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
        // $this->session->set_flashdata('message', 'Record Saved Successfully!');

        // Session Data : Mark as Flash : Also delete from session.
        $this->session->mark_as_flash('name');

        // Set Temp Data : 
        $this->session->set_tempdata('DOB', '15-09-1997', 10);
        // $this->session->set_tempdata($arr, null, 10);

        // mark as temp : 
        $this->session->mark_as_temp('email', 5);
        
        $data['users'] = array('Ram', 'Shyam', 'Rahul');
        $data['allNews'] = $this->NewsModel->allNews();

        $this->load->view('header', $data);
        $this->load->view('/news/index', $data);
        $this->load->view('footer', $data);
    }

    /**
     * Add Method
     * 
     * @return void
     */
    public function add()
    {
        $title = '"Scrap 3 Farm Laws Lest Kerala Starves": Unanimous Assembly Resolution';
        $description = 'Thiruvananthapuram: The Kerala Legislative Assembly today unanimously passed a resolution seeking the withdrawal of all the three contentious agricultural laws enacted hurriedly by parliament in September. Raising the state\'s fears over the effects of prolonged tumult in the country\'s farm sector, the resolution said "Kerala could not bear the impact of such a situation", particularly amid the ravaging COVID-19 pandemic. The new farm laws have sparked a furious bout of protests among farmers of Punjab, Haryana, Uttar Pradesh, and other states that is yet to abate.';

        $newsdata = array(
            'title' => $title,
            'description' => $description,
            'active' => 0
        );

        $newsid = $this->NewsModel->insertNews($newsdata);
        $this->session->set_flashdata('message', 'Record inserted successfully!');
        redirect('news');
    }

    /**
     * Edit Method
     * 
     * @param $id ID Of Record to edit.
     * 
     * @return void
     */
    public function edit($id)
    {
        $title = 'Scrap 3 Farm Laws Lest Kerala Starves';
        $description = 'The Kerala Legislative Assembly today unanimously passed a resolution seeking the withdrawal of all the three contentious agricultural laws enacted hurriedly by parliament in September. Raising the state\'s fears over the effects of prolonged tumult in the country\'s farm sector, the resolution said "Kerala could not bear the impact of such a situation", particularly amid the ravaging COVID-19 pandemic. The new farm laws have sparked a furious bout of protests among farmers of Punjab, Haryana, Uttar Pradesh, and other states that is yet to abate.';

        $newsdata = array(
            'title' => $title,
            'description' => $description,
            'active' => 1
        );

        $newsid = $this->NewsModel->updateNews($id, $newsdata);
        $this->session->set_flashdata('message', 'Record Updated successfully!');
        redirect('news');
    }

    /**
     * Delete Method
     * 
     * @param $id ID Of Record to edit.
     * 
     * @return void
     */
    public function delete($id)
    {
        $newsid = $this->NewsModel->deleteNews($id);
        $this->session->set_flashdata('message', 'Record Deleted successfully!');
        redirect('news');
    }

    /**
     * Details Method
     * 
     * @param $id ID of Record
     * 
     * @return void
     */
    public function details($id)
    {
        $news = $this->NewsModel->getNews($id);
        $data['title'] = $news->title;
        $data['news'] = $news;
        $this->load->view('news/details', $data);
    }


}

?>