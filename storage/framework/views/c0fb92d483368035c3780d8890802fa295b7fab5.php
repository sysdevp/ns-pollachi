<section class="foot">

      <div class="col-12 px-0">
      <div class="row mx-0">
        <div class="col-6">
          <p>© 2019 Copyright.</p>
        </div>
        <div class="col-6 text-right">
           <p>Mazenetsolution</p> 
        </div>
      </div>
    
</div>
</section>
    
</div></div>

  </main></div>
  <script  src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <!-- select 2 -->
    <script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
   
    <!-- Optional JavaScript -->
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/buttons.colVis.min.js')); ?>"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <!-- date picker -->
    <script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/master/common_ajax_master.js')); ?>"></script>
     

    <script src="<?php echo e(asset('assets/datepicker/bootstrap-datepicker.js')); ?>"></script>
	<script  src="<?php echo e(asset('assets/js/scriptpo.js')); ?>"></script>
    <script  src="<?php echo e(asset('assets/js/dashboardjs.js')); ?>"></script>
    

    <script>



$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



    var currentDate = new Date();
    $('.expiry_date').datepicker({
    format: "dd-mm-yyyy",
    todayHighlight: true,
    startDate: currentDate,
    endDate: '',
    setDate: currentDate,
    autoclose: true
    });

    $('.dob').datepicker({
    format: "dd-mm-yyyy",
    todayHighlight: true,
    //startDate: '-29d',
    endDate:currentDate,
    setDate: currentDate,
    autoclose: true
    });





$(document).on("keypress",".only_allow_alp_num_dot_com_amp",function(e)
{
    var regex = new RegExp("^[a-zA-Z0-9.,& ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
     e.preventDefault();
    return false;

});

$(document).on("keypress",".only_allow_alp_numeric",function(e)
{
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
     e.preventDefault();
    return false;

});






$(document).on("keypress",".only_allow_digit_and_dot",function(e)
{
    var regex  = new RegExp("^[0-9.]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    $(this).onpaste = function(e) {
   e.preventDefault();
 }
    
    if (regex.test(str)) {
        if (e.keyCode === 46 && this.value.split('.').length === 2) 
        {
            return false;
        }


        return true;
    }
    e.preventDefault();
    return false;

});



$(document).on("keypress",".only_allow_digit",function(e)
{
    var regex  = new RegExp("^[0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;

});




    </script>

    </body>
</html>

<?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/layout/footer.blade.php ENDPATH**/ ?>