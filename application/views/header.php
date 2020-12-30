<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <?php echo anchor('pages/view/about', 'About'); ?>
        <?php echo anchor('pages/view/services', 'Services'); ?>
        <?php echo anchor('pages/view/features', 'Features'); ?>
        <?php echo anchor('pages/view/contact', 'Contact'); ?>
    </nav>
    <!-- //Navbar -->