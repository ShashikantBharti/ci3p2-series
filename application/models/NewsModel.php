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
        $this->db1 = $this->load->database('development', true);

    }

    /**
     * Function to Get News From Database.
     * 
     * @return news
     */
    public function allNews()
    {

        // Select Particular fields
        // $this->db->select('title, description');

        // return $this->db1->get('news')->result();    // Development Database

        // Return by query
        // return $this->db->query('SELECT * FROM `news`')->result();

        // Set WHERE Clause
        // $this->db->where('active', 1);

        // Sort Data
        $this->db->order_by('create_at', 'DESC');

        // Set LIMIT
        // $this->db->limit(4);

        // Pass condition in array format : We can pass multiple conditions in array.
        // $this->db->where(array('active'=>1));

        // Return by method
        return $this->db->get('news')->result();  // Default Database

        /* Note:---------------------------------
        result() : returns all data in object form
        result_array() : returns all data in array form
        row() : returns single row in object form
        row_array() : returns single row in array form
        */

    }

    /**
     * Method to insert news into database.
     * 
     * @param $id News Data ID.
     * 
     * @return int Last insert ID
     */
    public function getNews($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('news')->row();
    }

    /**
     * Method to insert news into database.
     * 
     * @param $newsdata News Data.
     * 
     * @return int Last insert ID
     */
    public function insertNews($newsdata = '')
    {
        $this->db->insert('news', $newsdata);
        return $this->db->insert_id();
    }

    /**
     * Method to Update news into database.
     * 
     * @param $id       ID of record.
     * @param $newsdata News Data.
     * 
     * @return int Last insert ID
     */
    public function updateNews($id, $newsdata = '')
    {
        $this->db->where('id', $id);
        $this->db->update('news', $newsdata);
    }

    /**
     * Method to Delete news into database.
     * 
     * @param $id ID of record.
     * 
     * @return int Last insert ID
     */
    public function deleteNews($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('news');
    }
}
?>