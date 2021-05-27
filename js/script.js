$(document).ready(function(){
    $("#reg").hide();
    $(".wrong-input").css("visibility", "hidden");

    $("#showreg").click(function(){
        $(".floating-div").attr("switched", "true");

        $("#reg").attr("focused", "true");
        $("#login").attr("focused", "false");
        $("#login").hide();
        $("#reg").show(1000);
        setTimeout(function(){ $(".floating-div").attr("switched", "false"); }, 1000);

        $.post("setsession.php", {
            focused: "reg"
        }, function(){});
    });
    $("#showlogin").click(function(){
        $(".floating-div").attr("switched", "true");

        $("#login").attr("focused", "true");
        $("#reg").attr("focused", "false");
        $("#reg").hide();
        $("#login").show(1000);
        setTimeout(function(){ $(".floating-div").attr("switched", "false"); }, 1000);

        $.post("setsession.php", {
            focused: "login"
        }, function(){});
    });

    $(".login-input").change(function() {
        $(".login-input").css("border", "1px solid rgba(255,255,255,.2)");
    });

    $(".login-submit").click(function() {
        $(".wrong-input").html(" ");

        var which = $("#login").attr("focused");
        if(which == "true") {
            var user = $(".login-input[name=user]");
            var pass = $(".login-input[name=pass]");
            var ret = true;
            if(user.val().length == 0) {
                $(".wrong-input").append("Empty username field<br>");
                $(".login-input[name='user']").css("border", "1px solid rgba(169,69,66,.6)");
                $(".wrong-input").css("visibility", "visible");
                ret = false;
            }
            if(pass.val().length == 0) {
                $(".wrong-input").append("Empty password field<br>");
                $(".login-input[name='pass']").css("border", "1px solid rgba(169,69,66,.6)");
                $(".wrong-input").css("visibility", "visible");
                ret = false;
            }
            if(!ret) return false;
        } else {
            var user = $(".login-input[name=user_reg]");
            var pass = $(".login-input[name=pass_reg]");
            var pass2 = $(".login-input[name=pass2_reg]");
            var email = $(".login-input[name=email]");
            var ret = true;
            if(user.val().length == 0) {
                $(".wrong-input").append("Empty username field<br>");
                $(".login-input[name='user']").css("border", "1px solid rgba(169,69,66,.6)");
                $(".wrong-input").css("visibility", "visible");
                ret = false;
            }
            if(pass.val().length == 0) {
                $(".wrong-input").append("Empty password field<br>");
                $(".login-input[name='pass']").css("border", "1px solid rgba(169,69,66,.6)");
                $(".wrong-input").css("visibility", "visible");
                ret = false;
            }
            if(pass2.val().length == 0) {
                $(".wrong-input").append("Empty second password field<br>");
                $(".login-input[name='pass2']").css("border", "1px solid rgba(169,69,66,.6)");
                $(".wrong-input").css("visibility", "visible");
                ret = false;
            }
            if(email.val().length == 0) {
                $(".wrong-input").append("Empty e-mail field<br>");
                $(".login-input[name='email']").css("border", "1px solid rgba(169,69,66,.6)");
                $(".wrong-input").css("visibility", "visible");
                ret = false;
            }
            if(pass.val() != pass2.val()) {
                $(".wrong-input").append("Passwords are not the same<br>");
                $(".login-input[name='pass']").css("border", "1px solid rgba(169,69,66,.6)");
                $(".login-input[name='pass2']").css("border", "1px solid rgba(169,69,66,.6)");
                $(".wrong-input").css("visibility", "visible");
                ret = false;
            }
            if(!ret) return false;
        }
    });

    $(".close-aside-box").click(function(){
        $(this).parent().fadeOut(2000);;
    });
});

function addBoxToAside(color, text) {
    alert("asd");
    $("#aside").append("<div class='aside-box-" + color + "'><img class='close-aside-box' src='../img/close.png' width='20'>" + text + "</div>");
}
