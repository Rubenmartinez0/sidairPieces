$("document").ready(function(){
    
    $("#searchbar").focus();


    $('#createClientButton').click(function() {
        setTimeout(function(){
            $("#nameInput").focus(); // fade out during 2 secs.
        }, 250 ); // Wait 2 secs
        
    });
});
