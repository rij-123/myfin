


// FOR NRI Services


jQuery(document).ready(function() {
    $("#contactform_3").submit(function() {
        var e = $(this).attr("action");
        return $("#message_3").slideUp(750, function() {
            $("#message_3").hide(), $("#submit_2").after("").attr("disabled", "disabled"), $.post(e, {
                name_3: $("#name_3").val(),
               // phone_3: $("#phone_3").val(),
                email_3: $("#email_3").val(),
				//designation_3: $("#designation_3").val(),
                //comments_3: $("#comments_3").val()
            }, function(e) {
                document.getElementById("message_3").innerHTML = e, $("#message_3").slideDown("slow"), $("#contactform_4 img.loader").fadeOut("slow", function() {
                    $(this).remove()
                }), $("#submit_3").removeAttr("disabled"), null != e.match("success") && window.location.replace("thank-you-nir-service.html")
            })
        }), !1
    })
});