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
    <div class="row my-3">
        <div class="col-md-4">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-12">
                    <input type="search" class="form-control" id="search" placeholder="Search Product">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="ajaxContent"></div>
        </div>
    </div>
</div>