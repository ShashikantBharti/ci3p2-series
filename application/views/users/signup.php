<div class="container">
<h1><?php echo $title; ?></h1>

<?php 

    //Normal Form
    echo form_open('users/signup', array('id'=>'signupForm', 'class'=>'signupForm my-5'));
    // Form With Multipart form data
    // echo form_open_multipart('users/signup', array('id'=>'signupForm', 'class'=>'signupForm'));

?>

<div class="form-group my-2">
<?php 
    echo form_label('First Name', 'firstName');
    $firstNameValid = empty(form_error('firstName'))?'':'is-invalid';
    echo form_input(array('id'=>'firstName','class'=>"form-control $firstNameValid",'placeholder'=>'First Name','name'=>'firstName', 'value'=>set_value('firstName'))); 
    echo form_error('firstName', '<div class="invalid-feedback">', '</div>');
?>
</div> 
<div class="form-group my-2">   
<?php 
    echo form_label('Last Name', 'lastName');
    $lastNameValid = empty(form_error('lastName'))?'':'is-invalid';
    echo form_input(array('id'=>'lastName','class'=>"form-control $lastNameValid",'placeholder'=>'Last Name','name'=>'lastName', 'value'=>set_value('lastName'))); 
    echo form_error('lastName', '<div class="invalid-feedback">', '</div>');
?>
</div>
<div class="form-group my-2">
<?php
    echo form_label('Email Address', 'email');
    $emailValid = empty(form_error('email'))?'':'is-invalid';
    echo form_input(array('id'=>'email','class'=>"form-control $emailValid",'placeholder'=>'Email Address','name'=>'email', 'value'=>set_value('email'))); 
    echo form_error('email', '<div class="invalid-feedback">', '</div>');
?>
</div> 
<div class="form-group my-2">   
<?php 
    echo form_label('Mobile Number', 'mobile');
    $mobileValid = empty(form_error('mobile'))?'':'is-invalid';
    echo form_input(array('id'=>'mobile','class'=>"form-control $mobileValid",'placeholder'=>'Mobile Number','name'=>'mobile', 'value'=>set_value('mobile'))); 
    echo form_error('mobile', '<div class="invalid-feedback">', '</div>');
?>
</div> 
<div class="form-group my-2">   
<?php 
    echo form_label('Password', 'password');
    $passwordValid = empty(form_error('password'))?'':'is-invalid';
    echo form_input(array('id'=>'password','class'=>"form-control $passwordValid",'placeholder'=>'Password','name'=>'password', 'type'=>'password', 'value'=>set_value('password'))); 
    echo form_error('password', '<div class="invalid-feedback">', '</div>');
?>
</div> 
<div class="form-group my-2">   
<?php 
    echo form_label('Confirm Password', 're-password');
    $rePasswordValid = empty(form_error('re-password'))?'':'is-invalid';
    echo form_input(array('id'=>'re-password','class'=>"form-control $rePasswordValid",'placeholder'=>'Confirm Password','name'=>'re-password', 'type'=>'password', 'value'=>set_value('re-password'))); 
    echo form_error('re-password', '<div class="invalid-feedback">', '</div>');
?>
</div> 
<div class="form-group my-2">   
<?php 
    echo form_button(array('type'=>'submit','value'=>'submit', 'name'=>'signup', 'class'=>'btn mt-3 btn-primary'), 'Sign Up');
?>
</div>
<?php echo form_close(); ?>

</div>