<?php
$server ="localhost";
$username ="root";
$password ="";
$dbname ="forum";

$conn =mysqli_connect($server,$username,$password,$dbname);
if(!$conn)
{
    die ("sorry");
}
// else{
//     echo "connect";
// }
?>