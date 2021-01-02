<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card my-4 shadow">
                <div class="card-header bg-primary bg-gradient">
                    <div class="card-header-title text-white h4"><?php echo $title; ?> Us</div>
                </div>
                <div class="card-body">
                <?php 
                echo form_open('pages/contactSubmit', array('id'=>'contactForm', 'name'=>'contactForm'));

                echo '<div class="form-group mt-3">';
                echo form_label('Name', 'name');
                $validName = empty(form_error('name'))?'':'is-invalid';
                echo form_input(array('id'=>'name', 'name'=>'name', 'class'=>"form-control $validName", 'placeholder'=>'Your Name...', 'value'=>set_value('name')));
                echo form_error('name', '<div class="invalid-feedback">', '</div>');
                echo '</div>';

                echo '<div class="form-group mt-3">';
                echo form_label('Email Id', 'email');
                $validEmail = empty(form_error('email'))?'':'is-invalid';
                echo form_input(array('id'=>'email', 'type'=>'email', 'name'=>'email', 'class'=>"form-control $validEmail", 'placeholder'=>'Your Email ID...', 'value'=>set_value('email')));
                echo form_error('email', '<div class="invalid-feedback">', '</div>');
                echo '</div>';

                echo '<div class="form-group mt-3">';
                echo form_label('Mobile Number', 'mobile');
                $validMobile = empty(form_error('mobile'))?'':'is-invalid';
                echo form_input(array('id'=>'mobile', 'name'=>'mobile', 'class'=>"form-control $validMobile", 'placeholder'=>'Your Mobile Number...', 'value'=>set_value('mobile')));
                echo form_error('mobile', '<div class="invalid-feedback">', '</div>');
                echo '</div>';

                echo '<div class="form-group mt-3">';
                echo form_label('Your Message', 'message');
                $validMessage = empty(form_error('message'))?'':'is-invalid';
                echo form_textarea(array('id'=>'message', 'name'=>'message', 'class'=>"form-control $validMessage", 'rows'=>5,'placeholder'=>'Your message...','value'=>set_value('message')));
                echo form_error('message', '<div class="invalid-feedback">', '</div>');
                echo '</div>';

                echo '<div class="form-group mt-3">';
                echo form_submit(array('id'=>'submit', 'name'=>'submit', 'value'=>'Send Message', 'class'=>'btn btn-primary bg-gradient'));
                echo '</div>';

                echo form_close();
                ?>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>