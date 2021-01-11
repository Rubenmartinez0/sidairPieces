$(document).ready(function() {

    $("#selectAll").change(function() {
        booleanValue = this.checked ? true : false;
        $("input[type=checkbox]").prop('checked', booleanValue, $(this).prop('checked', booleanValue));
    });
    
    
});