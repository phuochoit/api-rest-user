
    </div>
    <script src="<?php print base_url("assets/js/jquery.min.js");?>"></script>
    <script src="<?php print base_url("assets/js/bootstrap.min.js");?>"></script>

    <script>
        $(document).ready(function() {
            $('#iplastname').on('input', function() {
                var input=$(this);
                var is_name=input.val();
                if(is_name){
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
            $('#iplastname').keyup(function(event) {
                var input=$(this);
                var message=$(this).val();
                console.log(message);
                if(message){input.removeClass("invalid").addClass("valid");}
                else{input.removeClass("valid").addClass("invalid");}	
            });

            $('#signup').keyup(function(event) {
                var input=$(this);
                var message=$(this).val();
                console.log(message);
                if(message){input.removeClass("invalid").addClass("valid");}
                else{input.removeClass("valid").addClass("invalid");}	
            });

            $("#signup button").click(function(event){
				var form_data=$("#signup").serializeArray();
				var error_free=true;
				for (var input in form_data){
					var element=$("#contact_"+form_data[input]['name']);
					var valid=element.hasClass("valid");
					var error_element=$("span", element.parent());
					if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
					else{error_element.removeClass("error_show").addClass("error");}
				}
				if (!error_free){
					event.preventDefault(); 
				}
				else{
					alert('No errors: Form will be submitted');
				}
			});
        });
    </script>

    </body>
</html>
