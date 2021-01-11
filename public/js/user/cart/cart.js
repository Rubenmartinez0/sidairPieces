$(document).ready(function() {

    $("#selectAll").change(function() {
        booleanValue = this.checked ? true : false;
        $("input[type=checkbox]").prop('checked', booleanValue, $(this).prop('checked', booleanValue));
    });
    
    $('#deleteSelected').click(function() {
        //console.log('Click con click');
        var itemsToDelete = [];
        //itemsToDelete.push(value);
        $("input[type=checkbox]" ).each(function( index ) {
            if(this.checked && $(this).attr('id') != "selectAll"){
                itemsToDelete.push(this.value);
            }
        });
        if(itemsToDelete.length > 0){
            if (confirm("Seguro que quieres eliminar las piezas seleccionadas?")) {
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/myCart',
                    type: "DELETE",
                    
                    data: { data : itemsToDelete },
                    success:function(message) {

                        
                        //remove from frontend every row that has been deleted.
                        console.log("success");

                        $("input[type=checkbox").each(function( index ) {
                            if(this.checked && $(this).attr('id') != "selectAll"){
                                    console.log("removing " +this.value);
                                    $(this).closest('tr').remove();
                            }
                        });
                        if( $("#selectAll").is(':checked')){
                            $("table").remove();
                        }
                    
                    }
                });
            }
        }
    });
    
});