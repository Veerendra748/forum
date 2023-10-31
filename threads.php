<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>forum </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <style>
    .no-underline {
      text-decoration: none;
    }

    .no-underline:hover {
      text-decoration: underline;
      /* color: red; */
    }
  </style>
</head>

<body>
  <?php include "partials/_header.php";
  // include "_conn.php";

  ?>
  <?php

  $id = $_GET['threadid'];
  $sql = "SELECT * FROM `threads` where thread_id=$id";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {

    $threadtitle = $row['thread_title'];
    $threaddes = $row['thread_description'];
  }
  ?>
 <?php
     $showAlert=false;
    if( $_SERVER['REQUEST_METHOD']=="POST")
    {
      $comment=$_POST['comment'];
     
      $sql=" INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_time`) VALUES ('$comment', '$id', CURRENT_TIMESTAMP);
      ";
      $result=mysqli_query($conn,$sql);
      $showAlert=true;
      if($showAlert)
  {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>suceess!</strong> your comment has been added!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

  }
    }
    
    ?>

  <div class="container ">
    <div class="container my-4">
      <div class="card">
        <!-- <h5 class="card-header">Featured</h5> -->
        <div class="card-body">
          <h5 class="card-title"> <?php echo "  $threadtitle" ?></h5>
          <p class="card-text"> <?php echo "  $threaddes " ?></p>
          <hr class="my-4">
          <p> Peer to peer connection</p>
          <p>Post by :-<b> Veerendra lodhi</b></p>
        </div>
      </div>
    </div>


    <?php 
    if(isset($_SESSION['loggedin'] )&&  $_SESSION['loggedin']=true)
    {
      echo '
      <div class="container">
      <h1 class="text-center"> Start a discussion</h1>
      <form action="'.$_SERVER['REQUEST_URI'] .'" method="post">
        <div class="mb-3">
          <label for="comment" class="form-label">Type your comment</label>
          <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Post comment </button>
      </form>
    </div>
    <div class="container my-2">
      <h1 class="text-center">Discussion</h1>';
  } else{

     echo '       <h1 class="text-center"> Start a discussion</h1>
          <div class="container">
   <h5> To start disscussion please login !
   </div>
          
     ';
  }
   

    ?>

       <?php

            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` where thread_id=$id";
            $result = mysqli_query($conn, $sql);
            $Noresult = false;
            while ($row = mysqli_fetch_assoc($result)) {
              $Noresult = true;
              $id = $row['comment_id'];
              $comment = $row['comment_content'];
              $comment_time = $row['comment_time'];


              echo '
    <div class="d-flex align-items-center">
      <div class="flex-shrink-0">
        <img src="img/user.jpg" alt="user height="50px" width="50px">
      </div>
      <div class="media-body my-2"> 
        <h6 class="font-weight-bold my-0" >  Veerendra Lodhi  comment at  '. $comment_time .'</h6> 
          ' . $comment . ' 
          </div>
        </div>
 ';
            }
            if (!$Noresult) {
              echo "<b> No comments found</b>";
            }
            ?> 
    </div>
    <?php
    include "partials/_footer.php" ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>
