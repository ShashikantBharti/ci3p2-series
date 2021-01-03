    
<?php 
/**
 * Footer
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
   <footer class="py-2 bg-dark text-light text-center">
        <p>Copyright &copy; 2021 CEDCOSS</p>
   </footer>

    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
    <script>
         $(document).ready(function() {
               getProducts(false);
               $(document).on('click', '.page-link', function() {
                    // e.preventDefault();
                    let page_url = $(this).attr('href');
                    getProducts(page_url);
                    return false;
               });

               $('#search').on('keyup', function(){
                    getProducts(false);
                    return false;
               });
         });
         function getProducts(page_url) {

               let search = $('#search').val();

               let base_url = "<?php echo site_url('products/indexAjax'); ?>";
               if(page_url) {
                    base_url = page_url;
               }
               $.ajax({
                    url: base_url,
                    method: 'POST',
                    data: {search: search},
                    success: function(response) {
                         $('#ajaxContent').html(response);
                    }
               });
         }
    </script>
    <script>
          $(document).ready(function(){
               $('#contactForm').on('submit', function(e) {
                    e.preventDefault();
                    let contactForm = $(this);
                    $.ajax({
                         url: contactForm.attr('action'),
                         method: 'POST',
                         data: contactForm.serialize(),
                         success: function(response) {
                              console.log(response.message);
                              if (response.status == 'success') {
                                   $('#message').html(`<div class="text-success">${response.message}</div>`);
                              } else {
                                   $('#message').html(`<div class="text-danger">${response.message}</div>`);
                              }
                              contactForm.trigger('reset');
                         }
                    });
               });
          });
    </script>
</body>
</html>