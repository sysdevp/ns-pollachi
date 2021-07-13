/* Load State Master Data Start Here */
function refresh_state_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-state-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load State Master Data End Here  */

/* Load District Master Data Start Here */
function refresh_district_master_details(state_id) {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-district-master-details",
        data: { state_id: state_id },
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load District Master Data End Here  */

/* Load City Master Data Start Here */
function refresh_city_master_details(state_id, district_id) {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-city-master-details",
        data: { state_id: state_id, district_id: district_id },
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load City Master Data End Here  */

/* Load City Master Data Start Here */
function refresh_location_type_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-location-type-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load City Master Data End Here  */
/* Load Bank Master Data Start Here */
function refresh_bank_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-bank-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Bank Master Data End Here  */
/* Load Department Master Data Start Here */
function refresh_department_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-department-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Department Master Data End Here  */

/* Load Address Type Master Data Start Here */
function refresh_address_type_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-address-type-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Address Type Master Data End Here  */

/* Load Bank Branch Master Data Start Here */
function refresh_bank_branch_master_details(bank_id) {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-bank-branch-master-details",
        data: { 'bank_id': bank_id },
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Bank Branch Master Data End Here  */

/* Load Accounts Type Master Data Start Here */
function refresh_accounts_type_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-accounts-type-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Bank Branch Master Data End Here  */


/* Load Category Master Data Start Here */
function refresh_category_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-category-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Category Master Data End Here  */

/* Load Uom Master Data Start Here */
function refresh_uom_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-uom-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Uom Master Data End Here  */

/* Load Bulk Item Master Data Start Here */
function refresh_item_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-bulk-item-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Bulk Item Master Data End Here  */

/* Load Customer Master Data Start Here */
function refresh_customer_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-customer-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Customer Master Data End Here  */

/* Load Customer Master Data Start Here */
function refresh_brand_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-brand-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Customer Master Data End Here  */

/* Load Child Item Master Data Start Here */
function refresh_child_item_master_details(category_id) {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-child-item-master-details",
        data: { category_id: category_id },
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Child Item Master Data End Here  */



/* Load Customer Master Data Start Here */
function refresh_supplier_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-supplier-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Customer Master Data End Here  */

/* Load Agent Master Data Start Here */
function refresh_agent_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-agent-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Agent Master Data End Here  */

/* Load Expense Type Master Data Start Here */
function refresh_expense_type_master_details() {
    var result = "";
    $.ajax({
        type: "post",
        url: APP_URL + "/common-master-details/get-expense-type-master-details",
        async: false,
        success: function(res) {
            result = res;
        }
    });
    return result;
}
/* Load Expense Type Master Data End Here  */