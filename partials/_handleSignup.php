<?php 

if ($_SERVER['REQUEST_METHOD']=="POST") {
    include "_conn.php";
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    $existSql = "select * from `users` where user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        // $showError ="Email  already exist";
        header("Location:/forum/index.php?singupnotmatch=true");
        // echo "Email  already exist";
    }
    else {
        
        if ($pass==$cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            $SQL= "INSERT INTO `users` (`user_email`,`password`)  VALUES ('$user_email', '$hash')";
            $result2=mysqli_query($conn , $SQL);

            if ($result2) {
                //  echo "inserted";
                // $showAlert=true;
                header("Location:/forum/index.php?singupsuccess=true");
                exit();
            }
        }
        else {
            header("Location:/forum/index.php?singupfailed=true");
            
        }
    }
   

}

?>