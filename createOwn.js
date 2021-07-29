$(function(){
    //sets up the save button
    $('#save').button();
    $('#save').click(function(){
        var info = $('#createdJoke').val();
        if(info != ''){
            $.post('handleSave.php', {info: info}, function(){
                alert("Sucessfully Saved!");
            });
        }
        else{
            alert("Please enter a joke!");
        }
    });
});