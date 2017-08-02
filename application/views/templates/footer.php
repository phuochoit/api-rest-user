
    </div>
    <script src="<?php print base_url("assets/js/jquery.min.js");?>"></script>
    <script src="<?php print base_url("assets/js/bootstrap.min.js");?>"></script>

    <script>
        $(document).ready(function() {
            
            function isEmailOrPhone(email) {
                var expression = /([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$)|((?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$)/;
                if (expression.test(email)) {
                    return true;
                } else {
                    return false;
                }
            }

            $('#signup').submit(function(){
                var flag = true;
                var lastname    = $.trim($('#iplastname').val());
                var firstname   = $.trim($('#ipfirstname').val());
                var phoneormail = $.trim($('#ipphoneormail').val());
                var password    = $.trim($('#ippassword').val());
                var radiogender   =  $('input[name=radiogender]:checked').val();
                var birthday_day = $("select[name=birthday_day] option:selected").val();
                var birthday_month = $("select[name=birthday_month] option:selected").val();
                var birthday_year = $("select[name=birthday_year] option:selected").val();
              

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

                if (!isEmailOrPhone(phoneormail)){
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

                if(birthday_day == '' || birthday_year == '' || birthday_month == ''){
                    $('#birthday_error').text('Ngày sinh của bạn là gì?');
                    $('#birthday_error').removeClass("error").addClass("show_error");
                    flag = false;

                } else{
                    $('#birthday_error').text('');
                    $('#birthday_error').removeClass("show_error").addClass("error");
                }
                return flag;
            });

            $('#signup input').keyup(function(event) {
                var input = $(this);
                var message = $(this).val();
                var form_data = $(this).serializeArray();

                if(message.length > 0 && form_data[0]['name'] != 'phoneormail'){
                    $("#"+ form_data[0]['name'] +"_error").text('');
                    $("#"+ form_data[0]['name'] +"_error").removeClass("show_error").addClass("error");
                }
                
                if(form_data[0]['name'] == 'phoneormail'){
                    if (isEmailOrPhone(form_data[0]['value'])){
                        $("#"+ form_data[0]['name'] +"_error").text('');
                        $("#"+ form_data[0]['name'] +"_error").removeClass("show_error").addClass("error");
                    }else{
                        $("#"+ form_data[0]['name'] +"_error").text('Số điện thoại hoặc email của bạn là gì?');
                        $("#"+ form_data[0]['name'] +"_error").removeClass("error").addClass("show_error");
                    }
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

            $('#signup select.select-birthday').change(function() {
                var birthday_day = $("select[name=birthday_day] option:selected").val();
                var birthday_month = $("select[name=birthday_month] option:selected").val();
                var birthday_year = $("select[name=birthday_year] option:selected").val();

                if(birthday_day != '' && birthday_month != '' && birthday_year != ''){
                    $("#birthday_error").text('');
                    $("#birthday_error").removeClass("show_error").addClass("error");
                }
            });
        });
    </script>

    </body>
</html>
