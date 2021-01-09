function add_item_tax_details() {
    var item_tax_dets = "";
    item_tax_dets += '<tr>\
                        <td class="s_no">1</td>\
                        @foreach($tax as $key => $value)\
                        <td>\
                           <div class="col-sm-12">\
                              <input type="text" class="form-control {{$value->name}} only_allow_digit_and_dot" name="{{$value->name}}[]"  placeholder="{{$value->name}}" value="{{ old('igst.0') }}" required>\
                              <span class="mandatory">  </span>\
                              <div class="invalid-feedback">\
                                 Enter valid IGST\
                              </div>\
                           </div>\
                        </td>\
                        @endforeach\
                        <td>\
                           <div class="col-sm-12">\
                              <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="{{ old('valid_from.0') }}" required>\
                              <span class="mandatory"> </span>\
                              <div class="invalid-feedback">\
                                 Enter valid Effective From Date\
                              </div>\
                           </div>\
                        </td>\
                        <td>\
                           <div class="form-group row">\
                              <div class="col-sm-3 mr-1">\
                                 <label class="btn btn-success add_tax_details">+</label>\
                              </div>\
                              <div class="col-sm-3 mx-2">\
                                 <label class="btn btn-danger remove_tax_details">-</label>\
                              </div>\
                           </div>\
                        </td>\
                     </tr>';

    $(".append_row").append(item_tax_dets);
    var currentDate = new Date();
    $('.valid_from').datepicker({
        format: "dd-mm-yyyy",
        todayHighlight: true,
        startDate: currentDate,
        endDate: '',
        setDate: currentDate,
        autoclose: true
    });
    s_no();
    common_igst_calculation();
}

function s_no() {
    $(".s_no").each(function(key) {
        $(this).html(key + 1)
    });
}

$(document).on("click", ".remove_tax_details", function() {
    var $tr = $(this).closest("tr");
    if ($(".remove_tax_details").length > 1) {
        $(this).closest("tr").remove();
        s_no();
    } else {
        alert("Atleast One Row Present");
    }
});

$(document).on("blur", ".igst", function() {

    var igst = $(this).val();
    igst = igst != "" && igst > 0 ? igst : 0;
    var cgst = igst / 2;
    var sgst = igst / 2;
    $(this).closest("tr").find(".cgst").val(cgst);
    $(this).closest("tr").find(".sgst").val(sgst);

});

function common_igst_calculation() {

    var igst = $(".common_igst").val();
    if (igst != "") {
        igst = igst != "" && igst > 0 ? igst : 0;
        var cgst = igst / 2;
        var sgst = igst / 2;
        $(".igst").val(igst);
        $(".cgst").val(cgst);
        $(".sgst").val(sgst);
    }

}

$(document).on("blur", ".common_igst", function() {
    common_igst_calculation();
});

$(document).on("click change", ".common_effective_from", function() {
    var valid_from = $(this).val();
    $(".valid_from").datepicker("update", valid_from);
});