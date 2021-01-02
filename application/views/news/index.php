<div class="container">
    <h1>
        Welcome Surya
        <?php 
        echo $title; 
    ?>
    </h1>
    <h1><?php echo $this->session->flashdata('message'); ?></h1>
    <?php 
echo base_url();
echo '<br>';
// echo '<pre>';
// print_r($allNews);
foreach ($allNews as $item) {
    echo '<h2>'.$item->title.'</h2>';
    echo '<p>'.$item->description.'</p>';
}

// Create Link in CI
// anchor('controller/method', 'value');
echo anchor('users/signup', "Sign Up");
?>
    <table class="table">
        <div class="table-responsive">
            <table class="table align-middle table-dark table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($allNews)) : ?>
                    <?php $sr = 1; ?>
                    <?php foreach ($allNews as $news) : ?>
                    <tr>
                        <td><?php echo $sr; ?></td>
                        <td><?php echo $news->title; ?></td>
                        <td><?php echo $news->description; ?></td>
                        <td>
                            <?php if ($news->active) : ?>
                            <?php echo 'Active'; ?>
                            <?php else: ?>
                            <?php echo 'Inactive'; ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $news->create_at; ?></td>
                        <td>
                            <?php echo anchor('news/edit/'.$news->id, 'Edit', array('class'=>'btn btn-sm btn-primary')); ?>
                            <?php echo anchor('news/delete/'.$news->id, 'Delete', array('class'=>'btn btn-sm btn-danger my-1')); ?>
                            <?php echo anchor('news/details/'.$news->id, 'Details', array('class'=>'btn btn-sm btn-info')); ?>
                        </td>
                    </tr>
                    <?php $sr++; ?>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="6">
                            <h3>No News Available</h3>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </table>

</div>