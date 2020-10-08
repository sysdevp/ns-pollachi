var barcode = [];
var k=1;
function add_barcode_details() {
var length = $('.tables').length;
$(".barcode").each(function(key) {

    var dataid = $(this).val();
    var idx = $.inArray(dataid, barcode);
    if (idx == -1) {
      barcode.push(dataid);
    }
    });
// console.log(barcode);
// for(i=0;i<barcode.length;i++)
// {
//     var first=barcode[i];
//     break;
//     for(j=i+1;j<barcode.length;j++)
//     {
//         var second=barcode[j];
//         console.log(second);
//     }
// }
// console.log(barcode.length);
// for(var i=0;i<barcode.length;i++)
// {
//     var first=barcode[i];
//     console.log(first);
//     for(var j=i+1;j<barcode.length;j++)
//     {
//         var second=barcode[j];
//         console.log(second);
//         if(first == second)
//         {
//             console.log('hihihi');
//             alert('Already Taken!');
//         }
//         else
//         {

//         }
           
        
//     }
// }
    
    var barcode_dets = "";
    barcode_dets += '<tr class="tables">\
    <td class="barcode_s_no">1</td> \
    <td>\
        <div class="col-sm-12">\
        <input type="text" class="form-control barcode" name="barcode[]" id="barcode'+k+'" onchange="test($(this).val(),'+k+')" placeholder="Barcode" value="" required>\
        <input type="hidden" id="num'+k+'" value="'+k+'">\
        <div class="invalid-feedback">\
            Enter valid Barcode\
          </div>\
        </div>\
      </td>\
      <td>\
       <div class="col-sm-12">\
       <input type="text" class="form-control confirm_barcode" oninput="barcode_validation()" name="barcode_confirmation[]"  placeholder="Confirm Barcode" value="" required>\
     <div class="invalid-feedback">\
           Enter valid Confirm Barcode\
         </div>\
       </div>\
     </td>\
    <td>\
        <div class="form-group row">\
            <div class="col-sm-3 mr-1">\
            <label class="btn btn-success add_barcode_details">+</label>\
            </div>\
            <div class="col-sm-3 mx-1">\
            <label class="btn btn-danger remove_barcode_details">-</label>\
            </div>\
            </div>\
            </td>\
</tr>';

    $(".append_barcode_dets").append(barcode_dets);
    barcode_s_no();
    k++
}

function barcode_s_no() {
    $(".barcode_s_no").each(function(key) {
        $(this).html(key + 1)
    });
}
function test(val,value)
{
    for(i=0;i<barcode.length;i++)
    {
        if(barcode[i] == val)
        {
            alert('Already Taken');
            $('#barcode'+value).val('');
        }
        else
        {

        }
    }
}

$(document).on("click", ".remove_barcode_details", function() {
    var $tr = $(this).closest("tr");
    if ($(".remove_barcode_details").length > 1) {
        $(this).closest("tr").remove();
        var barcode_val = $(this).closest("tr").find('.barcode').val();
        for (var i = 0; i < barcode.length; i++)
        if (barcode[i] == barcode_val) { 
            barcode.splice(i, 1);
            break;
        }
        // alert(barcode);
        barcode_s_no();
    } else {
        alert("Atleast One Row Present");
    }
});

function barcode_validation() {
    var error_count = 0;
    $(".barcode").each(function(key, index) {
        $(this).removeClass("is-invalid");
        $(this).removeClass("is-valid");

        if ($(this).val() != "") {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        } else {
            error_count++;
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        }

        if ($(this).closest("tr").find(".confirm_barcode").val() != "") {
            $(this).closest("tr").find(".confirm_barcode").removeClass("is-invalid");
            $(this).closest("tr").find(".confirm_barcode").addClass("is-valid");
        } else {
            error_count++;
            $(this).closest("tr").find(".confirm_barcode").removeClass("is-valid");
            $(this).closest("tr").find(".confirm_barcode").addClass("is-invalid");
        }

        var barcode = $(this).val();
        var confirm_barcode = $(this).closest("tr").find(".confirm_barcode").val();

        if (barcode != "" && confirm_barcode != "") {
            if (barcode != confirm_barcode) {
                error_count++;
                $(this).closest("tr").find(".confirm_barcode").removeClass("is-valid");
                $(this).closest("tr").find(".confirm_barcode").addClass("is-invalid");
                $(this).closest("tr").find(".confirm_barcode").find(".invalid-feedback").html("Confirm Barcode Does't Match Barcode");
                $('.add_barcode_details').hide();
            }
            else
            {
                $('.add_barcode_details').show();
            }

        }


    });
    return error_count;

}