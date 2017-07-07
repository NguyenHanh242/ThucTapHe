$(function(){

    $.validator.addMethod("username_enter",function(value, element){
        var filter = /^[a-zA-Z ]*$/;
        if(filter.test(value)) return true;
        else return false;
    })

    $("#formLogin").validate({
        rules: {
            username: {
                required: true,
                username_enter: true
            },
            password: {
                required: true,
            }
        },
        messages: {
            username: {
                required: "Please enter username",
                username_enter: "Only letters and white space"
            },
            password: {
                required: "Please enter password"
            }
        },
        submitHandler: function(form){
            form.submit();
        }
    });
});