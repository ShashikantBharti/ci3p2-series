<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');  ?>">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">CI3 Tutorial</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php echo anchor('./', 'Home', array('class'=>'nav-link active')); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo anchor('pages/view/about', 'About', array('class'=>'nav-link')); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo anchor('pages/view/services', 'Services', array('class'=>'nav-link')); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo anchor('pages/view/features', 'Features', array('class'=>'nav-link')); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo anchor('pages/view/contact', 'Contact', array('class'=>'nav-link')); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo anchor('news', 'News', array('class'=>'nav-link')); ?>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php echo anchor('users/signup', 'Sign Up', array('class'=>'nav-link')); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo anchor('users/login', 'Login', array('class'=>'nav-link')); ?>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
    <!-- //Navbar -->