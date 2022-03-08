jQuery(document).ready(function() {
    $("#contactform").submit(function() {
        var e = $(this).attr("action");
        return $("#message").slideUp(750, function() {
            $("#message").hide(), $("#submit").after("").attr("disabled", "disabled"), $.post(e, {
                name: $("#name").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                comments: $("#comments").val()
            }, function(e) {
                document.getElementById("message").innerHTML = e, $("#message").slideDown("slow"), $("#contactform img.loader").fadeOut("slow", function() {
                    $(this).remove()
                }), $("#submit").removeAttr("disabled"), null != e.match("success") && window.location.replace("thank-you.html")
            })
        }), !1
    })
});







