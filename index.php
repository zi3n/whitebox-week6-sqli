<?php
include "config.php";

//Have Sql injection
if(isset($_POST['but_submit'])){

    $uname = $_POST['txt_uname'];
    $password = $_POST['txt_pwd'];

    //filter some special characters
    $uname_filter = str_replace(array("or", "and", "true", "false", "union", "like", "=", ">", "<", ";", "--", "/*", "*/"),'',$uname);


    if ($uname_filter != "" && $password != ""){

        $sql_query = "SELECT COUNT(*) AS loginUser FROM users WHERE username='$uname_filter' and password='$password'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['loginUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname_filter;
            header('Location: home.php');
        }else{
            // echo "Invalid username and password";
            echo $sql_query;
        }

    }

}
?>
<html>
    <head>
        <title>CTF Login Page</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Login</h1>
                    <div>
                        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" required/>
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_pwd" name="txt_pwd" placeholder="Password" required/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>