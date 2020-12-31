<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        .error {
            color: tomato;
            padding: 5px 0;
        }
        .label,.form-control {
            display: block;
            margin: 5px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <?php echo anchor('./', 'Home'); ?>
        <?php echo anchor('pages/view/about', 'About'); ?>
        <?php echo anchor('pages/view/services', 'Services'); ?>
        <?php echo anchor('pages/view/features', 'Features'); ?>
        <?php echo anchor('pages/view/contact', 'Contact'); ?>
        <?php echo anchor('news', 'News'); ?>
        <?php echo anchor('users/signup', 'Sign Up'); ?>
        <?php echo anchor('users/login', 'Login'); ?>
    </nav>
    <!-- //Navbar -->