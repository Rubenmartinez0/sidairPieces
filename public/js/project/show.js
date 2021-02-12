$(document).ready(function() {
    $('body').on('change','#projectStateSelect',function(){ // listener for project state select

        var newStateId = $('option:selected', this).attr('stateId');
        console.log("NewState -> " + newStateId);
        var projectId = $("#projectId").text();
        console.log("projectId -> " + projectId);
        var data = { newStateId:newStateId, projectId:projectId };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/project/u/'+projectId,
            type: "PATCH",
            data: data,
        });
    });

    $('#ordersTable').DataTable( {
        language: {
            search: "Buscar:",
            paginate: {
                first:      "Primera",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Última"
            },
            info: "Mostrando del _START_ al _END_ de _TOTAL_ resultados.",
            processing:     "Procesando petición...",
            lengthMenu:    "Mostrar _MENU_ resultados.",
            infoEmpty:      "",
            infoFiltered:   "(Filtrando entre un total de _MAX_ resultados)",
            infoPostFix:    "",
            loadingRecords: "Cargando resultados...",
            zeroRecords:    "No existen resultados para esa búsqueda.",
            emptyTable:     "No hay datos disponibles en la tabla.",
            aria: {
                sortAscending:  ": activar para ordenar la columna en orden ascendente",
                sortDescending: ": activar para ordenar la columna en orden descendente"
            }
            
        },    
    });
});