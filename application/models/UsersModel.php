<?php 
/**
 * User Model
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
 * Class User Model
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
class UsersModel extends CI_model
{

    /**
     * Method to save user
     * 
     * @param $userdata User data
     * 
     * @return void
     */
    public function save($userdata)
    {
        $this->db->insert('users', $userdata);
        return $this->db->insert_id();
    }
}

?>