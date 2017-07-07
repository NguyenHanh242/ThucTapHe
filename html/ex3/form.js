$(function(){
    $("#startday").datepicker({
        dateFormat: 'dd/mm/yy'
    }).val();

    $.validator.addMethod("sodienthoai",function(value, element){
        var filter = /^[0-9-+]+$/;
        if(filter.test(value)) return true;
        else return false;
    })
    

    $("#form-infor").validate({
        rules: {
            firstname: {
                required: true,
                maxlength: 25
            },
            lastname: {
                required: true,
                maxlength: 25
            },
            yearold: {
                required: true,
                min: 15,
                max: 150
            },
            startday: {
                required: true
            },
            phonenumber: {
                required: true,
                sodienthoai: true,
                maxlength: 13,
                minlength:10
            }
        },
        messages: {
            firstname: {
                required: "Please enter you first name",
                maxlength: "Max length of first name is 25"
            },
            lastname: {
                required: "Please enter you last name",
                maxlength: "Max length of first name is 25"
            },
            yearold: {
                required: "Please enter your age",
                min: "Min age is 15",
                max: "Max age is 150"
            },
            startday: "Please enter your startday",
            phonenumber: {
                required: "Please enter your phone",
                sodienthoai: "Must be equal +....",
                maxlength: "Max length of phone is 13",
                minlength: "Min length of phone is 10"
            }
        },
        submitHandler: function(form){
            form.submit();
        }
    });
});