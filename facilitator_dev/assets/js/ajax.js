/* # Custom Scripts
 ================================================== */

// On load of body
$(function()
{
    // If error exist
    if($('label').hasClass('error')) {

        $("html, body").animate({ scrollTop: $('label.error').offset().top - 100}, 1000);
    }
});

// Reset form fields
function reset(e)
{
    $(":input", e).not(":button, :submit, :reset, :hidden, :radio").val("").removeAttr("selected")
}

// Ajax call
function ajaxCall(url, method, postData)
{
    var response;

    switch(method)
    {
        case 'MULTIPART':

            // Ajax
            $.ajax({
                type: 'POST',
                url: url,
                dataType: "json",
                async: false,
                data: postData,
                processData: false,
                contentType: false,
                success: function (data) {

                    response = data;
                }
            });

            break;

        default:

            // Ajax
            $.ajax({
                type: method,
                url: url,
                dataType: "json",
                async: false,
                data: postData,
                success: function (data) {

                    response = data;
                }
            });

            break;
    }

    return response;
}