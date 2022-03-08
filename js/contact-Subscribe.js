jQuery(document).ready(function() {
    $("#contactform_sub").submit(function() {
        var e = $(this).attr("action");
        return $("#message-sub").slideUp(750, function() {
            $("#message_sub").hide(), $("#submit_sub").after("").attr("disabled", "disabled"), $.post(e, {
               // name: $("#name").val(),
                email_sub: $("#email_sub").val(),
               // phone: $("#phone").val(),
               // comments: $("#comments").val()
            }, function(e) {
                document.getElementById("message_sub").innerHTML = e, $("#message_sub").slideDown("slow"), $("#contactform_sub img.loader").fadeOut("slow", function() {
                    $(this).remove()
                }), $("#submit_sub").removeAttr("disabled"), null != e.match("success") && window.location.replace("thank-you.html")
            })
        }), !1
    })
});







