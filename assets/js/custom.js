
$(document).ready(function() {
  
    // Setup - add a text input to each footer cell
    $('#master thead tr,#purchaseorder thead tr,#receivable_bill thead tr,#receivable_party thead tr,#payable_bill thead tr,#payable_party thead tr,#day_book thead tr,#ageing_report thead tr,#b2b thead tr,#b2c thead tr,#registered thead tr,#unregistered thead tr,#out_b2b thead tr,#stock_summary thead tr').clone(true).appendTo( '#master thead','#purchaseorder thead','#receivable_bill thead','#receivable_party thead','#stock_summary thead','#payable_bill thead','#payable_party thead','#day_book thead','#ageing_report thead','#b2b thead','#registered thead','#unregistered thead','#out_b2b thead');
    $('#master thead tr:eq(1) th,#purchaseorder thead tr:eq(1) th,#receivable_bill thead tr:eq(1) th,#receivable_party thead tr:eq(1) th,#payable_bill thead tr:eq(1) th,#payable_party thead tr:eq(1) th,#day_book thead tr:eq(1) th,#ageing_report thead tr:eq(1) th,#b2b thead tr:eq(1) th,#b2c thead tr:eq(1) th,#registered thead tr:eq(1) th,#unregistered thead tr:eq(1) th,#out_b2b thead tr:eq(1) th,#stock_summary thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    

    var table = $('#master,#purchaseorder,#receivable_bill,#receivable_party,#payable_bill,#payable_party,#day_book,#ageing_report,#b2b,#b2c,#registered,#unregistered,#out_b2b,#stock_summary').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'lBfrtip',
        "scrollX": true,
        "scrollY":300,
        buttons: [
          {
              extend: 'copyHtml5',
              exportOptions: {
                  columns: [ 0, ':visible' ]
              }
          },
          {
              extend: 'excelHtml5',
              exportOptions: {
                  columns: ':visible'
              }
          },
          {
              extend: 'pdfHtml5',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
          },
          {
              extend: 'print',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
          },
          'colvis'
      ]
    } );
} );

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
//   select 2
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});



function validation(){
  
    var error_count=0;
    $(".required_for_valid").each(function(){
     $(this).removeClass("is-invalid");
        if($(this).val() !=""){
         $(this).removeClass("is-invalid");
         $(this).addClass("is-valid");
         if($(this).attr('input-type') == "phone_no"){
            var phone_no=$(this).val();
             if(phone_no_validation(phone_no) == 0){
               error_count++;
             $(this).removeClass("is-valid");
              $(this).addClass("is-invalid");
             }
              }

              if($(this).attr('input-type') == "email"){
            var email=$(this).val();
            if(!email_validation(email)){
             error_count++;
             $(this).removeClass("is-valid");
              $(this).addClass("is-invalid");
            }
            
              }


     }else{
        error_count++;
        $(this).removeClass("is-valid");
         $(this).addClass("is-invalid");
     }
    });
    return error_count;
}
 
// 