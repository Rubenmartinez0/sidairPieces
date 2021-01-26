$(document).ready(function() {

    $("#selectAll").change(function() {
        booleanValue = this.checked ? true : false;
        $(".pieceCheckbox").prop('checked', booleanValue, $(this).prop('checked', booleanValue));
    });
    
    $('#deleteSelected').click(function() {
        //console.log('Click con click');
        var piecesToDelete = [];
        var notesToDelete = [];
        //piecesToDelete.push(value);
        $(".pieceCheckbox" ).each(function( index ) {
            if(this.checked && $(this).attr('id') != "selectAll"){
                piecesToDelete.push(this.value);
            }
        });
        $(".noteCheckbox" ).each(function( index ) {
            if(this.checked){
                notesToDelete.push(this.value);
            }
        });
        if(piecesToDelete.length > 0 || notesToDelete.length > 0){
            if (confirm("Seguro que quieres eliminar las piezas/notas seleccionadas?")) {
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/myCart',
                    type: "DELETE",
                    
                    data: { pieces : piecesToDelete, notes: notesToDelete },
                    success:function(message) {

                        console.log(message);
                        //remove from frontend every row that has been deleted.
                        $(".pieceCheckbox").each(function( index ) {
                            if(this.checked && $(this).attr('id') != "selectAll"){
                                    $(this).closest('tr').remove();
                            }
                        });
                        $(".noteCheckbox").each(function( index ) {
                            if(this.checked){
                                    $(this).closest('div').remove();
                            }
                        });
                        // if( $("#selectAll").is(':checked')){
                        //     $("table").remove();
                        // }
                        location.reload();
                    }
                });
            }
        }
    });


    $("input[type=number]").on("input", function() {
        var id = $(this).attr("id");
        var newValue = this.value;
        var data = { newQuantity : newValue, id: id };
        //alert("Piece "+ id +" changed to " + this.value);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/myCart',
            type: "PATCH",
            data: data,
        });
    });
});