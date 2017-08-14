<script>
    $(function() {
        function split( val ) {
            console.log(val);
            return val.split( /,\s*/ );
        }
        function extractLast( term ) {
            return split( term ).pop();
        }

        var projects = <?php print $datajs;?>;

        $( "#tags" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        }).autocomplete({
            minLength: 0,
            source: function( request, response ) {
                response( $.ui.autocomplete.filter(
                    projects, extractLast( request.term ) ) 
                );
            },
            focus: function() {

                return false;
            },
            select: function( event, ui ) {
                var terms = split( this.value );
                terms.pop();
                terms.push( ui.item.value );
                terms.push( "" );
                this.value2 = terms.join( ", " );
                var selected_label = ui.item.label;
                var selected_value = ui.item.value;

                $('#tags').val(selected_value);
                return false;
            }
        });

 });  
</script>

<div class="autocomplete-wraper">
    <div class="autocomplete-header">
        <h2>Search Autocomplete</h2>
    </div>
    <div class="ui-widget">
        <label for="tags">Tags: </label>
        <input id="tags" name="tags">

    </div>
</div>