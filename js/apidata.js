/*
* Main JavaScript of user data api
* Author: Khalid Zaid Bin
*/

jQuery(document).ready(() => {
    jQuery('body').on("focus", ".ajax", () => {
        jQuery(".ajax").colorbox({
            ajax: true,
            width: "40%",
            height: "60%",
        });
    });
});


//Global function to handel ajax request.
function sendAjaxData(sendURL, sendingType) {
    jQuery.ajax({
        type: sendingType,
        url: sendURL,
        success: function (data) {
            getAjaxData(data);
            return data;
        }
    });
}

function sendAjaxDataForm(formId, sendURL) {
    jQuery(formId).find('.btn').attr('disabled', true);
    jQuery.ajax({
        type: 'POST',
        url: sendURL,
        data: jQuery(formId).serialize(),
        success: function (res) {
            getAjaxData(res);
            return res;
        }
    });
}

function checkAllUsers(id) {
    if (jQuery(id).prop('checked') === true) {
        jQuery('[data-user-check]').prop('checked', true);
    } else {
        jQuery('[data-user-check]').prop('checked', false);
    }
}