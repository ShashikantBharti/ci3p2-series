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
echo anchor('user/signup', "Sign Up");
?>
<br>
<br>
<table width="100%" border="1">
<thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Active</th>
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
                    <?php echo anchor('news/edit/'.$news->id, 'Edit'); ?>
                    <?php echo anchor('news/delete/'.$news->id, 'Delete'); ?>
                    <?php echo anchor('news/details/'.$news->id, 'Details'); ?>
                </td>
            </tr>
            <?php $sr++; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="6"><h3>No News Available</h3></td>
        </tr>
    <?php endif; ?>
</tbody>
</table>