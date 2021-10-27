1. Trong wamp, xampp tạo 1 database tên là test
2. Import file users.sql vào database test
3. Cập nhật username và password của wamp, xampp trong file config.php


Code prevent sqli

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "SELECT COUNT(*) AS loginUser FROM users WHERE username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['loginUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            // echo "Invalid username and password";
            echo $sql_query;
        }

    }

}
