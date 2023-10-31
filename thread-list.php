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
    #ques{
      min-height: 433px;
    }
  </style>
</head>

<body>
  <?php include "partials/_header.php";
  // include "_conn.php";

  ?>
  <?php

  $id = $_GET['catid'];
  $sql = "SELECT * FROM `idiscuss` where cetegory_id=$id";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {

    $catname = $row['cetegory_name'];
    $catdes = $row['cetegory_description'];
  }
  
  ?>
  
  <?php
     $showAlert=false;
    if( $_SERVER['REQUEST_METHOD']=="POST")
    {
      $th_title=$_POST['title'];
      $th_description=$_POST['description'];

      $sql=" INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `tstamp`) VALUES ( '$th_title', '$th_description', '$id', '0', CURRENT_TIMESTAMP())";
      $result=mysqli_query($conn,$sql);
      $showAlert=true;
      if($showAlert)
  {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>suceess!</strong> your question has been added wait sometime to community respond.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

  }
    }
    
    ?>
  
    <div class="container my-4">
      <div class="card">
        <!-- <h5 class="card-header">Featured</h5> -->
        <div class="card-body">
          <h5 class="card-title">Welcome in <?php echo " $catname " ?> forum </h5>
          <p class="card-text"> <?php echo " $catdes " ?></p>
          <hr class="my-4">
          <p> Peer to peer connection</p>
          <a href="#" class="btn btn-success">Go somewhere</a>
        </div>
      </div>
    </div>

    <?php 
    if(isset($_SESSION['loggedin'] )&&  $_SESSION['loggedin']=true)
    {
      echo '
    <div class="container">
      <h1 class="text-center"> Start a discussion</h1>
      <form action="'. $_SERVER["REQUEST_URI"] .' " method="post">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" aria-describedby="title"  required>
          <div id="emailHelp" class="form-text">please title keep short
          </div>
        <div class="mb-3">
          <label for="description" class="form-label">Ellaborate your problem</label>
          <textarea class="form-control" id="description"  name="description" rows="3"   required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>';
  } else{

     echo '       <h1 class="text-center"> Start a discussion</h1>
          <div class="container">
   <h5> To start disscussion please login !
   </div>
          
     ';
  }
   

    ?>
    <div class="container " id="ques">
      <h1 class="text-center"> Browse Questions</h1>

      <?php

      $id = $_GET['catid'];
      $sql = "SELECT * FROM `threads` where thread_cat_id=$id";
      $result = mysqli_query($conn, $sql);
      $Noresult = false;
      while ($row = mysqli_fetch_assoc($result)) {

        $Noresult = true;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $description = $row['thread_description'];

        echo '
    <div class="d-flex align-items-center">
      <div class="flex-shrink-0">
        <img src="img/user.jpg" alt="user height="50px" width="50px">
      </div>
       <div class="media-body"> 
         <h6 class="font-weight-bold "> user </h6> 
        <h5 class="mt-3  ms-3"> <a class="no-underline" href="threads.php?threadid=' . $id . '" >' . $title . '</a> </h5>
        <div class="flex-grow-1 ms-3">
        ' . $description . '
        </div>
      </div>
    </div>
 ';
      }
      if (!$Noresult) {
        echo "<b> No question for this forum </b>";
      }
      //  else {
      //   echo "<b>Result for this forum</b>";
      //  }
      ?>
    </div>
    <?php
    include "partials/_footer.php" ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>
