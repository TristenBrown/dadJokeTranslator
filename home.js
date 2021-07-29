$(function(){
    //If user is logged in, a save button is added
    $.post("checkLogin.php", function(data){
        if(data == 'true'){
            $('#centerPage').append('<input id="save" type="button" value="Save">');
            //saveReady is a function in Tlbbf5FinalProject.js that sets the save button up
        }
        //sets up the save button that was just added
        $('#save').button();
        $('#save').click(function(){
            var info = document.getElementById("joke");
            if(info){
                $.post('handleSave.php', {info: info.innerHTML}, function(){
                    alert("Sucessfully Saved!");
                });
            }
            else{
                alert("No joke to save......");
            }
        });
    });
    $('#randomJoke').button();
    $('#randomJoke').click(function(){
        
        //I use this ajax request to call the icanhazdadjoke api at https://icanhazdadjoke.com/api
        
        //Using this api, I can get a random dad joke
        
        $.ajax({
        url: 'https://icanhazdadjoke.com/',
        beforeSend: function(xhr) {
             xhr.setRequestHeader("Accept", "application/json")
        }, success: function(data){
            $('#language option[value="English"]').prop("selected","selected");
            $('#jokeContainer').html('<p id="joke">' + data.joke + '</p>');
        }
        });
    });
});

//called when a user changes the language select
function translateThis(){
    //this php keeps track of how many times you've called the api with cookies
    $.post("setCookie.php", function(data){
        //If you're not over the limit allowed in one hour
        if(parseInt(data) <= 5){
            if($('#language').val() != "English"){
                var language = $('#language option:selected').text();
                var query = $('#joke').html();
                var linkString = "https://api.funtranslations.com/translate/" + language.toLowerCase() + ".json?text=" + encodeURI(query);

                //I use this get request to call the funtranslations api at https://funtranslations.com/api/

                //Using the api, I can translate things into different made up languages

                $.get(linkString, function(data){
                    $('#jokeContainer').html('<p id="joke">' + data.contents.translated + '</p>')
                });
            }
        }
        else{
            alert("Please wait an hour before trying again!")
        }
    });
}