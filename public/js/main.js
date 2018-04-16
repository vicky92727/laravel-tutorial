
(function ($) {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var input1 = $('.validate-input1 .input100');
    var input2 = $('.validate-input2 .input100');
    var input3 = $('.validate-input3 .input100');

    $('.validate-form-1').on('submit',function(){
        var check = true;

        for(var i=0; i<input1.length; i++) {
            if(validate(input1[i]) == false){
                showValidate(input1[i]);
                check=false;
            }
        }

        return check;
    });    

    $('.validate-form-2').on('submit',function(){
        var check = true;

        for(var i=0; i<input2.length; i++) {
            if(validate(input2[i]) == false){
                showValidate(input2[i]);
                check=false;
            }
        }

        return check;
    });    

    $('.validate-form-3').on('submit',function(){
        var check = true;

        for(var i=0; i<input3.length; i++) {
            if(validate(input3[i]) == false){
                showValidate(input3[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form-1 .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    $('.validate-form-2 .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    $('.validate-form-3 .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);