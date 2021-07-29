$(function(){
    //appends navbar
    $.post('navbar.php', function(newData){
                $('body').prepend(newData);
    });
    
    //submit button is for the login and create account forms
    $('#submitButton').button();
    
});