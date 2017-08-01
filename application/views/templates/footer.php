
    </div>
    <script src="<?php print base_url("assets/js/jquery.min.js");?>"></script>
    <script src="<?php print base_url("assets/js/bootstrap.min.js");?>"></script>
    <script src="<?php print base_url("assets/js/jquery.date-dropdowns.js");?>"></script>
     <script src="<?php print base_url("assets/js/validator.min.js");?>"></script>
    <script>
        $(function() {
            $("#ipbirthday").dateDropdowns({
                  required: true,
                  submitFormat: "dd/mm/yyyy",
                  monthFormat:'numeric',
                  monthSuffixes: false,
                  daySuffixes: false,
                  dropdownClass: 'date-control'
            });
            $('#signup').validator();
        });
    </script>

    </body>
</html>
