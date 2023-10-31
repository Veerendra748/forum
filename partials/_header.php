<?php
include "_conn.php";
session_start();
echo '
   <nav class="navbar navbar-expand-lg  navbar-dark bg-dark " >
   <div class="container-fluid">
     <a class="navbar-brand" href="index.php">Forum</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="index.php">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="about.php">About</a>
         </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="contact.php">Contact</a>
         </li>
       </ul>
       <div class="row mx-2">
       ';
       if(isset($_SESSION['loggedin'] )&&  $_SESSION['loggedin']=true)
       {
        echo '
        <form class="d-flex" role="search" my-0>
         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
         <button class="btn btn-success" type="submit">Search</button>
         <p class="text-light text-center">'.$_SESSION['user_email'].' </p>;
         <a href="partials/_logout.php" class="btn btn-outline-success ml-2">Logout </a>
         </form>
      ';
       }
       else
       {
       echo '
       <form class="d-flex" role="search">
         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
         <button class="btn btn-success" type="submit">Search</button>
        </div>
       </form>
       <button class="btn btn-outline-success ml-2"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
       <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
       ';
     }
     echo ' 
     </div>
   </div>   
 </nav> 
';
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if (isset($_GET['singupsuccess']) && $_GET['singupsuccess'] == "true") {

  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Signup !</strong> now you can login!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if (isset($_GET['singupnotmatch']) == "true") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error !</strong> Email already Exist!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if (isset($_GET['singupfailed']) == "false") {
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error !</strong> password do not match!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == 'true') {
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Login !</strong> you are loggedin!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['loginerror']) && $_GET['loginerror'] == 'true'){

  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error !</strong> Incorrect username or password!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
if(isset($_GET['loginfailed']) && $_GET['loginfailed'] == 'true'){

  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error !</strong> User not exits please first signup!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
