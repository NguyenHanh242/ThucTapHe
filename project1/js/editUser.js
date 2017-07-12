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

    $("#formEditUser").validate({
        rules: {
            username: {
                required: true,
                username_enter: true
            },
            password: {
                required: true,
                minlength: 5
            },
            re_password: {
                equalTo: password
            }
        },
        messages: {
            username: {
                required: "<p style='color:red;'>Please enter username</p>",
                username_enter: "<p style='color:red;'>Only letters</p>"
            },
            password: {
                required: "<p style='color:red;'>Please enter password</p>",
                minlength: "<p style='color:red;'>At least 5 characters long</p>"
            },
            re_password: {
                equalTo: "<p style='color:red;'>Must be equal to password</p>"
            }
        },
        submitHandler: function(form){
            if(!confirm("Do you want to update this user ?")) return;
            $.post(
                "do_editUser.php",
                {
                    up_id: $("#id").val(),
                    up_username: $("#username").val(),
                    up_password: $("#password").val(),
                    up_fullname: $("#fullname").val()
                },
                function(data, status){
                    temp = data.split(":");
                    inform(temp[0], temp[1]);
                    $("#editUser").modal("hide");
                    location.reload();
                }
            )
        }
    });
    
});
function fillEditForm(id, username, pass, re_pass, fullname){
        $("#id").val(id);
        $("#username").val(username);
        $("#password").val(pass);
        $("#re_password").val(re_pass);
        $("#fullname").val(fullname);
};

function deleteUser(id){
    if(!confirm("If you delete this user, the user's post will be deleted too. Do you want to delete?"))
        return;
    $.post(
        "do_delUser.php",
        {
            id: id
        },
        function (data, value){
            location.reload();
            temp = data.split(":");
            inform(temp[0], temp[1]);
        }
    )
}