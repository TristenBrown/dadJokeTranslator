//index used to keep track of where we are in the image gallery
var currentIndex = 0;

//activates when left arrow is clicked
function goLeft(){
    var imageString;
    
    // a different method is needed to embed videos
    if(currentIndex == 0){
        currentIndex = 6;
        embedVideo();
    }
    else{
        switch(currentIndex){
            case 1:{
                imageString = "images/me.jpg";
                currentIndex = 0;
                break;
            }
            case 2:{
                imageString = "images/randomJoke.png";
                currentIndex = 1;
                break;
            }
            case 3:{
                imageString = "images/translateJoke.png";
                currentIndex = 2;
                break;
            }
            case 4:{
                imageString = "images/saveJoke.png";
                currentIndex = 3;
                break;
            }
            case 5:{
                imageString = "images/createJoke.png";
                currentIndex = 4;
                break;
            }
            case 6:{
                imageString = "images/searchResult.png";
                currentIndex = 5;
                break;
            }
        }
        appendImage(imageString);
    }
}

//activates when right arrow is clicked
function goRight(){
    var imageString;
    if(currentIndex == 5){
        currentIndex = 6;
        embedVideo();
    }
    else{
        switch(currentIndex){
            case 0:{
                imageString = "images/randomJoke.png";
                currentIndex = 1;
                break;
            }
            case 1:{
                imageString = "images/translateJoke.png";
                currentIndex = 2;
                break;
            }
            case 2:{
                imageString = "images/saveJoke.png";
                currentIndex = 3;
                break;
            }
            case 3:{
                imageString = "images/createJoke.png";
                currentIndex = 4;
                break;
            }
            case 4:{
                imageString = "images/searchResult.png";
                currentIndex = 5;
                break;
            }
            case 6:{
                imageString = "images/me.jpg";
                currentIndex = 0;
                break;
            }
        }
        appendImage(imageString);
    }
}

//common functionality in both above functions where image is added to view
function appendImage(imageString){
    var imageHtml = '<img id="currentPic" src="' + imageString + '" alt="current picture">'
    $('#imageDiv').html(imageHtml);
}

//function that embeds the video
function embedVideo(){
    var videoHtml = '<iframe id="embededVideo" src="https://www.youtube.com/embed/Jdsjvekx8wU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    $('#imageDiv').html(videoHtml);
}