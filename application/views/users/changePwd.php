<?php 
/**
 * Login View
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

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 my-3">
            <?php if (!empty($this->session->flashdata('message'))) : ?>
            <div class="alert <?php echo $this->session->flashdata('className'); ?> alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="card-header-title h5 text-white"><?php echo $title; ?></div>
                </div>
                <div class="card-body">
                    <?php 
                        echo form_open('users/changePwd', array('id'=>'loginForm', 'class'=>'loginForm', 'name'=>'loginForm')); 
                       
                        echo '<div class="form-group mt-2">';
                        echo form_label('Old Password', 'oldPwd');
                        $validOldPwd = empty(form_error('oldPwd'))?'':'is-invalid';
                        echo form_input(array('id'=>'oldPwd', 'name'=>'oldPwd', 'type'=>'password', 'class'=>"form-control $validOldPwd", 'placeholder'=>'Your Old Password', 'value'=>set_value('oldPwd')));
                        echo form_error('oldPwd', '<div class="invalid-feedback">', '</div>');
                        echo '</div>';

                        echo '<div class="form-group mt-2">';
                        echo form_label('New Password', 'newPwd');
                        $validNewPwd = empty(form_error('newPwd'))?'':'is-invalid';
                        echo form_input(array('id'=>'newPwd', 'name'=>'newPwd', 'type'=>'password', 'class'=>"form-control $validNewPwd", 'placeholder'=>'Your New Password', 'value'=>set_value('newPwd')));
                        echo form_error('newPwd', '<div class="invalid-feedback">', '</div>');
                        echo '</div>';

                        echo '<div class="form-group mt-2">';
                        echo form_label('Confirm Password', 'confPwd');
                        $validConfPwd = empty(form_error('confPwd'))?'':'is-invalid';
                        echo form_input(array('id'=>'confPwd', 'name'=>'confPwd', 'type'=>'password', 'class'=>"form-control $validConfPwd", 'placeholder'=>'Confirm New Password', 'value'=>set_value('confNewPwd')));
                        echo form_error('confPwd', '<div class="invalid-feedback">', '</div>');
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo form_button(array('type'=>'submit', 'class'=>'btn btn-primary mt-3', 'name'=>'submit', 'value'=>'changePwd'), 'Change Password');
                        echo '</div>';

                        echo form_close();
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
