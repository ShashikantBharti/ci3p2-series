<?php 
/**
 * Products Model
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
class ProductsModel extends CI_model
{

    /**
     * Constructor for Products Model
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Method to fetch products
     * 
     * @param $limit  Number of records
     * @param $offset Offset
     * @param $count  Something
     * 
     * @return array Products
     */
    public function getProducts($limit, $offset, $search, $count = true)
    {
        $this->db->select('*');
        $this->db->from('products');

        if ($search) {
            $searchKey = $search['searchKey'];

            if ($searchKey) {
                $this->db->where("product_name LIKE '%$searchKey%'");
            }
        }

        if ($count) {
            return $this->db->count_all_results();
        } else {
            $this->db->limit($limit, $offset);
            $result = $this->db->get();
            if ($result -> num_rows() > 0) {
                return $result->result();
            }
        }

        return array();
    }
}

?>