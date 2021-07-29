<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="Tlbbf5FinalProject.css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="Tlbbf5FinalProject.js"></script>
        <script src="home.js"></script>
    </head>
    <body>
        <div id="centerPage" class="ui-widget">
            <h1 id="title" class="ui-widget-header">Random Dad Joke Translator</h1>
            <div id="jokeContainer" class="ui-corner-all ui-widget-content"></div>
            <div id="jokeControls">
                <input id="randomJoke" type="button" value="Random Joke">
                <select id="language" class="ui-widget-content ui-corner-all" onchange="translateThis()">
                    <option selected disabled value="English">English</option>
                    <option>Yoda</option>
                    <option>Pirate</option>
                    <option>Shakespeare</option>
                    <option>Groot</option>
                </select>
            </div>
        </div>
    </body>
</html>