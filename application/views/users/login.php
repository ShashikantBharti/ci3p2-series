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
                        echo form_open('users/login', array('id'=>'loginForm', 'class'=>'loginForm', 'name'=>'loginForm')); 
                       
                        echo '<div class="form-group">';
                        echo form_label('Email Id', 'email');
                        $validEmail = empty(form_error('email'))?'':'is-invalid';
                        echo form_input(array('id'=>'email', 'name'=>'email', 'class'=>"form-control $validEmail", 'placeholder'=>'Your Email Address', 'value'=>set_value('email')));
                        echo form_error('email', '<div class="invalid-feedback">', '</div>');
                        echo '</div>';

                        echo '<div class="form-group mt-2">';
                        echo form_label('Password', 'password');
                        $validPassword = empty(form_error('password'))?'':'is-invalid';
                        echo form_input(array('id'=>'password', 'name'=>'password', 'type'=>'password', 'class'=>"form-control $validPassword", 'placeholder'=>'Your Password', 'value'=>set_value('password')));
                        echo form_error('email', '<div class="invalid-feedback">', '</div>');
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo form_button(array('type'=>'submit', 'class'=>'btn btn-primary mt-3', 'name'=>'submit', 'value'=>'login'), 'Login');
                        echo '</div>';

                        echo form_close();
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
