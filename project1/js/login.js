$(function(){

    $.validator.addMethod("username_enter",function(value, element){
        var filter = /^[a-zA-Z]*$/;
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
        },
        errorPlacement: function(error, element) {
        },
        showErrors: function(errorLMap, errorList){
            this.defaultShowErrors();                
            // destroy tooltips on valid elements                                             
            $("." + this.settings.validClass)                    
            .tooltip("destroy");              
            // add/update tooltips              
            for (var i = 0; i < errorList.length; i++) {         
                var error = errorList[i];               
                console.log(error);                  
                $(error.element)
                .tooltip({ position: { at: 'center top',        my: 'center bottom' }})
                .attr("data-original-title", error.message)
                .attr("data-placement", "bottom");
            }
        }
    });
});