
    </div>
    <script src="<?php print base_url("assets/js/jquery.min.js");?>"></script>
    <script src="<?php print base_url("assets/js/bootstrap.min.js");?>"></script>

    <script>
        $(document).ready(function() {
            $('#signup').submit(function(){
                var lastname    = $.trim($('#iplastname').val());
                var firstname   = $.trim($('#ipfirstname').val());
                var phoneormail = $.trim($('#ipphoneormail').val());
                var password    = $.trim($('#ippassword').val());
                var radiogender   =  $('input[name=radiogender]:checked').val();

                var flag = true;

                if (lastname == '' ){
                    $('#lastname_error').text('Họ bạn là gì?');
                    $('#lastname_error').removeClass("error").addClass("show_error");
                    
                    flag = false;
                }  else{
                    $('#lastname_error').text('');
                    $('#lastname_error').removeClass("show_error").addClass("error");
                }

                if (firstname == '' ){
                    $('#firstname_error').text('Tên bạn là gì?');
                    $('#firstname_error').removeClass("error").addClass("show_error");
                    flag = false;
                }  else{
                    $('#firstname_error').text('');
                    $('#firstname_error').removeClass("show_error").addClass("error");
                }

                if (phoneormail == '' ){
                    $('#phoneormail_error').text('Số điện thoại hoặc email của bạn là gì?');
                    $('#phoneormail_error').removeClass("error").addClass("show_error");
                    flag = false;
                }  else{
                    $('#phoneormail_error').text('');
                    $('#phoneormail_error').removeClass("show_error").addClass("error");
                }

                if (password == '' ){
                    $('#password_error').text('Mật Khẩu của bạn là gì?');
                    $('#password_error').removeClass("error").addClass("show_error");
                    flag = false;
                }  else{
                    $('#password_error').text('');
                    $('#password_error').removeClass("show_error").addClass("error");
                }

                if (radiogender == undefined || radiogender == 0){
                    $('#radiogender_error').text('Giới tính của bạn là gì?');
                    $('#radiogender_error').removeClass("error").addClass("show_error");
                    flag = false;
                }  else{
                    $('#radiogender_error').text('');
                    $('#radiogender_error').removeClass("show_error").addClass("error");
                }

                return flag;
            });

            $('#signup input').keyup(function(event) {
                var input = $(this);
                var message = $(this).val();
                var form_data = $(this).serializeArray();
                if(message.length > 0 ){
                    $("#"+ form_data[0]['name'] +"_error").text('');
                    $("#"+ form_data[0]['name'] +"_error").removeClass("show_error").addClass("error");
                }  
            });
            $('#signup input[type=radio]').change(function() {
                var input = $(this);
                var message = $(this).val();
                var form_data = $(this).serializeArray();

                if(message.length > 0 ){
                    $("#"+ form_data[0]['name'] +"_error").text('');
                    $("#"+ form_data[0]['name'] +"_error").removeClass("show_error").addClass("error");
                } 

            });
        });
    </script>

    </body>
</html>
