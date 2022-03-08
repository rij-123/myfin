


// FOR Financial Planning
jQuery(document).ready(function() {
    $("#contactform_2").submit(function() {
        var e = $(this).attr("action");
        return $("#message_2").slideUp(750, function() {
            $("#message_2").hide(), $("#submit_2").after("").attr("disabled", "disabled"), $.post(e, {
                name_2: $("#name_2").val(),
                //phone_2: $("#phone_2").val(),
                email_2: $("#email_2").val(),
				//designation_2: $("#designation_2").val()
                //comments_2: $("#comments_2").val()
            }, function(e) {
                document.getElementById("message_2").innerHTML = e, $("#message_2").slideDown("slow"), $("#contactform_2 img.loader").fadeOut("slow", function() {
                    $(this).remove()
                }), $("#submit_2").removeAttr("disabled"), null != e.match("success") && window.location.replace("thank-you-finacial-planning.html")
            })
        }), !1
    })
});







