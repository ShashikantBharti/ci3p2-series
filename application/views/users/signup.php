<h1><?php echo $title; ?></h1>

<?php 

    //Normal Form
    echo form_open('users/signup', array('id'=>'signupForm', 'class'=>'signupForm'));
    // Form With Multipart form data
    // echo form_open_multipart('users/signup', array('id'=>'signupForm', 'class'=>'signupForm'));

?>

<?php 
    echo form_label('First Name', 'firstName');
    echo form_input(array('id'=>'firstName','class'=>'form-control','placeholder'=>'First Name','name'=>'firstName', 'value'=>set_value('firstName'))); 
    echo form_error('firstName', '<div class="error">', '</div>');
    echo form_label('Last Name', 'lastName');
    echo form_input(array('id'=>'lastName','class'=>'form-control','placeholder'=>'Last Name','name'=>'lastName', 'value'=>set_value('lastName'))); 
    echo form_error('lastName', '<div class="error">', '</div>');
    echo form_label('Email Address', 'email');
    echo form_input(array('id'=>'email','class'=>'form-control','placeholder'=>'Email Address','name'=>'email', 'value'=>set_value('email'))); 
    echo form_error('email', '<div class="error">', '</div>');
    echo form_label('Mobile Number', 'mobile');
    echo form_input(array('id'=>'mobile','class'=>'form-control','placeholder'=>'Mobile Number','name'=>'mobile', 'value'=>set_value('mobile'))); 
    echo form_error('mobile', '<div class="error">', '</div>');
    echo form_label('Password', 'password');
    echo form_input(array('id'=>'password','class'=>'form-control','placeholder'=>'Password','name'=>'password', 'type'=>'password', 'value'=>set_value('password'))); 
    echo form_error('password', '<div class="error">', '</div>');
    echo form_label('Confirm Password', 're-password');
    echo form_input(array('id'=>'re-password','class'=>'form-control','placeholder'=>'Confirm Password','name'=>'re-password', 'type'=>'password', 'value'=>set_value('re-password'))); 
    echo form_error('re-password', '<div class="error">', '</div>');
    echo form_button(array('type'=>'submit','value'=>'submit', 'name'=>'signup'), 'Sign Up');
?>

<?php echo form_close(); ?>