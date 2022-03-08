


// FOR Text Planning Services


jQuery(document).ready(function() {
    $("#contactform_4").submit(function() {
        var e = $(this).attr("action");
        return $("#message_4").slideUp(750, function() {
            $("#message_4").hide(), $("#submit_4").after("").attr("disabled", "disabled"), $.post(e, {
                name_4: $("#name_4").val(),
               // phone_4: $("#phone_4").val(),
                email_4: $("#email_4").val(),
				//designation_4: $("#designation_4").val(),
                //comments_4: $("#comments_4").val()
            }, function(e) {
                document.getElementById("message_4").innerHTML = e, $("#message_4").slideDown("slow"), $("#contactform_4 img.loader").fadeOut("slow", function() {
                    $(this).remove()
                }), $("#submit_4").removeAttr("disabled"), null != e.match("success") && window.location.replace("thank-you-philanthropy-advisory-services.html")
            })
        }), !1
    })
});