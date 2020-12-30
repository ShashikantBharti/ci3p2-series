<?php 
/**
 * News Model
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
 * Class Model
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
class NewsModel extends CI_model
{

    protected $db1;

    /**
     * Constructor.
     * 
     * @return news
     */
    public function __construct()
    {
        parent::__construct();
        $this->db1 = $this->load->database('development', TRUE);

    }

    /**
     * Function to Get News From Database.
     * 
     * @return news
     */
    public function allNews()
    {


        // Select Particular fields
        $this->db->select('title, description');

        // return $this->db1->get('news')->result();    // Development Database
        return $this->db->get('news')->result();  // Default Database

    }
}
?>