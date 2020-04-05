<?php

  $db = mysqli_connect("localhost","root","","users");
  $sql = "SELECT * FROM media";
  $result = mysqli_query($db,$sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Glory Group of institution</title>
    <script src="https://kit.fontawesome.com/f6ea8c7853.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
      #box {
        display: grid;
        grid-template-columns: repeat(3,1fr);
        width: 90%;
        height:auto;
        margin:0 auto;
        grid-gap:20px;
      }
      .image {

      }
      .image img {
        width: 100%;
        height: 100%;
      }
    </style>
</head>
<body>
    <header>
        <div>
            <div class="top-section">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="media.php">Media</a></li>
                    <li><a href="login.php">Staff Login</a></li>
                </ul>
            </div>
            <div class="main-banner">
                <div class="logo">
                    <div><img src="res/Glorylogo.png" width="140" alt=""></div>
                    <div class="logo-text">
                        <h1>Glory Group</h1>
                        <h3>Of Institution</h3>
                    </div>
                </div>
                <div>
                    <ul>
                        <li><a href="glory-montessori.php"><i class="fa fa-arrow-right" aria-hidden="true"></i>
                                &nbsp;&nbsp;Glory Montessori</a></li>
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>
                                &nbsp;&nbsp;Glory School of Excellence</a></li>
                        <li><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i>
                                &nbsp;&nbsp;Glory Junior & DegreeCollege</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section>
      <div style="margin-top:20px;"></div>
        <div id="box">
          <?php while($row = mysqli_fetch_array($result)) {?>
              <div class="image">
                <img src="<?php echo 'images/'.$row['media']?>" alt="">
              </div>
          <?php }?>
        </div>
    </section>

    <div style="margin-top:200px"></div>

<?php include 'includes/footer.php' ?>
