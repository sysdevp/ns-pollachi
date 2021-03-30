
$(document).ready(function() {
  
    // Setup - add a text input to each footer cell
    $('#master thead tr').clone(true).appendTo( '#master thead' );
    $('#master thead tr:eq(1) th').each( function (i) {
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
    var table = $('#master').DataTable( {
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
                  columns: [ 0, 1, 2, 5 ]
              }
          },
          'colvis'
      ]
    } );
    table.buttons().container()
        .appendTo( '#master_wrapper .col-md-6:eq(0)' );
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