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

    $("#formAbout").validate({
        rules: {
            preview: {
                required: true
            },
            detail: {
                required: true
            }
        },
        messages: {
            preview: {
                required: "<p style='color:red;'>Please enter preview</p>"
            },
            detail: {
                required: "<p style='color:red;'>Please enter detail</p>",
            }
        },
        submitHandler: function(form){
            if(!confirm("Do you want to change about ?"));
            $.post(
                "do_about.php",
                {
                    up_preview: $("#preview").val(),
                    up_detail: $("#detail").val()
                },
                function(data, value){
                    temp = data.split(":");
                    inform(temp[0], temp[1]);
                    location.reload();
                }
            )
        }
    })

});