<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!Doctype html>
<html>
    <head>
        <title>You did it</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="home">
            <h1>You did it!!!</h1>
            <form method='post' action="">
                <h2>flagCTF{y0u_dld_It}</h2>
                <input type="submit" value="Logout" name="but_logout" class="but_logout"><br><br>
                <iframe src="https://giphy.com/embed/J5Xr9k7qK5KGRi45vp" width="480" height="362" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
            </form>           
        </div>
    </body>
</html>