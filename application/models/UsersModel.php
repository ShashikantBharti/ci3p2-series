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

    /**
     * Method to Login user
     * 
     * @param $email    User Email
     * @param $password User Password
     * 
     * @return void
     */
    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('active', 1);
        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            return $result->row();
        } 
        return false;
    }

    /**
     * Method to get single user
     * 
     * @param $id User id
     * 
     * @return userdata
     */
    public function getUser($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users')->row();
    }

    /**
     * Method to update user
     * 
     * @param $id       User ID
     * @param $userdata User Data
     * 
     * @return bool
     */
    public function update($id, $userdata)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $userdata);
    }
}

?>