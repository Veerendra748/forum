<?php 

if ($_SERVER['REQUEST_METHOD']=="POST") {
    include "_conn.php";
    $useremail = $_POST['loginEmail'];
    $loginpass = $_POST['loginPassword'];
    
    $sql ="SELECT * FROM `users` where user_email='$useremail' ";
    $result = mysqli_query($conn,$sql);
   
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        
        $row = mysqli_fetch_assoc($result);
        if(password_verify($loginpass, $row['password']))
        {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['user_email']=$useremail;
            // $_SESSION['password']=$loginpass;
            // echo "you are logged in"; 
            // echo "$useremail";
            header("location:/forum/index.php?loginsuccess=true");
            exit();
        }

        else{
            header("location:/forum/index.php?loginerror=true");
        }
    }   
    else{
        header("location:/forum/index.php?loginfailed=true");
    }  
}
?>
