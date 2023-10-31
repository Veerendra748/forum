<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>forum </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 <style>
  .no-underline{
   text-decoration: none;
  }
  .no-underline:hover{
   text-decoration: underline;
    /* color: red; */
  }
 </style>
</head>

<body>
  <?php include "partials/_header.php";
  // include "_conn.php";

  ?>
  <!-- carousal start -->
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/slide1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slide1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/random/1820x680/?coding,development" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container ">
    <h1 class="text-center my-2">iDiscuss - Cetegories</h1>
    <div class="row">
      <?php
      $sql = "SELECT * FROM `idiscuss`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        // echo $row['cetegory_id'];
        // echo "<br>";
        // echo $row['cetegory_name'];
        // echo $row['cetegory_description'];
        $id= $row['cetegory_id'];
        $cat= $row['cetegory_name'];
        $catdes= $row['cetegory_description'];
        echo '
          <div class="col-md-4 my-4 ">
        <div class="card" style="width: 18rem;">
          <img src="https://images.unsplash.com/photo-1508830524289-0adcbe822b40?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=900&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=1600" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"> <a class="no-underline text-dark" href="thread-list.php?catid='. $id.'">'. $cat.'</a></h5>
            <p class="card-text">'.$catdes.'</p>
            <a href="thread-list.php?catid='. $id.'" class="btn btn-primary">Veiw threads</a>
          </div>
        </div>
      </div>';
      }
      ?>
    </div>
  </div>
  <?php
  include "partials/_footer.php" ?>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>