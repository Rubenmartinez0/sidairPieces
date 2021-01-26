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
                        //remove from frontend every piece and note that has been deleted.
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
                        location.reload();
                    }
                });
            }
        }
    });


    $(".pieceQuantityInput").on("input", function() {
        var id = $(this).attr("id");
        var newValue = this.value;
        var data = { newQuantity : newValue, id: id };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/myCart',
            type: "PATCH",
            data: data,
        });
    });
    $(".noteInput").on("input", function() {
        var id = $(this).attr("id");
        var newTextValue = this.value;
        var data = { newTextValue : newTextValue, id: id };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/myCart',
            type: "PATCH",
            data: data,
            success: function(message){
                $(".noteInput").each(function( index ) {
                    $(this).css('border', '');
                });
            }
        });
    });

    $('#addNoteButton').click(function() {
        var emptyInput;
        $(".noteInput").each(function( index ) {
            if( !$(this).val()){
                $(this).css("border", "2px solid red");
                emptyInput = true;
                return;
            }
        });
        if(!emptyInput){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/myCart/addNote',
                type: "POST",
                success:function(message) {
                    location.reload();
                }
            });
        }
    });
});