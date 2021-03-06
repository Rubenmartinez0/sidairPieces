$(document).ready(function() {
    $('#client').change(function() {
        selectedClient = encodeURI($(this).val());
        if($.isNumeric(selectedClient)){
            $.ajax({
                url: '/projects/'+encodeURI($(this).val()),
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#projects').empty();
                    $('#projects').append('<option disabled selected value">-- Seleccionar Obra --</option>');
                    $.each(data, function(key, project){
                        $('#projects').append('<option value="'+project.id+'" >'+project.name+'</option>');
                    });
                }
            });
        }else{
            $('#projects').empty();
            $('#projects').append('<option disabled selected value>-- Seleccionar cliente --</option>');
        }
    });

    $('#projects').change(function() {
        var selectedProject = $(this).children("option:selected").val();
    });

    
    selectedClient = $("#client :selected").val();
    if($.isNumeric(selectedClient)){
        $.ajax({
            url: '/projects/'+selectedClient,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('#projects').empty();
                $('#projects').append('<option disabled selected value">-- Seleccionar Obra --</option>');
                $.each(data, function(key, project){
                    $('#projects').append('<option value="'+project.id+'" >'+project.name+'</option>');
                });
            }
        });
    }
    
});