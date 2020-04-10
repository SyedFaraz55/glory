<?php include 'includes/header.php' ?>
<?php

$connection = new mysqli("localhost","root","","users");
if($connection->connect_error){
  echo "connection failed to database !";
} else {
  $sql = "SELECT title,links FROM news";
  $result = $connection->query($sql);

  $sql2 = "SELECT title,link FROM quicklinks";
  $result2 = $connection->query($sql2);
}

?>
    <section>
        <div class="container">
            <div class="news">
                <div class="news-section">
                    <div class="news-header"><i class="fas fa-newspaper"></i>&nbsp;&nbsp;News & Events</div>
                    <div class="ticker1">
                        <div class="innerWrap">
                          <?php if(mysqli_num_rows($result) > 0) {?>
                            <?php $i=0; while($row = mysqli_fetch_array($result)) {?>
                              <div class="news-items">
                                <a href="news.php" style="color:black;text-decoration:none;"><?php echo $row["title"]?></a>
                              </div>
                            <?php $i++; }?>
                          <?php }?>

                        </div>
                    </div>
                </div>
                <div class="links-section">
                    <div class="news-header"><i class="fas fa-link"></i>&nbsp;&nbsp;Quick Links</div>
                    <?php if(mysqli_num_rows($result2) > 0) {?>
                      <?php $i=0; while($row2 = mysqli_fetch_array($result2)) {?>
                        <div class="links-item">
                          <?php echo $row2["title"]?> | <a href="<?php echo $row2["link"]?>">Click Here</a>
                        </div>
                      <?php $i++; }?>
                    <?php }?>
                </div>
            </div>
            <div class="carousel-container">
                <i class="fas fa-arrow-left" id="prev"></i>
                <i class="fas fa-arrow-right" id="next"></i>
                <div class="carousel-slide">
                    <img src="res/images/glory2.jpg" id="lastclone" alt="">
                    <img src="res/images/13.jpg" alt="">
                    <img src="res/images/glory2.jpg" alt="">
                    <img src="res/images/glory3.png" alt="">
                    <img src="res/images/13.jpg" id="firstclone" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="at-section">
        <div class="article">
            <h2>Welcome to Glory Group of Institution</h2>
            <div class="article-grid">
                <div>
                    <p>At Glory Group of Institutions, students are given the tools that allow them to feel really passionate about something. Applying these tools, they can become more than students: they have the potential to become practitioners and operators, leaders and guides in their chosen fields.</p>
                    <p>There’s something special about Glory Institution, visitors regularly comment on the distinctive atmosphere here, the uncommon bond which exists between students and teachers. The school has a particular ethos, a rare quality of its own. Students of all faith & cultures, aged from 2 to 18 receive an all-round education for life. Boys and girls can join Glory Institution at any age and at any time of year and we are open to students from all cultural, ethnic and religious backgrounds,</p>
                    <button id="learn-more">Learn More</button>
                </div>
                <div>
                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/lTrV45hsxUs">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
  <!--   <section>
        <div class="dir">
            <div class="dir-content">
                <h4>Words from Director</h4>
                <div style="margin-bottom: 10px;"></div>
                <p>"Here at Solus Informatics, we are committed to the quintessential aspect of refining the Managers and Building the Leaders. With an array of management training programs, we condition Prudent Managers.""
                    …Come condition yourself to be “who you want to be” ….</p>
            </div>
            <div class="dir-image">
                <img src="res/images/dir.jpg">
            </div>
        </div>
    </section> -->
    <section id="on-board">
        <div class="section-container">
            <div class="onboard-item">
                <h3>About Us</h3>
                <p>At Glory Group of Institutions, students are given the tools that allow them to feel really passionate about something.</p>
            </div>
            <div class="onboard-item">
                <h3>Newsroom</h3>
                <p>Read press releases and announcements to see what’s new at the College Board.</p>
            </div>
            <div class="onboard-item">
                <h3>Events</h3>
                <p>Our events provide professional learning and networking opportunities for educators.</p>
            </div>
        </div>
        <div class="subscribe">
            <div id="s-one">
                <p>Subscribe to Newsletter</p>
                <p>Get notified about new courses, events, community & more</p>
            </div>
            <div id="s-two">
                <form>
                    <input type="text" name="" placeholder="Enter Your Email">
                    <button href="#">Subscribe</button>
                </form>
            </div>
        </div>
    </section>
    <section>
    </section>
    <?php include 'includes/footer.php' ?>
