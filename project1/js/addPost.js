$(function(){

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
            name: {
                required: true, 
                maxlength: 200
            },
            preview: {
                required: true,
                maxlength: 200
            },
            detail: {
                required: true
            }
        },
        messages: {
            name: {
                required: "<p style='color:red;'>Please enter name</p>",
                maxlength: "<p style='color:red;'>Max length is 200</p>"
            },
            preview: {
                required: "<p style='color:red;'>Please enter preview</p>",
                maxlength: "<p style='color:red;'>Max length is 200</p>"
            },
            detail: {
                required: "<p style='color:red;'>Please enter detail</p>",
            }
        },
        submitHandler: function(form){
            // if(!confirm("Do you want to add this user ?")) return;
            // $.post(
            //     "do_addPost.php",
            //     {
            //         ad_name: $("#name").val(),
            //         ad_preview: $("#preview").val(),
            //         ad_detail: $("#detail").val(),
            //         ad_picture: $("#picture").val(),
            //         ad_user: $("#id_user").val()
            //     },
            //     function(data, status){
            //         temp = data.split(":");
            //         inform(temp[0], temp[1]);
            //         $("#addUser").modal("hide");
            //         location.reload();
            //     }
            // )
            form.submit();
        }
    });
    
});