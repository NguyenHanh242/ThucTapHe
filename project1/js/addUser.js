$(function(){
    $.validator.addMethod("username_enter",function(value, element){
        var filter = /^[a-zA-Z0-9]*$/;
        if(filter.test(value)) return true;
        else return false;
    });

    //INFORM ERROR OR SUCCESS
            $("#inform").hide();
            function inform(type, content){
                if(type=="ERROR"){
                    $("#inform").removeClass("alert-success").addClass("alert-warning");
                    $("#inform strong span:eq(0)").removeClass("glyphicon-ok-circle").addClass("glyphicon-remove-circle");
                }else{
                    $("#inform").removeClass("alert-warning").addClass("alert-success");
                    $("#inform strong span:eq(0)").removeClass("glyphicon-remove-circle").addClass("glyphicon-ok-circle");
                }
                
                $("#inform strong span:eq(1)").html(" "+type);
                $("#inform span:eq(2)").html(" "+content+" !");
                $("#inform").fadeIn(2000);
                $("#inform").fadeOut(2000);
            }

    $("#formAddUser").validate({
        rules: {
            ad_username: {
                required: true,
                username_enter: true
            },
            adpassword: {
                required: true,
                minlength: 5
            },
            ad_re_password: {
                equalTo: adpassword
            },
            ad_fullname: {
                required: true
            }
        },
        messages: {
            ad_username: {
                required: "<p style='color:red;'>Please enter username</p>",
                username_enter: "<p style='color:red;'>Only letters</p>"
            },
            ad_password: {
                required: "<p style='color:red;'>Please enter password</p>",
                minlength: "<p style='color:red;'>At least 5 characters long</p>"
            },
            ad_re_password: {
                equalTo: "<p style='color:red;'>Must be equal to password</p>"
            },
            ad_fullname: {
                required: "<p style='color:red;'>Please enter fullname</p>",
            }
        },
        submitHandler: function(form){
            if(!confirm("Do you want to add this user ?")) return;
            $.post(
                "do_addUser.php",
                {
                    ad_username: $("#ad_username").val(),
                    ad_password: $("#ad_password").val(),
                    ad_fullname: $("#ad_fullname").val()
                },
                function(data, status){
                    temp = data.split(":");
                    inform(temp[0], temp[1]);
                    $("#addUser").modal("hide");
                    location.reload();
                }
            )
        }
    });
    
});