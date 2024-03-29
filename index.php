<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BornilChowdhury</title>
    <link rel="stylesheet" href="./StyleSheet/style.css">
    <link rel="stylesheet" href="./StyleSheet/mediaqueries.css">
</head>

<body>
    <section class="section-header">
      <div class="container">
        <nav>
          <a href="#"><img src="./images/Screenshot_2024-03-02_060155-removebg-preview (1).png" alt="logo image" class="logo-img"></a>
          <div class="nav-actions">
            <div class="nav-toggle" id="nav-toggle">
              <img src="./images/menu-line.svg">
            </div>
          </div>
          <div class="nav-menu" id="nav-menu">
            <ul class="nav-list">
              <li class="nav-item"><a href="#section-about">ABOUT</a></li>
              <li class="nav-item"><a href="#section-works">WORKS</a></li>
              <li class="nav-item"><a href="#section-contact">CONTACT</a></li>
            </ul>
            <div class="nav-close" id="nav-close">
              <img src="./images/close-line.svg">
            </div>
          </div>
          
        </nav>
        <div class="header-text">
          <h1>THE JOURNEY OF ENTHUSIASM</h1>
          <p>Bornil Chowdhury</p>
        </div> 
      </div>
    </section>

    <section class="section-about" id="section-about">
      <div class="about-heading">
        <img src="./images/right.png" class="aboutQuot" style="width: 70px;">
        <p>TOO LATE TO EXPLORE THE EARTH, TOO EARLY TO VOYAGE INTO THE STARS</p>
        <img src="./images/right.png"  class="aboutQuot" style=" width: 70px; rotate: 180deg;">
      </div>
      <div class="selfSection">
        <div class="selfImg">
          <img src="./images/selfImage.jpeg" alt="self-portrait" class="imgSelf">
        </div>
        <div class="about-details">
          <div class="about">
            <div class="details">
              <img src="./images/study-icon.png" alt="study-icon" class="icon">
              <h3>Study</h3>
              <p>H.S.C. <br> B.Sc. in <br>Computer Science and Engineering</p>
            </div>
            <div class="details">
              <img src="./images/work-started-icon.png" alt="work-icon" class="icon">
              <h3>Experience</h3>
              <p>Basic experience <br>Web Development <br> Software Enginnering</p>
            </div>
          </div>
          <div class="text">
            <p>
              Originating from <span style="color: red;">Chattogram</span>, Bornil Chowdhury is an aspiring student currently pursuing a B.Sc. degree in Computer Science and Enginnering at <span style="color: red;">Khulna University of Engineering and Technology</span>. A passionate photographer, he is always looking for ways to capture the very essence of life and nature around the people. One of his most cherished dreams is to visit the whole of Bangladesh, as early as possible.
            </p>
          </div>
        </div>
      </div>
      <img src="./images/double-arrow-top-icon.png" alt="arrow-icon" class="icon-arrow" id="icon-arrow"> 
    </section>

    <div id="myModal" class="modal">
      <span class="close" onclick="closeModal()">&times;</span>
      <img class="modal-content" id="img01">
    </div>

    <section class="section-works" id="section-works">
      <p>Check out my</p>
      <h1>Recent Works</h1>
      <div class="slideshow">
        <?php
          require_once './php/db_connection.php';

          $sql = "SELECT * FROM imageInfo";
          $result = mysqli_query($conn, $sql);
          $rowCount = mysqli_num_rows($result);

          if ($rowCount > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo '<div class="slides fade">';
                  echo '<div class="numbertext">' . $row['id'] . '</div>';
                  echo '<img src="./php/img/' . $row["image"] . '" alt="' . $row["name"] . '" style="width: 100%;">';
                  echo '<div class="dark-overlay">' . $row["name"] . '</div>';
                  echo '</div>';
              }
          } else echo "No images found.";
          mysqli_close($conn);
        ?> 

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <br>
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(-1)"></span>
        <span class="dot" onclick="currentSlide(0)"></span>
        <span class="dot" onclick="currentSlide(1)"></span>
      </div>
    </section>

    <section class="section-projects" id="section-projects">

    </section>

    <section class="section-contact" id="section-contact">
      <p>Get In Touch</p>
      <h1>Contact Me</h1>
      <div class="contact-form">
        <form action="./php/mail.php" method="POST">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="mail" placeholder="Your Email" required>
          <textarea name="message" id="" cols="30" rows="10" placeholder="Enter Message"></textarea>
          <button type="submit">SUBMIT</button>
        </form>
      </div>
      <img src="./images/double-arrow-top-icon.png" alt="arrow-icon" class="icon-arrow" id="icon-arrow">
    </section>

    <footer class="footer-container"> 
      <nav>
          <div class="nav-links">
            <ul class="nav-list">
              <li class="nav-item"><a href="#section-about">ABOUT</a></li>
              <li class="nav-item"><a href="#section-works">WORKS</a></li>
              <li class="nav-item"><a href="#section-contact">CONTACT</a></li>
            </ul>
        </div>
      </nav>
      
      <div class="footer-details">
        <h2>BORNIL CHOWDHURY</h2>
        <img src="./images/arroba.png" alt="mail-icon" class="footer-icon"> mail@example.com<br>
        <img src="./images/phone-call.png" alt="phone-icon" class="footer-icon"> 0123456789<br>
        <div class="social-links">
          <a href="#"><img src="./images/facebook.png" class="social-icon"></a>
          <a href="#"><img src="./images/whatsapp.png" class="social-icon"></a>
          <a href="#"><img src="./images/instagram.png" class="social-icon"></a>
          <a href="#"><img src="./images/linkedin.png" class="social-icon"></a>
          <a href="#"><img src="./images/github.png" class="social-icon"></a>
      </div>
        <p>Copyright &#169; 2024</p>
      </div>
    </footer>
    
    <script src="./js/main.js"></script>
</body>
</html>