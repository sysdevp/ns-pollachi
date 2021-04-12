
$(document).ready(function() {
    
    //alert(ho_details);
  //for Select 2 tap opening
   $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
        $(this).closest(".select2-container").siblings('select:enabled').select2('open');
      });
    // Setup - add a text input to each footer cell
    $('#master thead tr,#receivable_bill thead tr,#receivable_party thead tr,#payable_bill thead tr,#payable_party thead tr,#day_book thead tr,#ageing_report thead tr,#b2b thead tr,#b2c thead tr,#registered thead tr,#unregistered thead tr,#out_b2b thead tr,#stock_summary thead tr').clone(true).appendTo( '#master thead','#receivable_bill thead','#receivable_party thead','#stock_summary thead','#payable_bill thead','#payable_party thead','#day_book thead','#ageing_report thead','#b2b thead','#registered thead','#unregistered thead','#out_b2b thead');
    $('#master thead tr:eq(1) th,#receivable_bill thead tr:eq(1) th,#receivable_party thead tr:eq(1) th,#payable_bill thead tr:eq(1) th,#payable_party thead tr:eq(1) th,#day_book thead tr:eq(1) th,#ageing_report thead tr:eq(1) th,#b2b thead tr:eq(1) th,#b2c thead tr:eq(1) th,#registered thead tr:eq(1) th,#unregistered thead tr:eq(1) th,#out_b2b thead tr:eq(1) th,#stock_summary thead tr:eq(1) th').each( function (i) {
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

    var title_name = $("#master").attr("class").split(" ");
  //  alert(test[3]);
    
    var table = $('#master,#receivable_bill,#receivable_party,#payable_bill,#payable_party,#day_book,#ageing_report,#b2b,#b2c,#registered,#unregistered,#out_b2b,#stock_summary').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'lBfrtip',
        "scrollX": true,
        "scrollY":300,
        buttons: [
          {
              extend: 'copyHtml5',
         text: '<i class="fa fa-files-o"></i>',   
        titleAttr: 'Copy',         
              exportOptions: {
                  columns: [ 0, ':visible' ]
              }
          },
          {
              extend: 'excelHtml5',
         text: '<i class="fa fa-file-excel-o"></i>',
         titleAttr: 'Excel',
         messageTop:ho_details,
         
         filename:title_name[3],
              exportOptions: {
                columns: [ 0, ':visible' ]
              }
          },
          {
              extend: 'pdfHtml5',
         text: '<i class="fa fa-file-pdf-o"></i>',
         titleAttr: 'PDF',
         title:title_name[3],
         

              exportOptions: {
                columns: [ 0, ':visible' ]
              },
              customize: function ( doc ) {
                doc.content.splice( 1, 0, {
                    margin: [ 0, 0, 0, 12 ],
                    alignment: 'center',
                    image: 'data:image/png;base64,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'
                                } );
            }

          },
          {
              extend: 'print',
         text: '<i class="fa fa-print"></i>',
          titleAttr: 'Print',
          title:title_name[3],

              exportOptions: {
                columns: [ 0, ':visible' ]
              }
          },
         {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Columns',                   
                },
      ]
    } );

    $('#purchaseorder thead tr').clone(true).appendTo( '#purchaseorder thead');
    $('#purchaseorder thead tr:eq(1) th').each( function (i) {
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

    

    var table = $('#purchaseorder').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'lBfrtip',
        "scrollX": true,
        "scrollY":300,
        buttons: [
          {
              extend: 'copyHtml5',
         text: '<i class="fa fa-files-o"></i>',   
        titleAttr: 'Copy',         
              exportOptions: {
                  columns: [ 0, ':visible' ]
              }
          },
          {
              extend: 'excelHtml5',
         text: '<i class="fa fa-file-excel-o"></i>',
         titleAttr: 'Excel',
              exportOptions: {
                  columns: ':visible'
              }
          },
          {
              extend: 'pdfHtml5',
         text: '<i class="fa fa-file-pdf-o"></i>',
         titleAttr: 'PDF',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
          },
          {
              extend: 'print',
         text: '<i class="fa fa-print"></i>',
          titleAttr: 'Print',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
          },
         {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Columns',                   
                },
      ]
    } );

    $('#voucher thead tr').clone(true).appendTo( '#voucher thead');
    $('#voucher thead tr:eq(1) th').each( function (i) {
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

    

    var table = $('#voucher').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        lengthMenu: [[12, 25, 50, -1], [12, 25, 50, "All"]],
        dom: 'lBfrtip',
        "scrollX": true,
        "scrollY":300,
        buttons: [
          {
              extend: 'copyHtml5',
         text: '<i class="fa fa-files-o"></i>',   
        titleAttr: 'Copy',         
              exportOptions: {
                  columns: [ 0, ':visible' ]
              }
          },
          {
              extend: 'excelHtml5',
         text: '<i class="fa fa-file-excel-o"></i>',
         titleAttr: 'Excel',
              exportOptions: {
                  columns: ':visible'
              }
          },
          {
              extend: 'pdfHtml5',
         text: '<i class="fa fa-file-pdf-o"></i>',
         titleAttr: 'PDF',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
          },
          {
              extend: 'print',
         text: '<i class="fa fa-print"></i>',
          titleAttr: 'Print',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
              }
          },
         {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Columns',                   
                },
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

