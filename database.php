<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "signup";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  echo '<div id="alert" style="position: fixed; top: 10px; right: 10px; padding: 10px; background-color: #ff0000; color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.2); font-size: 12px;">
  <span style="margin-left: 10px; color: #fff; font-weight: bold; float: right; font-size: 14px; line-height: 14px; cursor: pointer; transition: 0.3s;" onclick="this.parentElement.style.display=\'none\';">&times;</span>
  <strong>Error!</strong><br>Database Not Connected!
</div>';
echo '<script>setTimeout(function() { document.getElementById("alert").style.display = "none"; }, 2000);</script>';
}
?>