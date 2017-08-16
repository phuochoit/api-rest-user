
    </div>
    
    <script src="<?php print base_url("assets/js/bootstrap.min.js");?>"></script>
    <?php if (isset($js_to_load) && $js_to_load != '') : ?>
        <?php foreach ($js_to_load as $row) :?>
        <script type="text/javascript" src="<?php print $row;?>"></script>
        <?php endforeach;?>
    <?php endif;?>
    <?php if(isset($datajs) && !empty($datajs)):?>
        <script>
            $(function() {
                var data = '';
                var suggestion = $.parseJSON(<?php print $datajs;?>);
                function split( val ) {
                    return val.split( /,\s*/ );
                }
                function ununicode(str) {
                    str= str.toLowerCase();  
                    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
                    // alert(str);
                    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
                    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
                    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
                    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
                    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
                    str= str.replace(/đ/g,"d");  
                    str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-"); 
                    str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1- 
                    str= str.replace(/^\-+|\-+$/g,"");  
                    return str;  
                }

                $('#tags').autocomplete({
                    minLength: 1,
                    source: function(request, response) {          
                        var data = $.grep(suggestion, function(value) {
                            var patt = new RegExp(ununicode(request.term.replace(/ /g, '-')));
                            var res = patt.test(ununicode(value.first_name));
                            return res;

                        }); 
        
                        response(data); 
                    },
                    focus: function() {
                        return false;
                    },
                    select: function( event, ui ) {
                        var terms = split( this.value );
                        var selected_value = ui.item.first_name;
                        $('#tags').val(selected_value);
                        data = ui.item;
                        return false;
                    }

                }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                    return $( "<li></li>" )
                    .data( "ui-autocomplete-item", item ) 
                    .append( "<a>" + item.first_name + "</a>" ) 
                    .appendTo( ul ); 
                };
                $('#btn-submit').click(function () {
                    $( ".first-name" ).empty();
                    $( ".last-name" ).empty();
                    $( ".email" ).empty();
                    $( ".gender" ).empty();
                    if(data != '' && data != 'undefined'){
                        $( ".first-name" ).append("<p><b>First Name:</b> " + data['first_name'] + "</p>");
                        $( ".last-name" ).append("<p><b>Last Name:</b> " + data['last_name'] + "</p>");
                        $( ".email" ).append("<p><b>Email:</b> " + data['email'] + "</p>");
                        $( ".gender" ).append("<p><b>Gender:</b> " + data['gender'] + "</p>");
                    }
                
                });
                
            });
        </script>
    <?php endif;?>
    <script>
        $(document).ready(function() {
            var flag = true;
            function isEmailOrPhone(email) {
                var expression = /([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$)|((?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$)/;
                if (expression.test(email)) {
                    return true;
                } else {
                    return false;
                }
            }

            $('#signup,#login').submit(function(){
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
                        flag = true;
                    }  
                    // }else{
                    //     $("#"+ form_data[0]['name'] +"_error").text('Số điện thoại hoặc email của bạn là gì?');
                    //     $("#"+ form_data[0]['name'] +"_error").removeClass("error").addClass("show_error");
                        
                    // }
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
