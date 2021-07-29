$(function(){
    $('#allButton').button();
    $('#applyButton').button();
    displayAll();
    
    //sets up all button
    $('#allButton').click(function(){
        displayAll();
    });
    
    //sets up apply button (for searching)
    $('#applyButton').click(function(){
        displayResponse();
    });
});

//called when all button is pressed
function displayAll(){
    $('#searchInput').val("");
    $.post("handleLoadSave.php", {action: "all"} ,function(data){
        if(data == 'error'){
            //found how to do this on https://www.w3schools.com/howto/howto_js_redirect_webpage.asp
            window.location.replace("error.php");
        }
        else{
            $('#savedResults').html(data);
        }
    });
}

//called when apply button (for searching) is pressed
function displayResponse(){
    var query = $('#searchInput').val();
    if(query == ""){
        alert("Please enter a value for the search");
    }
    else{
        $.post("handleLoadSave.php", {q: query, action: "search"} , function(data){
            if(data == 'error'){
                //found how to do this on https://www.w3schools.com/howto/howto_js_redirect_webpage.asp
                window.location.replace("error.php");
            }
            else{
                $('#savedResults').html(data);
            }
        });
    }
}