$(function(){

    $("#formEditPost").validate({
        rules: {
            up_name: {
                required: true, 
                maxlength: 200
            },
            up_preview: {
                required: true,
                maxlength: 200
            },
            up_detail: {
                required: true
            }
        },
        messages: {
            up_name: {
                required: "<p style='color:red;'>Please enter name</p>",
                maxlength: "<p style='color:red;'>Max length is 200</p>"
            },
            up_preview: {
                required: "<p style='color:red;'>Please enter preview</p>",
                maxlength: "<p style='color:red;'>Max length is 200</p>"
            },
            up_detail: {
                required: "<p style='color:red;'>Please enter detail</p>",
            }
        },
        submitHandler: function(form){
            form.submit();
        }
    });
    
});

function delPost(id){
    if(!confirm("Do you want to delete this post ?")) return;
    $.post(
        "do_delPost.php",
        {
            id_post: id
        },
        function(data, value){
            location.reload();
        }
    )
};