$(document).ready(function(){
    $('#email').change(function() {
        var email = $(this).val();
        if(email.length > 8) {
            $('#available').html('<span class="check">Checking availability...</span>');
            
            $.ajax({
                type: "post",
                url: "http://127.0.0.1:8080/baitap/author1",
                data: "email="+ email, 
                success: function(response) {
                    var oResponse = JSON.parse(response);
                    var msgClass = oResponse.isValidEmail === 'yes' ? 'avai' : 'not-avai';
                    $('#available').html('<span class="'+msgClass+'">'+oResponse.msg+'</span>');
                }
            });
        } else {
            $('#available').html('<span class="short">Email is too short.</span>');
        }
    });
});