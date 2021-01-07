$("document").ready(function(){
    
    $.ajax({
        url: '/cartItems/1',
        type: "GET",
        dataType: "json",
        success:function(data) {
            $('#projects').empty();
            if(data == ""){
                $('#cart-items-count').text("(Nan)");
            }else{
                $('#cart-items-count').text('('+data+')');
            }
            $('#projects').removeAttr('disabled');
        }
    });
    
});