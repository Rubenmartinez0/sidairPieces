$("document").ready(function(){
    
    $.ajax({
        url: '/cartItems',
        type: "GET",
        dataType: "json",
        success:function(data) {
            $('#projects').empty();
            if(data == ""){
                $('#cart-items-count').text("(0)");
            }else{
                $('#cart-items-count').text('('+data+')');
            }
            $('#projects').removeAttr('disabled');
        }
    });
    
});