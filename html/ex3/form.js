$(function(){
    $("#startday").datepicker({
        dateFormat: 'dd/mm/yy'
    }).val();

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
                pattern: "^\d+84\d{10}$",
                maxlength: 13,
                minlength:12
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
                pattern: "Must be equal +84....",
                maxlength: "Max length of phone is 13",
                minlength: "Min length of phone is 12"
            }
        },
        submitHandler: function(form){
            form.submit();
        }
    });
});