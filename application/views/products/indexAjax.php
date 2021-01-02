<?php 
/**
 * Products View
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
    <div class="products">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>SKU</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)) : ?>
                <?php $sr = 1; ?>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $sr; ?></td>
                    <td><?php echo $product->product_name; ?></td>
                    <td><?php echo $product->sku; ?></td>
                    <td><?php echo '$'.$product->price.'.00'; ?></td>
                    <td><?php echo ($product->is_active)?'Active':'Inactive'; ?></td>
                    <td><?php echo $product->created_at; ?></td>
                </tr>
                <?php $sr++; ?>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="6">
                        <div class="alert alert-info my-3">No Products Available</div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="">
                        <nav class="paging Page navigation d-flex justify-content-end">
                            <ul class="pagination">
                                <?php echo $pagelinks; ?>
                            </ul>
                        </nav>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>