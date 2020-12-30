<h1>
    Welcome Surya 
    <?php 
        echo $title; 
    ?>
</h1>

<?php 
echo base_url();
echo '<br>';
echo '<pre>';
print_r($allNews);
foreach ($allNews as $item) {
    echo '<h1>'.$item->title.'</h1>';
    echo '<p>'.$item->description.'</p>';
}

// Create Link in CI
// anchor('controller/method', 'value');
echo anchor('user/signup', "Sign Up");
?>