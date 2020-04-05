<?php session_start(); ?>
<?php
$msg = "";
$class = "";
 if(!isset($_SESSION['user'])){
   header('location:login.php');
 }
$connection = new mysqli("localhost","root","","users");
if($connection->connect_error){
  die("connection failed");
}

 if(isset($_POST['submit'])) {
   $title = $_POST['title'];
   $content = $_POST['content'];
   $links = $_POST['links'];

   if($title == "" || $content == "") {
     $msg = "Please fill title & Content";
     $class = "alert alert-danger";
   } else {
     if($connection->connect_error){
       die("connection fialed");
     } else {
       $sql = "INSERT INTO news (title,content,links) VALUES (?,?,?)";
       $stmt = $connection->prepare($sql);
       $stmt->bind_param("sss",$title,$content,$links);
       $stmt->execute();
       if($stmt){
         $msg = 'News Added to Homepage';
         $class = "alert alert-success";
       } else {
         $msg = 'Error occurred ! Contact administrator';
         $class = "alert alert-danger";
       }
     }
   }
 }

 if(isset($_POST["qadd"])){
   $title2 = $_POST["quicklinks"];
   $link2 = $_POST["qaddress"];

   if($title2 == "" || $link2 == ""){
     $msg = "please add a quick link title or link ";
     $class = "alert alert-danger";
   } else {
     $sql2 = "INSERT INTO quicklinks (title,link) VALUES (?,?)";
     $stmt2 = $connection->prepare($sql2);
     $stmt2->bind_param("ss",$title2,$link2);
     $stmt2->execute();
     if($stmt2){
       $msg = 'Qucik link added.';
       $class = "alert alert-success";
     } else {
       $msg = 'Error occurred ! Contact administrator';
       $class = "alert alert-danger";
     }
   }
 }
// Gallery
 if(isset($_POST["upload"])){
   $target = "images/".basename($_FILES['image']['name']);
   $db = mysqli_connect("localhost","root","","users");
   $image = $_FILES['image']['name'];

   if (empty($_FILES['image']['name'])) {
     $msg = "please select an image !";
     $class = "alert alert-danger";
 } else {
   $query = "INSERT INTO images (image) VALUES ('$image')";
   mysqli_query($db,$query);

   if(move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
     $msg = "image uploaded";
     $class = "alert alert-success";
   } else {
     $msg = "there is a problem in uploading image";
     $class = "alert alert-danger";
   }
 }
}


 // Media
  if(isset($_POST["upload_image"])) {
    $target = "images/".basename($_FILES['file']['name']);
    $db = mysqli_connect("localhost","root","","users");
    $image = $_FILES['file']['name'];
    if (empty($_FILES['file']['name'])) {
      $msg = "please select an image !";
      $class = "alert alert-danger";
  } else {
    $query = "INSERT INTO media (media) VALUES ('$image')";
    mysqli_query($db,$query);

    if(move_uploaded_file($_FILES['file']['tmp_name'],$target)) {
      $msg = "image uploaded";
      $class = "alert alert-success";
    } else {
      $msg = "there is a problem in uploading image";
      $class = "alert alert-danger";
    }
  }
  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Dashboard</title>
     <link rel="stylesheet" href="css/dashboard.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   </head>
   <body>
     <div class="navbar">
       <nav>
         <div>
           <h2>Glory Dashboard</h2>
         </div>
         <div style="margin-left:40px;">
           <a href="logout.php" class="ml-auto">Logout</a>
         </div>
       </nav>
     </div>

     <section class="container">
      <div class="news">
        <h4 class="<?php echo $class;?>"><?php echo $msg;?></h4>
        <h3>New Section</h3>
        <hr>
        <form action="dashboard.php" method="post">
          <div class="form-group">
            <input type="text" name="title" value="" placeholder="News Title" class="form-control">
          </div>
          <div class="form-group">
            <textarea rows="8" cols="60" name="content" placeholder="News Content" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="links" value="" placeholder="Extra links" class="form-control">
          </div>
          <div class="form-group">
            <h3>Quick Links <span style="color:#ccc;">(Optional)</span></h3>
            <hr>
            <input type="text" name="quicklinks" value="" placeholder="quick link title" name="qlinks" class="form-control"><br>
            <input type="text" name="qaddress" value="" placeholder="quick link address" class="form-control">
          </div>
          <input type="submit" name="submit" value="Post" id="submit" class="btn btn-primary">
          <input type="submit" name="qadd" value="Add Quick link" id="submit" class="btn btn-info">
        </form>
      </div>
     </section>
     <div style="margin-top:30px;"></div>
     <section class="container" style="padding-left:30px;">
       <h3>Upload Image for Gallery</h3>
       <hr>
        <form  action="dashboard.php" method="post" enctype="multipart/form-data">
          <input type="file" name="image" value="file" accept="image">
          <input type="submit" name="upload" value="upload" class="btn btn-danger">
        </form>
        <div style="margin-top:30px;"></div>
     </section>

   </section>
   <div style="margin-top:30px;"></div>
   <section class="container" style="padding-left:30px;">
     <h3>Upload Image for Media</h3>
     <hr>
      <form  action="dashboard.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" value="file" accept="image">
        <input type="submit" name="upload_image" value="upload" class="btn btn-dark">
      </form>
      <div style="margin-top:30px;"></div>
   </section>



     <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-analytics.js"></script>

<script src="js/fire.js"></script>
   </body>
 </html>
