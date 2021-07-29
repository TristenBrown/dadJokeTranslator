<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create An Account</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="Tlbbf5FinalProject.css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="Tlbbf5FinalProject.js"></script>
    </head>
    <body>
        <form id="form" class="ui-widget ui-widget-content" action="SignIn.php" method="post">
            <input type="hidden" name="action" value="Create An Account">
            <h1 id="formTitle" class="ui-widget-header">Create An Account</h1>
            <?php
                    if ($error) {
                        print "<div class=\"ui-state-error\">$error</div>\n";
                    }
            ?>
            <div id="formRowOne" class="formRow">
                <label for="username">Username:</label>
                <input id="username" type="text" placeholder="Username" name="username" class="ui-widget-content ui-corner-all" autofocus value="<?php print $username; ?>">
            </div>
            <div class="formRow">
                <label for="password">Password:</label>
                <input id="password" type="password" placeholder="Password" name="password" class="ui-widget-content ui-corner-all">
            </div>
            <div class="formRow">
                <label for="confirmPassword">Confirm Password:</label>
                <input id="confirmPassword" type="password" placeholder="Password" name="confirmPassword" class="ui-widget-content ui-corner-all">
            </div>
            <div class="formRow">
                <input id="submitButton" type="submit">
            </div>
        </form>
    </body>
</html>