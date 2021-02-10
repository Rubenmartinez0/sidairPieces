$("document").ready(function(){
    $('#createProjectButton').click(function() {
        setTimeout(function(){
            $("#nameInput").focus(); // fade out during 2 secs.
        }, 250 ); // Wait 2 secs
        
    });
});
$(document).ready(function() {
    $('#projectsTable').DataTable( {
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
})