$(document).ready(function() {
  $('body').on('change','#orderStateSelect',function(){ // listener for order state select
    var newStateId = $('option:selected', this).attr('stateId');
    var orderIdToUpdate = $('option:selected', this).attr('orderId');
    var data = { newStateId : newStateId, orderIdToUpdate: orderIdToUpdate };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/order/updateState',
        type: "PATCH",
        data: data,
    });
  });

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
