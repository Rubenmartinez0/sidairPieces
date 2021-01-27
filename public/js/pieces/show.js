$(document).ready(function() {
  $('body').on('change','#pieceStateSelect',function(){ // listener for pieces states selects
    var newStateId = $('option:selected', this).attr('stateId');
    var pieceIdToUpdate = $('option:selected', this).attr('pieceId');
    //console.log("Updating pieceId '"+ pieceIdToUpdate +"' to state '" + newStateId +"'.");
    var data = { newStateId : newStateId, pieceIdToUpdate: pieceIdToUpdate };

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/piece/updateState',
        type: "PATCH",
        data: data,
    });
  });
});
