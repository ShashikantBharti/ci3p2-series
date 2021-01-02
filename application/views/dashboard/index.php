<?php 
/**
 * Dashboard index view.
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

?>

<div class="container py-3">
    <h1 class="h4 text-uppercase"><?php echo $title; ?></h1>
    <p class="lead">Welcome <strong class="text-uppercase"><?php echo $this->session->userdata('firstName'); ?></strong></p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad esse doloremque, perferendis ipsam unde amet, laborum illo quos quam numquam praesentium quas maxime eligendi culpa recusandae quasi voluptatem deserunt. Magnam aliquam eum repudiandae voluptas assumenda earum soluta esse ducimus adipisci. Commodi natus tempora ad nam, aliquam temporibus facilis blanditiis nesciunt.</p>
    <div class="row">
        <div class="col-md-9">
            <div class="user-profile shadow p-2">
                <!-- Alert Message -->
                <?php if (!empty($this->session->flashdata('message'))) : ?>
                <div class="alert <?php echo $this->session->flashdata('className'); ?> alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <!-- //Alert Message -->
                <table class="table table-hover table-striped">
                    <tr>
                        <th>First Name</th>
                        <td><?php echo $user->first_name; ?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo $user->last_name; ?></td>
                    </tr>
                    <tr>
                        <th>Email ID</th>
                        <td><?php echo $user->email; ?></td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td><?php echo $user->mobile; ?></td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td><?php echo $user->created_at; ?></td>
                    </tr>
                    <tr>
                        <th>Action</th>
                        <td>
                            <?php 
                                echo anchor('', 'Edit Profile', array('class'=>'btn btn-sm btn-primary bg-gradient m-1'));
                                echo anchor('', 'Change Password', array('class'=>'btn btn-sm btn-info text-white bg-gradient m-1'));
                                echo anchor('users/logout', 'Logout', array('class'=>'btn btn-sm btn-danger m-1 bg-gradient'));
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-3">
            <div class="user-img">
                <?php 
                if ($user->profile_photo) {
                    $path = 'uploads/'.$user->profile_photo;
                } else {
                    $path = 'assets/images/user.png';
                }
                ?>
                <img src="<?php echo base_url($path); ?>" alt="User Image" class="img-thumbnail shadow">
                <div class="d-grid gap-2">
                    <?php echo anchor('users/upload', 'Upload Image', array('class'=>'btn btn-primary mt-2 btn-sm bg-gradient')); ?>
                </div>
            </div>
        </div>
    </div>
</div>
